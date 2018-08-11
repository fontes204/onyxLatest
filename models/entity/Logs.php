<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 17/03/17
 * Time: 07:53
 */
class Logs extends Atributo
{
    protected $_id;
    protected $_id_utilizador;
    protected $_tempo;
    protected $_entidade;
    protected $_operacao;
    protected $_ip;

    /**
     * Logs constructor.
     * @param $_id_utilizador
     * @param $_tempo
     * @param $_entidade
     * @param $_operacao
     * @param $_ip
     */
    public function __construct($_id_utilizador=null, $_tempo=null, $_entidade=null, $_operacao=null, $_ip=null)
    {
        $this->_id_utilizador = $_id_utilizador;
        $this->_tempo = $_tempo;
        $this->_entidade = $_entidade;
        $this->_operacao = $_operacao;
        $this->_ip = $_ip;
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

    /**
     * @return mixed
     */
    public function getTempo()
    {
        return $this->_tempo;
    }

    /**
     * @param mixed $tempo
     */
    public function setTempo($tempo)
    {
        $this->_tempo = $tempo;
    }

    /**
     * @return mixed
     */
    public function getEntidade()
    {
        return $this->_entidade;
    }

    /**
     * @param mixed $entidade
     */
    public function setEntidade($entidade)
    {
        $this->_entidade = $entidade;
    }

    /**
     * @return mixed
     */
    public function getOperacao()
    {
        return $this->_operacao;
    }

    /**
     * @param mixed $operacao
     */
    public function setOperacao($operacao)
    {
        $this->_operacao = $operacao;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->_ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->_ip = $ip;
    }


}