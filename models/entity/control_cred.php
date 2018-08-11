<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 19/06/17
 * Time: 10:25
 */


class Control_Cred extends Atributo
{
    protected $_id;
    protected $_id_utilizador;
    protected $_estado;

    /**
     * Control_Cred constructor.
     * @param $_id_utilizador
     * @param $_estado
     */
    public function __construct($_id_utilizador=null, $_estado=null)
    {
        $this->_id_utilizador = $_id_utilizador;
        $this->_estado = $_estado;
    }


}