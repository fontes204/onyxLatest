<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 01/03/17
 * Time: 14:12
 */
class OrganizacaoDao extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function registar(Organizacao $entity)
    {
        if($this->insert($entity->parametro()))
            return $this->ultimoElemento($entity->pegarClasse())->_id;
        else
            return 0;
    }
}