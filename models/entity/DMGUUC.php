<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:41
 */
class DMGUUC extends Utilizador
{
    protected $_id;
    protected $_id_utilizador;

    /**
     * DMGUUC constructor.
     * @param $_id_utilizador
     */
    public function __construct($_id_utilizador=null)
    {
        $this->_id_utilizador = $_id_utilizador;
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


}