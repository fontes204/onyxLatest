<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:45
 */
class RequerenteDao extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function registar(Requerente $entity)
        {
            if($this->insert($entity->parametro()))
                return $this->ultimoElemento($entity->pegarClasse())->_id;
            else
                return 0;
        }
}