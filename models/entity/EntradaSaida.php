<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:37
 */
class EntradaSaida extends Atributo
{
    protected $_id;
    protected $_data;
    protected $_descOrg;
    protected $_idOrg;
    protected $_descDest;
    protected $_idDest;
    protected $_id_processo;
    protected $_estado;

    /**
     * EntradaSaida constructor.
     * @param $_data
     * @param $_descOrg
     * @param $_idOrg
     * @param $_descDest
     * @param $_idDest
     * @param $_id_processo
     * @param $_estado
     */
    public function __construct($_data=null, $_descOrg=null, $_idOrg=null, $_descDest=null, $_idDest=null, $_id_processo=null, $_estado=null)
    {
        $this->_data = $_data;
        $this->_descOrg = $_descOrg;
        $this->_idOrg = $_idOrg;
        $this->_descDest = $_descDest;
        $this->_idDest = $_idDest;
        $this->_id_processo = $_id_processo;
        $this->_estado = $_estado;
    }


}