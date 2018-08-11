<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:41
 */
class Processo extends Atributo
{
    
    protected $_id;
    protected $_num_processoGeral;
    protected $_assunto;
    protected $_id_utilizador;
    protected $_id_requerente;
    protected $_id_distrito;
    protected $_id_administracao;
    protected $_id_prioridade;

    /**
     * Processo constructor.
     * @param $_num_processoGeral
     * @param $_assunto
     * @param $_id_utilizador
     * @param $_id_requerente
     * @param $_tipo
     */
    public function __construct($_num_processoGeral=null, $_assunto=null, $_id_utilizador=null, $_id_requerente=null,$_id_distrito=null,$_id_administracao=null,$_id_prioridade=null)
    {
        $this->_num_processoGeral = $_num_processoGeral;
        $this->_assunto = $_assunto;
        $this->_id_utilizador = $_id_utilizador;
        $this->_id_requerente = $_id_requerente;
        $this->_id_distrito = $_id_distrito;
        $this->_id_administracao=$_id_administracao;
        $this->_id_prioridade=$_id_prioridade;
    }

    /**
     * @return null
     */
    public function getNumProcessoGeral()
    {
        return $this->_num_processoGeral;
    }

    /**
     * @param null $num_processoGeral
     */
    public function setNumProcessoGeral($num_processoGeral)
    {
        $this->_num_processoGeral = $num_processoGeral;
    }

    /**
     * @return null
     */
    public function getAssunto()
    {
        return $this->_assunto;
    }

    /**
     * @param null $assunto
     */
    public function setAssunto($assunto)
    {
        $this->_assunto = $assunto;
    }

    /**
     * @return null
     */
    public function getIdUtilizador()
    {
        return $this->_id_utilizador;
    }

    /**
     * @param null $id_utilizador
     */
    public function setIdUtilizador($id_utilizador)
    {
        $this->_id_utilizador = $id_utilizador;
    }

    /**
     * @return null
     */
    public function getIdRequerente()
    {
        return $this->_id_requerente;
    }

    /**
     * @param null $id_requerente
     */
    public function setIdRequerente($id_requerente)
    {
        $this->_id_requerente = $id_requerente;
    }

    /**
     * @return null
     */
    public function getTipo()
    {
        return $this->_id_distrito;
    }

    /**
     * @param null $tipo
     */
    public function setTipo($tipo)
    {
        $this->_id_distrito = $_id_distrito;
    }



}