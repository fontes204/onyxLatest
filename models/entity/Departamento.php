<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 02/04/17
 * Time: 19:27
 */
class Departamento extends Atributo
{
    protected $_id;
    protected $_perfil;
    protected $_descricao;

    /**
     * Departamento constructor.
     * @param $_perfil
     * @param $_descricao
     */
    public function __construct($_perfil=null, $_descricao=null)
    {
        $this->_perfil = $_perfil;
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
    public function getPerfil()
    {
        return $this->_perfil;
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil($perfil)
    {
        $this->_perfil = $perfil;
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