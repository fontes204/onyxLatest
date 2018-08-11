<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 25/06/17
 * Time: 11:40
 */
class Provincia extends Atributo
{
    protected $_id;
    protected $_nome;
    protected $_sigla;
    protected $_longitude;
    protected $_latitude;

    /**
     * Provincia constructor.
     * @param $_nome
     * @param $_sigla
     * @param $_longitude
     * @param $_latitude
     */
    public function __construct($_nome=null, $_sigla=null, $_longitude=null, $_latitude=null)
    {
        $this->_nome = $_nome;
        $this->_sigla = $_sigla;
        $this->_longitude = $_longitude;
        $this->_latitude = $_latitude;
    }


}