<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 07/10/2016
 * Time: 08:03
 */
class LocalizacaoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(Localizacao $localizacao)
    {
        if($this->insert($localizacao->parametro()))
            return $this->ultimoElemento($localizacao->pegarClasse())->_id;
        else
            return 0;
    }
}