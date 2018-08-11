<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 28/04/17
 * Time: 23:43
 */
class Zona extends Atributo
{
    protected $_id;
    protected $_nome;
    protected $_id_provincia;
    protected $_id_municipio;
    protected $_id_comuna;
    protected $_id_bairro;

    /**
     * Zona constructor.
     * @param $_nome
     * @param $_id_provincia
     * @param $_id_municipio
     * @param $_id_comuna
     * @param $_id_bairro
     */
    public function __construct($_nome=null, $_id_provincia=null, $_id_municipio=null, $_id_comuna=null, $_id_bairro=null)
    {
        $this->_nome = $_nome;
        $this->_id_provincia = $_id_provincia;
        $this->_id_municipio = $_id_municipio;
        $this->_id_comuna = $_id_comuna;
        $this->_id_bairro = $_id_bairro;
    }


}