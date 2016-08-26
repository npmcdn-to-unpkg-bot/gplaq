<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 18:59
 */


namespace GPLAC;

class ObjetoDAO
{
    private $con;
    private $obj;
    private $lista;

    /**
     * ObjetoDAO constructor
     */
    public function __construct()
    {
        $this->con = Conexao::getInstance()->getConexao();
    }

    function salvar(Objeto $obj)
    {
//        $query = sprintf("INSERT INTO objeto (codigo,identificador) VALUES ('%s','%s')",
        $query = sprintf("INSERT INTO objeto (codigo,identificador, data_lancamento) VALUES ('%s','%s', CURDATE())",
            mysqli_real_escape_string($this->con, $obj->getCodigo()),
            mysqli_real_escape_string($this->con, $obj->getIdentificador())
        );
        if(!mysqli_query($this->con, $query)) {
            die('[ERRO]: Class('.get_class($obj).') | Metodo(Cadastrar) | Erro('.mysqli_error($this->con).')');
        }

        return mysqli_insert_id($this->con);
    }

    function darBaixa(Objeto $obj)
    {
        $query = sprintf("UPDATE objeto SET recebido = '%s', data_baixa = CURDATE() WHERE codigo = '%s'",
            mysqli_real_escape_string($this->con, 'SIM'),
//            mysqli_real_escape_string($this->con, NOW()),
            mysqli_real_escape_string($this->con, $obj->getCodigo())
        );
        if(!mysqli_query($this->con, $query)) {
            die('[ERRO]: Class('.get_class($obj).') | Metodo(Cadastrar) | Erro('.mysqli_error($this->con).')');
        }else {
            return true;
        }

    }

    function listar()
    {
        $query = "SELECT * FROM objeto WHERE recebido = 'NAO'";
        $result = mysqli_query($this->con, $query);
        if(!$result) {
            die('[ERRO]: Class(Objeto) | Metodo(Listar) | Erro('.mysqli_error($this->con).')');
        }
        while ($row = mysqli_fetch_object($result)){

            $UnDAO = new UnidadeDAO();
            $row->identificador = $UnDAO->buscarPorIdentificador(new Unidade($row->identificador));
            $this->lista[] = $row;
        }

        return $this->lista;
    }

//    function listar($identUnidade = null)
//    {
//        $query = "";
//
////        if($identUnidade != null){
////            $query = "SELECT * FROM objeto WHERE identificador = $identUnidade";
////        }else{
////            $query = "SELECT * FROM objeto WHERE recebido = 'NAO'";
////        }
//        $query = "SELECT * FROM objeto WHERE identificador = $identUnidade";
//        $result = mysqli_query($this->con, $query);
//        if(!$result) {
//            die('[ERRO]: Class(Objeto) | Metodo(listarPorUnidade) | Erro('.mysqli_error($this->con).')');
//        }
//        while ($row = mysqli_fetch_object($result)){
//
//            $UnDAO = new UnidadeDAO();
//            $row->identificador = $UnDAO->buscarPorIdentificador(new Unidade($row->identificador));
//            $this->lista[] = $row;
//        }
//
//        return $this->lista;
//
//    }

    function listarDoDia()
    {
        $query = "SELECT * FROM objeto WHERE recebido = 'NAO' AND data_lancamento = CURDATE()";
        $result = mysqli_query($this->con, $query);
        if(!$result) {
            die('[ERRO]: Class(Objeto) | Metodo(Listar) | Erro('.mysqli_error($this->con).')');
        }
        while ($row = mysqli_fetch_object($result)){

            $UnDAO = new UnidadeDAO();
            $row->identificador = $UnDAO->buscarPorIdentificador(new Unidade($row->identificador));
            $this->lista[] = $row;
        }

        return $this->lista;
    }


}