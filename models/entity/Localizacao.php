<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 09/10/2016
 * Time: 21:04
 */
class Localizacao extends Atributo
{
    protected $_id;
    protected $_id_provincia;
    protected $_id_municipio;
    protected $_id_comuna;

    /**
     * Localizacao constructor.
     * @param $_id_provincia
     * @param $_id_municipio
     * @param $_id_comuna
     */
    public function __construct($_id_provincia=null, $_id_municipio=null, $_id_comuna=null)
    {
        $this->_id_provincia = $_id_provincia;
        $this->_id_municipio = $_id_municipio;
        $this->_id_comuna = $_id_comuna;
    }

    /**
     * @return null
     */
    public function getIdProvincia()
    {
        return $this->_id_provincia;
    }

    /**
     * @param null $id_provincia
     */
    public function setIdProvincia($id_provincia)
    {
        $this->_id_provincia = $id_provincia;
    }

    /**
     * @return null
     */
    public function getIdMunicipio()
    {
        return $this->_id_municipio;
    }

    /**
     * @param null $id_municipio
     */
    public function setIdMunicipio($id_municipio)
    {
        $this->_id_municipio = $id_municipio;
    }

    /**
     * @return null
     */
    public function getIdComuna()
    {
        return $this->_id_comuna;
    }

    /**
     * @param null $id_comuna
     */
    public function setIdComuna($id_comuna)
    {
        $this->_id_comuna = $id_comuna;
    }



}