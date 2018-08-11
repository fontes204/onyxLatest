<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 12/01/17
 * Time: 15:38
 */
class Documento extends Atributo
{
    protected $_id;
    protected $_nome;
    protected $_descricao;
    protected $_status;

    /**
     * Documento constructor.
     * @param $_nome
     * @param $_descricao
     * @param $_status
     */
    public function __construct($_nome=null, $_descricao=null, $_status=null)
    {
        $this->_nome = $_nome;
        $this->_descricao = $_descricao;
        $this->_status = $_status;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->_nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->_nome = $nome;
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
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }


}