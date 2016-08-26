<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 26/07/2016
 * Time: 22:12
 */
namespace GPLAC;
class EnemController
{
    protected $enem;
    protected $dao;
    /**
     * ObjetoController constructor.
     */
    public function __construct()
    {
        $this->enem = new Enem();
        $this->dao = new EnemDAO();
    }
    function getdata()
    {
        $lista = array();
        $arquivo = fopen('D:\rotas_enem.csv', 'r');
        while (!feof($arquivo)) {
            $linha = fgets($arquivo, 1024);
            $dados = explode(';', $linha);
            if ($dados[0] != 'Objeto' && !empty($linha)) {
                $enem = new Enem();
                $dma = explode('/', $dados[2]);
                $enem->setCodigo($dados[0])
                    ->setDataprevista(date($dma[2] . '-' . $dma[1] . '-' . $dma[0]))
                    ->setRota($dados[6])
                    ->setOrdem($dados[7])
                    ->setDestinatario($dados[8])
                    ->setLogradouro($dados[9])
                    ->setBairro($dados[11])
                    ->setCidade($dados[14])
                    ->setUf($dados[15])
                    ->setSabatina($dados[21])
                    ->setProvaespecial($dados[22]);
                $lista[] = $this->dao->salvar($enem);
            }
        }
        fclose($arquivo);
        echo json_encode(array('result' => lista));
    }
    function pegarRota()
    {
        $data = $_POST['data'];
        $enem = new Enem();
        $enem->setCodigo($data['codigo']);
        $result = $this->dao->buscarCodigo($enem);
        $restante = $this->dao->contarResto();
        $painel = $this->dao->gerarPainel('2016-11-05');
        echo json_encode(array('result'=>$result,'restante'=>$restante, 'painel'=>$painel));
    }

    function gerarPainel()
    {
//        $dia = $_POST['data'];
        $sabado = $this->dao->gerarPainel('2016-11-05');
        $domingo = $this->dao->gerarPainel('2016-11-06');

        echo json_encode(array('sabado'=>$sabado, 'domingo'=>$domingo));
    }
}