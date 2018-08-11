<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:59
 */
class TecnicoDao extends UtilizadorDao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar1(Tecnico $tecnico)
    {
        if($this->insert($tecnico->parametroFilho()))
            return 1;
        else
            return 0;
    }
}