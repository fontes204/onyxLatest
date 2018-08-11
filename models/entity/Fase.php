<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:41
 */
class Fase extends Atributo
{
    protected $_id;
    protected $_fase;
    protected $_descricao;

    /**
     * Fase constructor.
     * @param $_fase
     * @param $_descricao
     */
    public function __construct($_fase=null, $_descricao=null)
    {
        $this->_fase = $_fase;
        $this->_descricao = $_descricao;
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
    public function getFase()
    {
        return $this->_fase;
    }

    /**
     * @param mixed $fase
     */
    public function setFase($fase)
    {
        $this->_fase = $fase;
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


}