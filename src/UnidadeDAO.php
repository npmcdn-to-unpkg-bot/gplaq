<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 19:28
 */

namespace GPLAC;

class UnidadeDAO
{
    private $con;
    private $lista;
    private $und;

    /**
     * UnidadeDAO constructor.
     */
    public function __construct()
    {
        $this->con = Conexao::getInstance()->getConexao();
        $this->lista = array();
    }

    function listar()
    {
        $query = "SELECT * FROM unidade";
        $result = mysqli_query($this->con, $query);
        if(!$result) {
            die('[ERRO]: Class(Unidade) | Metodo(Listar) | Erro('.mysqli_error($this->con).')');
        }
        while ($row = mysqli_fetch_object($result)){
            $this->lista[] = $row;
        }

        return $this->lista;
    }

    function buscarPorIdentificador(Unidade $und)
    {
        $query = sprintf("SELECT * FROM unidade WHERE identificador = '%s'",
            mysqli_real_escape_string($this->con, $und->getIdentificador())
        );
        $result = mysqli_query($this->con, $query);
        if(!$result) {
            die('[ERRO]: Class(Unidade) | Metodo(buscarPorIdentificador) | Erro('.mysqli_error($this->con).')');
        }
        while ($row = mysqli_fetch_object($result)){
            $this->und = $row;
        }

        return $this->und;
    }

    function cadastrar (Banco $obj) {
        $this->sql = sprintf("INSERT INTO banco (descricao, febran)
				VALUES('%s','%s')",
            mysqli_real_escape_string($this->con, $obj->getDescricao()),
            mysqli_real_escape_string($this->con, $obj->getFebran()));
        if(!mysqli_query($this->con, $this->sql)) {
            die('[ERRO]: Class('.get_class($obj).') | Metodo(Cadastrar) | Erro('.mysqli_error($this->con).')');
        }
        return mysqli_insert_id($this->con);
    }


}