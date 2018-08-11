<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 14:00
 */
class RuaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar($id)
    {
        $campos=array('*');
        $cond='_id_bairro=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,'rua',$cond,$valor);
    }
}