<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 01/03/17
 * Time: 14:05
 */
class Cidadao extends Atributo
{
    protected $_id;
    protected $_id_requerente;
    protected $_num_bi;
    protected $_data_emissao;
    protected $_data_nascimento;
    protected $_nacionalidade;
    protected $_estado_civil;
    protected $_genero;

    /**
     * Cidadao constructor.
     * @param $_id_requerente
     * @param $_num_bi
     * @param $_data_emissao
     * @param $_data_nascimento
     * @param $_nacionalidade
     * @param $_estado_civil
     * @param $_genero
     */
    public function __construct($_id_requerente=null, $_num_bi=null,$_data_emissao=null, $_data_nascimento=null, $_nacionalidade=null, $_estado_civil=null, $_genero=null)
    {
        $this->_id_requerente = $_id_requerente;
        $this->_num_bi = $_num_bi;
        $this->_data_emissao = $_data_emissao;
        $this->_data_nascimento = $_data_nascimento;
        $this->_nacionalidade = $_nacionalidade;
        $this->_estado_civil = $_estado_civil;
        $this->_genero = $_genero;
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
    public function getNumBi()
    {
        return $this->_num_bi;
    }

    /**
     * @param null $num_bi
     */
    public function setNumBi($num_bi)
    {
        $this->_num_bi = $num_bi;
    }

    /**
     * @return null
     */
    public function getDataEmissao()
    {
        return $this->_data_emissao;
    }

    /**
     * @param null $data_emissao
     */
    public function setDataEmissao($data_emissao)
    {
        $this->_data_emissao = $data_emissao;
    }

    /**
     * @return null
     */
    public function getDataNascimento()
    {
        return $this->_data_nascimento;
    }

    /**
     * @param null $data_nascimento
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->_data_nascimento = $data_nascimento;
    }

    /**
     * @return null
     */
    public function getNacionalidade()
    {
        return $this->_nacionalidade;
    }

    /**
     * @param null $nacionalidade
     */
    public function setNacionalidade($nacionalidade)
    {
        $this->_nacionalidade = $nacionalidade;
    }

    /**
     * @return null
     */
    public function getEstadoCivil()
    {
        return $this->_estado_civil;
    }

    /**
     * @param null $estado_civil
     */
    public function setEstadoCivil($estado_civil)
    {
        $this->_estado_civil = $estado_civil;
    }

    /**
     * @return null
     */
    public function getGenero()
    {
        return $this->_genero;
    }

    /**
     * @param null $genero
     */
    public function setGenero($genero)
    {
        $this->_genero = $genero;
    }


}