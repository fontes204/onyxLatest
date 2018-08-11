<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:58
 */
class CRGUUCDao extends UtilizadorDao
{
    public function __construct() {
        parent::__construct();
    }

    public function registar1(CRGUUC $CRGUUC)
    {
        if($this->insert($CRGUUC->parametroFilho()))
            return 1;
        else
            return 0;
    }
}