<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 19:50
 */

namespace GPLAC;


class UnidadeController
{
    protected $unidade;
    protected $dao;


    /**
     * UnidadeController constructor.
     */
    public function __construct()
    {
        $this->unidade = new Unidade();
        $this->dao = new UnidadeDAO();

    }

    function listar()
    {
        $lista = $this->dao->listar();

         echo json_encode( $lista );
    }

    function salvar()
    {

    }
}