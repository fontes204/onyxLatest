<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 09/10/2016
 * Time: 21:05
 */
class Pagamento implements iPagamento
{
    private $_id;
    private $_codigo;
    private $_data;
    private $_valor;
    private $_idsrop;
    private $_idprocesso;

    /**
     * Pagamento constructor.
     * @param $_codigo
     * @param $_data
     * @param $_valor
     * @param $_idsrop
     * @param $_idprocesso
     */
    public function __construct($_codigo=null, $_data=null, $_valor=null, $_idsrop=null, $_idprocesso=null)
    {
        $this->_codigo = $_codigo;
        $this->_data = $_data;
        $this->_valor = $_valor;
        $this->_idsrop = $_idsrop;
        $this->_idprocesso = $_idprocesso;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->_codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->_codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->_valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->_valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getIdsrop()
    {
        return $this->_idsrop;
    }

    /**
     * @param mixed $idsrop
     */
    public function setIdsrop($idsrop)
    {
        $this->_idsrop = $idsrop;
    }

    /**
     * @return mixed
     */
    public function getIdprocesso()
    {
        return $this->_idprocesso;
    }

    /**
     * @param mixed $idprocesso
     */
    public function setIdprocesso($idprocesso)
    {
        $this->_idprocesso = $idprocesso;
    }


}