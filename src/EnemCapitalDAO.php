<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 26/07/2016
 * Time: 22:00
 */
namespace GPLAC;
class EnemCapitalDAO
{
    private $con;
    private $obj;
    private $lista;
    /**
     * EnemCapitalDAO constructor
     */
    public function __construct()
    {
        $this->con = Conexao::getInstance()->getConexao();
    }
    function salvar(EnemCapital $obj)
    {
        $query = sprintf("INSERT INTO capital (codigo, dataprevista, rota, ordem, destinatario, logradouro, bairro, cidade, uf, sabatina, provaespecial) VALUES ('%s', '%s', '%s', %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            mysqli_real_escape_string($this->con, $obj->getCodigo()),
            mysqli_real_escape_string($this->con, $obj->getDataprevista()),
            mysqli_real_escape_string($this->con, $obj->getRota()),
            mysqli_real_escape_string($this->con, $obj->getOrdem()),
            mysqli_real_escape_string($this->con, $obj->getDestinatario()),
            mysqli_real_escape_string($this->con, $obj->getLogradouro()),
            mysqli_real_escape_string($this->con, $obj->getBairro()),
            mysqli_real_escape_string($this->con, $obj->getCidade()),
            mysqli_real_escape_string($this->con, $obj->getUf()),
            mysqli_real_escape_string($this->con, $obj->getSabatina()),
            mysqli_real_escape_string($this->con, $obj->getProvaespecial())
        );
        if(!mysqli_query($this->con, $query)) {
            die('[ERRO]: Class('.get_class($obj).') | Metodo(Cadastrar) | Erro('.mysqli_error($this->con).')');
        }
        return mysqli_insert_id($this->con);
    }

    function mudarStatus($codigo)
    {
        $query = sprintf("UPDATE capital SET status = 'TRIADO' WHERE codigo = '%s'",
            mysqli_real_escape_string($this->con, $codigo)

        );
        if(!mysqli_query($this->con, $query)){
            die('[ERRO]: Class(Enem) | Metodo(mudarStatus) | Erro('.mysqli_error($this->con).')');
        }
    }

    function buscarCodigo(EnemCapital $enem)
    {
        $codigo = $enem->getCodigo();
//        $query = sprintf("SELECT * FROM capital WHERE codigo = '%s' AND status = 'PENDENTE'",
            $query = sprintf("SELECT * FROM capital WHERE codigo = '%s'",
//        $query = sprintf("call rotear('%s')",
            mysqli_real_escape_string($this->con, $codigo)
        );
        if(!mysqli_query($this->con, $query)) {
            die('[ERRO]: Class('.get_class($enem).') | Metodo(buscarCodigo) | Erro('.mysqli_error($this->con).')');
        }
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $this->obj = $row;
        }
        self::mudarStatus($codigo);
        return $this->obj;

    }

    function contarResto()
    {
        $query = sprintf("SELECT * FROM capital WHERE status = 'PENDENTE'");
        if(!mysqli_query($this->con, $query)) {
            die('[ERRO]: Class(Enem) | Metodo(contarResto) | Erro('.mysqli_error($this->con).')');
        }
        $result = mysqli_query($this->con, $query);

        return $result->num_rows;
    }

    function gerarPainel($data)
    {
        $diadaprova = "";
        if($data == '2016-11-05'){
            $diadaprova = 'sabadocapital';
        }else if($data == '2016-11-06'){
            $diadaprova = 'domingocapital';
        }
        
        $query = sprintf("SELECT * FROM $diadaprova");

        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $sql = sprintf("select count(*) AS qtde from capital where rota = '%s'  AND status = 'TRIADO' AND dataprevista = '%s'",
                mysqli_real_escape_string($this->con, $row['rota']),
                mysqli_real_escape_string($this->con, $data)
            );
            $re = mysqli_query($this->con, $sql);
            while ($linha = mysqli_fetch_assoc($re)){
                $qnt = $linha['qtde'];
            }
            $row['conferidos'] = $qnt;
            $rotas[] = $row;
        }

        return $rotas;
    }
}