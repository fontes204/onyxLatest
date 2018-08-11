<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 01/03/17
 * Time: 14:08
 */
class Organizacao extends Atributo
{
    protected $_id;
    protected $_id_requerente;
    protected $_nif;
    protected $_decreto;
    protected $_tipo_organizacao;

    /**
     * Organizacao constructor.
     * @param $_id_requerente
     * @param $_nif
     * @param $_decreto
     * @param $_tipo_organizacao
     */
    public function __construct($_id_requerente, $_nif, $_decreto, $_tipo_organizacao)
    {
        $this->_id_requerente = $_id_requerente;
        $this->_nif = $_nif;
        $this->_decreto = $_decreto;
        $this->_tipo_organizacao = $_tipo_organizacao;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdRequerente()
    {
        return $this->_id_requerente;
    }

    /**
     * @param mixed $id_requerente
     */
    public function setIdRequerente($id_requerente)
    {
        $this->_id_requerente = $id_requerente;
    }

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->_nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif)
    {
        $this->_nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getDecreto()
    {
        return $this->_decreto;
    }

    /**
     * @param mixed $decreto
     */
    public function setDecreto($decreto)
    {
        $this->_decreto = $decreto;
    }

    /**
     * @return mixed
     */
    public function getTipoOrganizacao()
    {
        return $this->_tipo_organizacao;
    }

    /**
     * @param mixed $tipo_organizacao
     */
    public function setTipoOrganizacao($tipo_organizacao)
    {
        $this->_tipo_organizacao = $tipo_organizacao;
    }


}