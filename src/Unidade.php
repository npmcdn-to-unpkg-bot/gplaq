<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 19:26
 */

namespace GPLAC;


class Unidade
{
    private $id;
    private $nomeunidade;
    private $identificador;

    /**
     * Unidade constructor.
     * @param $identificador
     */
    public function __construct($identificador=NULL)
    {
        $this->identificador = $identificador;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Unidade
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeunidade()
    {
        return $this->nomeunidade;
    }

    /**
     * @param mixed $nomeunidade
     * @return Unidade
     */
    public function setNomeunidade($nomeunidade)
    {
        $this->nomeunidade = $nomeunidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * @param mixed $identificador
     * @return Unidade
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        return $this;
    }




}