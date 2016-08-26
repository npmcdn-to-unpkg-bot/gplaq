<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 18:54
 */

namespace GPLAC;


class Objeto
{
    private $id;
    private $codigo;
    private $identificador;
    private $recebido;
    private $datalancamento;
    private $databaixa;

    /**
     * Objeto constructor.
     * @param $id
     * @param $codigo
     * @param $identificador
     * @param $recebido
     * @param $datalancamento
     * @param $databaixa
     */
    public function __construct(
        $id=NULL,
        $codigo=NULL,
        $identificador=NULL,
        $recebido=NULL,
        $datalancamento=NULL,
        $databaixa=NULL)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->identificador = $identificador;
        $this->recebido = $recebido;
        $this->datalancamento = $datalancamento;
        $this->databaixa = $databaixa;
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
     * @return Objeto
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param null $codigo
     * @return Objeto
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
     * @return Objeto
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecebido()
    {
        return $this->recebido;
    }

    /**
     * @param mixed $recebido
     * @return Objeto
     */
    public function setRecebido($recebido)
    {
        $this->recebido = $recebido;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatalancamento()
    {
        return $this->datalancamento;
    }

    /**
     * @param mixed $datalancamento
     * @return Objeto
     */
    public function setDatalancamento($datalancamento)
    {
        $this->datalancamento = $datalancamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatabaixa()
    {
        return $this->databaixa;
    }

    /**
     * @param mixed $databaixa
     * @return Objeto
     */
    public function setDatabaixa($databaixa)
    {
        $this->databaixa = $databaixa;
        return $this;
    }



}