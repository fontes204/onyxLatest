<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:51
 */
class ControlaProcessoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(ControlaProcesso $processo)
    {
        $this->insert($processo->parametro());
    }
}