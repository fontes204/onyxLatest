<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:53
 */
class AdministradorDao extends UtilizadorDao
{
    public function __construct() {
        parent::__construct();
    }

    public function registar1(Administrador $administrador)
    {
        if($this->insert($administrador->parametroFilho()))
            return 1;
        else
            return 0;
    }
}