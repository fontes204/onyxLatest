<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 07/10/2016
 * Time: 08:30
 */
class FichaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(Ficha $ficha)
    {
        $this->insert($ficha->parametro());
    }
}