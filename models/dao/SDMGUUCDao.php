<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:56
 */
class SDMGUUCDao extends UtilizadorDao
{
    public function __construct() {
        parent::__construct();
    }

    public function registar1(CGA $CGA)
    {
        if($this->insert($CGA->parametroFilho()))
            return 1;
        else
            return 0;
    }
}