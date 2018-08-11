<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 06:33
 */
interface iPagamento
{

    //metodos gets
    public function getId();
    public function getCodigo();
    public function getData();
    public function getValor();
    public function getIdsrop();
    public function getIdprocesso();

    //metodos sets
    public function setId($id);
    public function setCodigo($codigo);
    public function setData($data);
    public function setValor($valor);
    public function setIdsrop($idsrop);
    public function setIdprocesso($idprocesso);

}