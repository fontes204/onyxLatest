<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 06:50
 */
interface iFicha
{

    //metodos gets
    public function getId();
    public function getCodigo();
    public function getIdutente();

    //metodos sets
    public function setId($id);
    public function setCodigo($codigo);
    public function setIdutente($idutente);


}