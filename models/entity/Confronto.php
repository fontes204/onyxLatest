<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 29/05/17
 * Time: 15:15
 */
class Confronto extends Atributo
{
    protected $_id;
    protected $_id_relatorio;
    protected $_nordeste;
    protected $_sudeste;
    protected $_sudoeste;
    protected $_noroeste;

    /**
     * Confronto constructor.
     * @param $_id_relatorio
     * @param $_nordeste
     * @param $_sudeste
     * @param $_sudoeste
     * @param $_noroeste
     */
    public function __construct($_id_relatorio=null, $_nordeste=null, $_sudeste=null, $_sudoeste=null, $_noroeste=null)
    {
        $this->_id_relatorio = $_id_relatorio;
        $this->_nordeste = $_nordeste;
        $this->_sudeste = $_sudeste;
        $this->_sudoeste = $_sudoeste;
        $this->_noroeste = $_noroeste;
    }


}