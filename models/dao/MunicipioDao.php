<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:58
 */
class MunicipioDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar($id)
    {
        $campos=array('*');
        $cond='_id_provincia=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,'municipio',$cond,$valor);
    }
}