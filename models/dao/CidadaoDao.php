<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 01/03/17
 * Time: 14:10
 */
class CidadaoDao extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function registar(Cidadao $entity)
    {
        if($this->insert($entity->parametro()))
            return $this->ultimoElemento($entity->pegarClasse())->_id;
        else
            return 0;
    }
}