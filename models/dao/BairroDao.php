<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:59
 */
class BairroDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar($id)
    {
        $campos=array('*');
        $cond='_id_comuna=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,'bairro',$cond,$valor);
    }
}