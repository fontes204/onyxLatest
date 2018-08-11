<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 05:26
 */
interface iVertice
{
    //metodos gets
    public function getDescricao();
    public function getLongitude();
    public function getLatitude();
    public function getIdterreno();


    //metodos sets
    public function setDescricao($descricao);
    public function setLongitude($longitude);
    public function setLatitude($latitude);
    public function setIdterreno($idterreno);
}