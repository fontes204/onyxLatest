<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 09/10/2016
 * Time: 21:11
 */
class Vertice extends Atributo
{
    protected $_id;
    protected $_longitude;
    protected $_latitude;
    protected $_id_terreno;
    protected $_p_front;

    /**
     * Vertice constructor.
     * @param $_longitude
     * @param $_latitude
     * @param $_id_terreno
     * @param $_p_front
     */
    public function __construct($_longitude=null, $_latitude=null, $_id_terreno=null, $_p_front=null)
    {
        $this->_longitude = $_longitude;
        $this->_latitude = $_latitude;
        $this->_id_terreno = $_id_terreno;
        $this->_p_front = $_p_front;
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
    public function getLongitude()
    {
        return $this->_longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->_longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->_latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->_latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getIdterreno()
    {
        return $this->_id_terreno;
    }

    /**
     * @param mixed $idterreno
     */
    public function setIdterreno($idterreno)
    {
        $this->_id_terreno = $idterreno;
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


}