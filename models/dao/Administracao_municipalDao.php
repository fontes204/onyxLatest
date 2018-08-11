<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 05:12
 */
class Administracao_MunicipalDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Administracao_municipal $entity)
    {
        if($this->insert($entity->parametro()))
            return 1;
        else
            return 0;
    }

    public function actualizar($param=array())
    {
        $stmt=self::conn()->prepare('update administracao_municipal set _estado=? where _id=?');
        if($stmt->execute($param))
            return 1;
        else
            return 0;
    }
}