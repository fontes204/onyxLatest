<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:58
 */
class CROPDao extends UtilizadorDao
{
    public function __construct() {
        parent::__construct();
    }

    public function registar1(CROP $CROP)
    {
        if($this->insert($CROP->parametroFilho()))
            return 1;
        else
            return 0;
    }
}