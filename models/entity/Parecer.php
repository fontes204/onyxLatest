<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:43
 */
class Parecer extends Atributo
{
    protected $_id;
    protected $_descricao;
    protected $_data;
    protected $_destino;
    protected $_id_utilizador;
    protected $_id_processo;
    protected $_id_fase;

    /**
     * Parecer constructor.
     * @param $_descricao
     * @param $_data
     * @param $_destino
     * @param $_id_utilizador
     * @param $_id_processo
     * @param $_id_fase
     */
    public function __construct($_descricao=null, $_data=null, $_destino=null, $_id_utilizador=null, $_id_processo=null, $_id_fase=null)
    {
        $this->_descricao = $_descricao;
        $this->_data = $_data;
        $this->_destino = $_destino;
        $this->_id_utilizador = $_id_utilizador;
        $this->_id_processo = $_id_processo;
        $this->_id_fase = $_id_fase;
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
    public function getDescricao()
    {
        return $this->_descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->_descricao = $descricao;
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
    public function getDestino()
    {
        return $this->_destino;
    }

    /**
     * @param mixed $destino
     */
    public function setDestino($destino)
    {
        $this->_destino = $destino;
    }

    /**
     * @return mixed
     */
    public function getIdUtilizador()
    {
        return $this->_id_utilizador;
    }

    /**
     * @param mixed $id_utilizador
     */
    public function setIdUtilizador($id_utilizador)
    {
        $this->_id_utilizador = $id_utilizador;
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

    /**
     * @return mixed
     */
    public function getIdFase()
    {
        return $this->_id_fase;
    }

    /**
     * @param mixed $id_fase
     */
    public function setIdFase($id_fase)
    {
        $this->_id_fase = $id_fase;
    }


}