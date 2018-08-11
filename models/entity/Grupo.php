<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 15/03/17
 * Time: 20:21
 */
class Grupo extends Atributo
{
    protected $_id;
    protected $_perfil;
    protected $_id_departamento;
    protected $_sigla;

    /**
     * Grupo constructor.
     * @param $_perfil
     * @param $_id_departamento
     */
    public function __construct($_perfil=null,$_id_departamento=null,$_sigla=null)
    {
        $this->_perfil = $_perfil;
        $this->_id_departamento=$_id_departamento;
        $this->_sigla=$_sigla;
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
     * @return null
     */
    public function getIdDepartamento()
    {
        return $this->_id_departamento;
    }

    /**
     * @param null $id_departamento
     */
    public function setIdDepartamento($id_departamento)
    {
        $this->_id_departamento = $id_departamento;
    }

    /**
     * @return null
     */
    public function getSigla()
    {
        return $this->_sigla;
    }

    /**
     * @param null $sigla
     */
    public function setSigla($sigla)
    {
        $this->_sigla = $sigla;
    }


}