<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:55
 */
class SecretariaGeralDao extends UtilizadorDao
{
    public function __construct() {
        parent::__construct();
    }

    public function registar1(SecretariaGeral $geral)
    {
        if($this->insert($geral->parametroFilho()))
            return 1;
        else
            return 0;
    }
}