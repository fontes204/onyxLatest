<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 05:17
 */
class Localizacao_MunicipioDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Localizacao_Municipio $entity)
    {
        if($this->insert($entity->parametro()))
            return $this->ultimoElemento($entity->pegarClasse())->_id;
        else
            return 0;
    }

    public function get($id)
    {

    }
}