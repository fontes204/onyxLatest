<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 14/10/17
 * Time: 17:12
 */
class Reparticao extends Atributo
{
    protected $_id;
    protected $_id_provincia;
    protected $_nome;
    protected $_estado;

    /**
     * Reparticao constructor.
     * @param $_id_provincia
     * @param $_nome
     * @param $_estado
     */
    public function __construct($_id_provincia=null, $_nome=null, $_estado=null)
    {
        $this->_id_provincia = $_id_provincia;
        $this->_nome = $_nome;
        $this->_estado = $_estado;
    }


}