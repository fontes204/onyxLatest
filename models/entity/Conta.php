<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 30/12/16
 * Time: 15:51
 */
class Conta extends Atributo
{
    protected $_id;
    protected $_telefone;
    protected $_utilizador;
    protected $_senha;
    protected $_estado;
    protected $_id_utilizador;

    /**
     * Conta constructor.
     * @param $_telefone
     * @param $_utilizador
     * @param $_senha
     * @param $_estado
     * @param $_id_utilizador
     */
    public function __construct($_telefone=null, $_utilizador=null, $_senha=null, $_estado=null, $_id_utilizador=null)
    {
        $this->_telefone = $_telefone;
        $this->_utilizador = $_utilizador;
        $this->_senha = $_senha;
        $this->_estado = $_estado;
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
    public function getTelefone()
    {
        return $this->_telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->_telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getUtilizador()
    {
        return $this->_utilizador;
    }

    /**
     * @param mixed $utilizador
     */
    public function setUtilizador($utilizador)
    {
        $this->_utilizador = $utilizador;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->_senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->_senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->_estado = $estado;
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

    public function usrname($param)
    {
        $nome=explode(" ",$param);
        $user="";
        for ($i=0;$i<count($nome);$i++)
        {
            $user=$nome[0].' '.$nome[$i];
        }
            return $user;
    }

}