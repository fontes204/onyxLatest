<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 15/06/17
 * Time: 23:49
 */


class Proprietario_org extends Atributo
{
    protected $_id;
    protected $_id_organizacao;
    protected $_nome;
    protected $_telefone;
    protected $_pais;
    protected $_numDI;

    /**
     * Proprietario_org constructor.
     * @param $_id_organizacao
     * @param $_nome
     * @param $_telefone
     * @param $_pais
     * @param $_numDI
     */
    public function __construct($_id_organizacao, $_nome, $_telefone, $_pais, $_numDI)
    {
        $this->_id_organizacao = $_id_organizacao;
        $this->_nome = $_nome;
        $this->_telefone = $_telefone;
        $this->_pais = $_pais;
        $this->_numDI = $_numDI;
    }

    /**
     * @return mixed
     */
    public function getIdOrganizacao()
    {
        return $this->_id_organizacao;
    }

    /**
     * @param mixed $id_organizacao
     */
    public function setIdOrganizacao($id_organizacao)
    {
        $this->_id_organizacao = $id_organizacao;
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
    public function getPais()
    {
        return $this->_pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais)
    {
        $this->_pais = $pais;
    }

    /**
     * @return mixed
     */
    public function getNumDI()
    {
        return $this->_numDI;
    }

    /**
     * @param mixed $numDI
     */
    public function setNumDI($numDI)
    {
        $this->_numDI = $numDI;
    }


}