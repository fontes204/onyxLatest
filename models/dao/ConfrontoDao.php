<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 29/05/17
 * Time: 15:17
 */
class ConfrontoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Confronto $confronto)
    {
        if($this->insert($confronto->parametro()))
            return 1;
        else
            return 0;
    }
}