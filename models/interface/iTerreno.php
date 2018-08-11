<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 05:39
 */
interface iTerreno
{

    //metodos gets
    public function getId();
    public function getCodigoTerreno();
    public function getArea();
    public function getComprimento();
    public function getLargura();
    public function getIdcadastrante();
    public function getIdlocalizacao();
    public function getIdutente();


    //metodos sets
    public function setId($id);
    public function setCodigoTerreno($codigoTerreno);
    public function setArea($area);
    public function setLargura($largura);
    public function setComprimento($comprimento);
    public function setIdlocalizacao($idlocalizacao);
    public function setIdcadastrante($idcadastrante);
    public function setIdutente($idutente);
}