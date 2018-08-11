<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:44
 */
class Terreno extends Atributo
{
    protected $_id;
    protected $_codigoterreno;
    protected $_area;
    protected $_largura;
    protected $_comprimento;
    protected $_quateirao;
    protected $_bloco;
    protected $_lote;
    protected $_numVert;
    protected $_id_zona;
    protected $_id_utilizador;
    protected $_id_utente;

    /**
     * Terreno constructor.
     * @param $_codigoterreno
     * @param $_area
     * @param $_largura
     * @param $_comprimento
     * @param $_quateirao
     * @param $_bloco
     * @param $_lote
     * @param $_numVert
     * @param $_id_localizacao
     * @param $_id_utilizador
     * @param $_id_utente
     */
    public function __construct($_codigoterreno=null, $_area=null, $_largura=null, $_comprimento=null, $_quateirao=null, $_bloco=null, $_lote=null, $_numVert=null, $_id_zona=null, $_id_utilizador=null, $_id_utente=null)
    {
        $this->_codigoterreno = $_codigoterreno;
        $this->_area = $_area;
        $this->_largura = $_largura;
        $this->_comprimento = $_comprimento;
        $this->_quateirao = $_quateirao;
        $this->_bloco = $_bloco;
        $this->_lote = $_lote;
        $this->_numVert = $_numVert;
        $this->_id_zona = $_id_zona;
        $this->_id_utilizador = $_id_utilizador;
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
     * @return null
     */
    public function getCodigoterreno()
    {
        return $this->_codigoterreno;
    }

    /**
     * @return null
     */
    public function getArea()
    {
        return $this->_area;
    }

    /**
     * @return null
     */
    public function getLargura()
    {
        return $this->_largura;
    }

    /**
     * @return null
     */
    public function getComprimento()
    {
        return $this->_comprimento;
    }

    /**
     * @return null
     */
    public function getQuateirao()
    {
        return $this->_quateirao;
    }

    /**
     * @return null
     */
    public function getBloco()
    {
        return $this->_bloco;
    }

    /**
     * @return null
     */
    public function getLote()
    {
        return $this->_lote;
    }

    /**
     * @return null
     */
    public function getNumVert()
    {
        return $this->_numVert;
    }

    /**
     * @return null
     */
    public function getIdZona()
    {
        return $this->_id_zona;
    }

    /**
     * @return null
     */
    public function getIdUtilizador()
    {
        return $this->_id_utilizador;
    }

    /**
     * @return null
     */
    public function getIdUtente()
    {
        return $this->_id_utente;
    }

    public function dimensao($valor)
    {
        return explode("x",$valor);
    }

}