<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 19:11
 */

namespace GPLAC;


class ObjetoController
{
    protected $objeto;
    protected $dao;

    /**
     * ObjetoController constructor.
     */
    public function __construct()
    {
        $this->objeto = new Objeto();
        $this->dao = new ObjetoDAO();
    }

    function listar()
    {

//        if(isset($_POST['data']['unidade'])){
//            $unidade = $_POST['data']['unidade'];
            $objetos = $this->dao->listar();

            echo json_encode($objetos);
//        }

    }

    function salvartodos()
    {
        $lista_de_objetos = $_POST['data'];
        foreach ($lista_de_objetos as $obj):
            $this->objeto->setIdentificador($obj['identificador']);
            $this->objeto->setCodigo($obj['codigo']);
            $this->dao->salvar($this->objeto);
        endforeach;

        echo json_encode(array('result'=>true));
    }

    function baixartodos()
    {
        $lista_de_objetos = $_POST['data'];
        foreach ($lista_de_objetos as $obj):
            $this->objeto->setIdentificador($obj['identificador']);
            $this->objeto->setCodigo($obj['codigo']);
            $this->dao->darBaixa($this->objeto);
        endforeach;

        echo json_encode(array('result'=>true));
    }

    function gerarplanilha()
    {
        $lista_de_objetos = $this->dao->listarDoDia();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('America/Manaus');

        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        $objPHPExcel = new \PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Fabiano Costa")
            ->setLastModifiedBy("Fabiano Costa")
            ->setTitle("Gerenciador de LC-AO GPLAQ")
            ->setSubject("Gerenciador de LC-AO GPLAQ")
            ->setDescription("SISTEMA Gerenciador de LC-AO GPLAQ")
            ->setKeywords("Gerenciador de LC-AO GPLAQ")
            ->setCategory("Correios");


        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Codigo')
            ->setCellValue('B1', 'Unidade')
            ->setCellValue('C1', 'Data de Lançamento');

        $linha = 2;
        $qtde=0;
        while ($qtde < count($lista_de_objetos)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$linha, $lista_de_objetos[$qtde]->codigo)
                ->setCellValue('B'.$linha, $lista_de_objetos[$qtde]->identificador->nomeunidade)
                ->setCellValue('C'.$linha, $lista_de_objetos[$qtde]->data_lancamento);
            $qtde = $qtde+1;
            $linha = $linha+1;
        }

        $objPHPExcel->getActiveSheet()->setTitle('LC-AO');
        $objPHPExcel->setActiveSheetIndex(0);
        $callStartTime = microtime(true);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $nome = date('dmYHis');
        $objWriter->save($nome.'.xlsx');

/*
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public');
        $objWriter->save('php://output');
        exit;
*/
        $callEndTime = microtime(true);
        $callTime = $callEndTime - $callStartTime;

        $callStartTime = microtime(true);
    }


}