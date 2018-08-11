<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 13/03/17
 * Time: 16:52
 */
class Documento_processo extends Atributo
{
    protected $_id;
    protected $_id_documento;
    protected $_id_processo;
    protected $_foto;

    /**
     * Documento_processo constructor.
     * @param $_id_documento
     * @param $_id_processo
     * @param $_foto
     */
    public function __construct($_id_documento=null, $_id_processo=null, $_foto=null)
    {
        $this->_id_documento = $_id_documento;
        $this->_id_processo = $_id_processo;
        $this->_foto = $_foto;
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
    public function getIdDocumento()
    {
        return $this->_id_documento;
    }

    /**
     * @param mixed $id_documento
     */
    public function setIdDocumento($id_documento)
    {
        $this->_id_documento = $id_documento;
    }

    /**
     * @return mixed
     */
    public function getIdProcesso()
    {
        return $this->_id_processo;
    }

    /**
     * @param mixed $id_processo
     */
    public function setIdProcesso($id_processo)
    {
        $this->_id_processo = $id_processo;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->_foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->_foto = $foto;
    }


}