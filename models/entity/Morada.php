<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Morada
 *
 * @author elviosadoc
 */
class Morada extends Atributo {
    //put your code here
    protected $_id;
    protected $_id_provincia;
    protected $_id_municipio;
    protected $_id_comuna;
    protected $_id_bairro;
    protected $_id_rua;

    /**
     * Morada constructor.
     * @param $_id_provincia
     * @param $_id_municipio
     * @param $_id_comuna
     * @param $_id_bairro
     * @param $_id_rua
     */
    public function __construct($_id_provincia=null, $_id_municipio=null, $_id_comuna=null, $_id_bairro=null, $_id_rua=null)
    {
        $this->_id_provincia = $_id_provincia;
        $this->_id_municipio = $_id_municipio;
        $this->_id_comuna = $_id_comuna;
        $this->_id_bairro = $_id_bairro;
        $this->_id_rua = $_id_rua;
    }


    function get_id() {
        return $this->_id;
    }

    function get_id_provincia() {
        return $this->_id_provincia;
    }

    function get_id_municipio() {
        return $this->_id_municipio;
    }

    function get_id_comuna() {
        return $this->_id_comuna;
    }

    function get_id_bairro() {
        return $this->_id_bairro;
    }

    function get_id_rua() {
        return $this->_id_rua;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_provincia($_id_provincia) {
        $this->_id_provincia = $_id_provincia;
    }

    function set_id_municipio($_id_municipio) {
        $this->_id_municipio = $_id_municipio;
    }

    function set_id_comuna($_id_comuna) {
        $this->_id_comuna = $_id_comuna;
    }

    function set_id_bairro($_id_bairro) {
        $this->_id_bairro = $_id_bairro;
    }

    function set_id_rua($_id_rua) {
        $this->_id_rua = $_id_rua;
    }


}
