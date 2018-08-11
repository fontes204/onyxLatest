<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 06:41
 */
interface iLocalizacao
{

    //metodos gets
    public function getId();
    public function getProvincia();
    public function getMunicipio();
    public function getComuna();
    public function getBairro();
    public function getQuarterao();
    public function getSector();
    public function getRua();
    public function getLote();
    public function getBloco();
    public function setBloco($bloco);

    //metodos sets
    public function setId($id);
    public function setProvincia($provincia);
    public function setMunicipio($municipio);
    public function setComuna($comuna);
    public function setBairro($bairro);
    public function setQuarterao($quarterao);
    public function setSector($sector);
    public function setRua($rua);
    public function setLote($lote);
}