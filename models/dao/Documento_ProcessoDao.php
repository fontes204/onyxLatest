<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 13/03/17
 * Time: 17:05
 */
class Documento_ProcessoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Documento_processo $processo)
    {
        if($this->insert($processo->parametro()))
            return 1;
        else
            return 0;
    }
}