<?php


class Utilizador extends Atributo
{

    protected $_id;
    protected $_id_administracao;
    protected $_nome;
    protected $_apelido;
    protected $_num_bi;
    protected $_data_nascimento;
    protected $_genero;
    protected $_telefone;
    protected $_email;
    protected $_nivel_escolar;
    protected $_morada;
    protected $_id_grupo;
    protected $_foto;
    protected $_proveniencia;
    protected $_data_emissao;
    protected $_data_valida;

    /**
     * Utilizador constructor.
     * @param $_nome
     * @param $_apelido
     * @param $_num_bi
     * @param $_data_nascimento
     * @param $_genero
     * @param $_telefone
     * @param $_email
     * @param $_nivel_escolar
     * @param $_morada
     * @param $_id_grupo
     * @param $_foto
     * @param $_proveniencia
     * @param $_data_emissao
     * @param $_data_valida
     */
    public function __construct($_id_administracao=null,$_nome=null, $_apelido=null, $_num_bi=null, $_data_nascimento=null, $_genero=null, $_telefone=null, $_email=null, $_nivel_escolar=null, $_morada=null, $_id_grupo=null, $_foto=null, $_proveniencia=null, $_data_emissao=null, $_data_valida=null)
    {
        $this->_id_administracao = $_id_administracao;
        $this->_nome = $_nome;
        $this->_apelido = $_apelido;
        $this->_num_bi = $_num_bi;
        $this->_data_nascimento = $_data_nascimento;
        $this->_genero = $_genero;
        $this->_telefone = $_telefone;
        $this->_email = $_email;
        $this->_nivel_escolar = $_nivel_escolar;
        $this->_morada = $_morada;
        $this->_id_grupo = $_id_grupo;
        $this->_foto = $_foto;
        $this->_proveniencia = $_proveniencia;
        $this->_data_emissao = $_data_emissao;
        $this->_data_valida = $_data_valida;
    }

    /**
     * @return null
     */
    public function getMorada()
    {
        return $this->_morada;
    }

    /**
     * @param null $morada
     */
    public function setMorada($morada)
    {
        $this->_morada = $morada;
    }

    /**
     * @return null
     */
    public function getIdGrupo()
    {
        return $this->_id_grupo;
    }

    /**
     * @param null $id_grupo
     */
    public function setIdGrupo($id_grupo)
    {
        $this->_id_grupo = $id_grupo;
    }



}