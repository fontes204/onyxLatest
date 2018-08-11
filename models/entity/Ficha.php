<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 09/10/2016
 * Time: 21:02
 */
class Ficha extends Atributo implements iFicha
{
    protected $_id;
    protected $_codigo;
    protected $_id_utente;

    /**
     * Ficha constructor.
     * @param $_codigo
     * @param $_id_utente
     */
    public function __construct($_codigo=null, $_id_utente=null)
    {
        $this->_codigo = $_codigo;
        $this->_id_utente = $_id_utente;
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
    public function getIdutente()
    {
        return $this->_id_utente;
    }

    /**
     * @param mixed $idutente
     */
    public function setIdutente($idutente)
    {
        $this->_id_utente = $idutente;
    }


}