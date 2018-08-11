<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 05:18
 */
class Localizacao_Municipio extends Atributo
{
    protected $_id;
    protected $_id_provincia;
    protected $_id_municipio;

    /**
     * Localizacao_Municipio constructor.
     * @param $_id_provincia
     * @param $_id_municipio
     */
    public function __construct($_id_provincia=null, $_id_municipio=null)
    {
        $this->_id_provincia = $_id_provincia;
        $this->_id_municipio = $_id_municipio;
    }


}