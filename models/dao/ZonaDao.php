<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 28/04/17
 * Time: 23:46
 */
class ZonaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Zona $zona)
    {
        return $this->insert($zona->parametro());
    }
}