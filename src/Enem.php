<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 26/07/2016
 * Time: 21:51
 */
namespace GPLAC;
class Enem
{
    private $id;
    private $codigo;
    private $dataprevista;
    private $rota;
    private $ordem;
    private $destinatario;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $uf;
    private $sabatina;
    private $provaespecial;
    private $status;
    /**
     * Enem constructor.
     * @param $id
     * @param $codigo
     * @param $dataprevista
     * @param $rota
     * @param $ordem
     * @param $destinatario
     * @param $logradouro
     * @param $bairro
     * @param $cidade
     * @param $uf
     * @param $sabatina
     * @param $provaespecial
     * @param $status
     *
     */
    public function __construct(
        $id = null,
        $codigo = null,
        $dataprevista = null,
        $rota = null,
        $ordem = null,
        $destinatario = null,
        $logradouro = null,
        $bairro = null,
        $cidade = null,
        $uf = null,
        $sabatina = null,
        $provaespecial = null,
        $status = null
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->dataprevista = $dataprevista;
        $this->rota = $rota;
        $this->ordem = $ordem;
        $this->destinatario = $destinatario;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->sabatina = $sabatina;
        $this->provaespecial = $provaespecial;
        $this->status = $status;
    }
    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param null $id
     * @return Enem
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
     * @return Enem
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }
    /**
     * @return null
     */
    public function getDataprevista()
    {
        return $this->dataprevista;
    }
    /**
     * @param null $dataprevista
     * @return Enem
     */
    public function setDataprevista($dataprevista)
    {
        $this->dataprevista = $dataprevista;
        return $this;
    }
    /**
     * @return null
     */
    public function getRota()
    {
        return $this->rota;
    }
    /**
     * @param null $rota
     * @return Enem
     */
    public function setRota($rota)
    {
        $this->rota = $rota;
        return $this;
    }
    /**
     * @return null
     */
    public function getOrdem()
    {
        return $this->ordem;
    }
    /**
     * @param null $ordem
     * @return Enem
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
        return $this;
    }
    /**
     * @return null
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }
    /**
     * @param null $destinatario
     * @return Enem
     */
    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;
        return $this;
    }
    /**
     * @return null
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    /**
     * @param null $logradouro
     * @return Enem
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
        return $this;
    }
    /**
     * @return null
     */
    public function getBairro()
    {
        return $this->bairro;
    }
    /**
     * @param null $bairro
     * @return Enem
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }
    /**
     * @return null
     */
    public function getCidade()
    {
        return $this->cidade;
    }
    /**
     * @param null $cidade
     * @return Enem
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }
    /**
     * @return null
     */
    public function getUf()
    {
        return $this->uf;
    }
    /**
     * @param null $uf
     * @return Enem
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }
    /**
     * @return null
     */
    public function getSabatina()
    {
        return $this->sabatina;
    }
    /**
     * @param null $sabatina
     * @return Enem
     */
    public function setSabatina($sabatina)
    {
        $this->sabatina = $sabatina;
        return $this;
    }
    /**
     * @return null
     */
    public function getProvaespecial()
    {
        return $this->provaespecial;
    }
    /**
     * @param null $provaespecial
     * @return Enem
     */
    public function setProvaespecial($provaespecial)
    {
        $this->provaespecial = $provaespecial;
        return $this;
    }
    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param null $status
     * @return Enem
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}