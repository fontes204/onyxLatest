<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 09/10/2016
 * Time: 21:07
 */
class Relatorio extends Atributo
{
   protected $_id;
   protected $_observacao;
   protected $_id_pocesso;
   protected $_data;

    /**
     * Relatorio constructor.
     * @param $_observacao
     * @param $_confrontacao
     * @param $_id_pocesso
     * @param $_data
     */
    public function __construct($_observacao=null, $_id_pocesso=null, $_data=null)
    {
        $this->_observacao = $_observacao;
        $this->_id_pocesso = $_id_pocesso;
        $this->_data = $_data;
    }


}