<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 14/10/17
 * Time: 17:14
 */
class ReparticaoDao extends Model
{

    /**
     * ReparticaoDao constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Reparticao $reparticao)
    {
        if($this->insert($reparticao->parametro()))
            return 1;
        else
            return 0;
    }
}