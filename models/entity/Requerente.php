<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:46
 */
class Requerente extends Atributo implements iRequerente
{
    
    protected $_id;
    protected $_nome;
    protected $_telefone;
    protected $_email;
    protected $_id_morada;
    protected $_tipo;

    /**
     * Requerente constructor.
     * @param $_nome
     * @param $_telefone
     * @param $_email
     * @param $_id_morada
     * @param $_tipo
     */
    public function __construct($_nome=null, $_telefone=null, $_email=null, $_id_morada=null, $_tipo=null)
    {
        $this->_nome = $_nome;
        $this->_telefone = $_telefone;
        $this->_email = $_email;
        $this->_id_morada = $_id_morada;
        $this->_tipo = $_tipo;
    }


    function get_id() {
        return $this->_id;
    }

    function get_nome() {
        return $this->_nome;
    }

    function get_id_morada() {
        return $this->_id_morada;
    }

    function get_telefone() {
        return $this->_telefone;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_nome($_nome) {
        $this->_nome = $_nome;
    }

    function set_id_morada($_id_morada) {
        $this->_id_morada = $_id_morada;
    }

    function set_telefone($_telefone) {
        $this->_telefone = $_telefone;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->_tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->_tipo = $tipo;
    }

}