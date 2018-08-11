<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:39
 */
class ControlaProcesso extends Atributo
{
    protected $_id;
    protected $_estado_anterior;
    protected $_estado_actual;
    protected $_estado_posterior;
    protected $_id_processo;

    /**
     * ControlaProcesso constructor.
     * @param $_estado_anterior
     * @param $_estado_actual
     * @param $_estado_posterior
     * @param $_id_processo
     */
    public function __construct($_estado_anterior=null, $_estado_actual=null, $_estado_posterior=null, $_id_processo=null)
    {
        $this->_estado_anterior = $_estado_anterior;
        $this->_estado_actual = $_estado_actual;
        $this->_estado_posterior = $_estado_posterior;
        $this->_id_processo = $_id_processo;
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
    public function getEstadoAnterior()
    {
        return $this->_estado_anterior;
    }

    /**
     * @param mixed $estado_anterior
     */
    public function setEstadoAnterior($estado_anterior)
    {
        $this->_estado_anterior = $estado_anterior;
    }

    /**
     * @return mixed
     */
    public function getEstadoActual()
    {
        return $this->_estado_actual;
    }

    /**
     * @param mixed $estado_actual
     */
    public function setEstadoActual($estado_actual)
    {
        $this->_estado_actual = $estado_actual;
    }

    /**
     * @return mixed
     */
    public function getEstadoPosterior()
    {
        return $this->_estado_posterior;
    }

    /**
     * @param mixed $estado_posterior
     */
    public function setEstadoPosterior($estado_posterior)
    {
        $this->_estado_posterior = $estado_posterior;
    }

    /**
     * @return mixed
     */
    public function getIdProcesso()
    {
        return $this->_id_processo;
    }

    /**
     * @param mixed $id_processo
     */
    public function setIdProcesso($id_processo)
    {
        $this->_id_processo = $id_processo;
    }


}