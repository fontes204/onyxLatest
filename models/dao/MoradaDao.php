<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 08/01/17
 * Time: 14:18
 */
class MoradaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(Morada $morada)
    {
        if($this->insert($morada->parametro()))
            return $this->ultimoElemento($morada->pegarClasse())->_id;
        else
            return 0;
    }

    public function retornaMorada($idProv,$idMuni,$idComu,$idBairro,$idRua)
    {
        $prov=$this->listarPorId('provincia',$idProv)->fetchObject();
        $muni=$this->listarPorId('municipio',$idMuni)->fetchObject();
        $comu=$this->listarPorId('comuna',$idComu)->fetchObject();
        $bairro=$this->listarPorId('bairro',$idBairro)->fetchObject();
        $rua=$this->listarPorId('rua',$idRua)->fetchObject();
        $ret=array($prov->_nome,$muni->_nome,$comu->_nome,$bairro->_nome,$rua->_nome,);
        return $ret;
    }
}