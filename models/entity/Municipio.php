<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 14/10/17
 * Time: 09:15
 */
class Municipio extends Atributo
{
    protected   $_id;
    protected   $_nome;
    protected   $_id_provincia;

    /**
     * Municipio constructor.
     * @param $_nome
     * @param $_id_provincia
     */
    public function __construct($_nome=null, $_id_provincia=null)
    {
        $this->_nome = $_nome;
        $this->_id_provincia = $_id_provincia;
    }


}