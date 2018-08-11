<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:59
 */
class ComunaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar($id)
    {
        $campos=array('*');
        $cond='_id_municipio=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,'comuna',$cond,$valor);
    }

    public function listarComunaDistrito($id)
    {
        $campos=array('*');
        $tabela='distrito';
        $cond='_id_municipio=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,$tabela,$cond,$valor);
    }
}