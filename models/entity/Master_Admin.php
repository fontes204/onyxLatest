<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 06:45
 */
class Master_Admin extends Atributo
{
    protected $_id;
    protected $_id_utilizador;
    protected $_id_admin;

    /**
     * Master_Admin constructor.
     * @param $_id_utilizador
     * @param $_id_admin
     */
    public function __construct($_id_utilizador=null, $_id_admin=null)
    {
        $this->_id_utilizador = $_id_utilizador;
        $this->_id_admin = $_id_admin;
    }


}