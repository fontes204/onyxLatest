<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:53
 */
class ParecerDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(Parecer $parecer)
    {
        if($this->insert($parecer->parametro()))
            return 1;
        else
            return 0;
    }

    public function buscarFase($_id_processo)
    {
        $campos=array('_id_fase');
        $cond='_id_processo=? ORDER BY _id DESC LIMIT 1';
        $vl=array($_id_processo);
        $var=$this->buscaExaustiva($campos,'parecer',$cond,$vl)->fetchAll(2);
        if(count($var)==0) {
            return -1;
        }else{
            return $var;
        }
    }

    public function fase($_id_processo)
    {
        $campos=array('_id_fase');
        $cond='_id_processo=? ORDER BY _id DESC LIMIT 1';
        $vl=array($_id_processo);
        return $this->buscaExaustiva($campos,'parecer',$cond,$vl)->fetchObject();
    }

}