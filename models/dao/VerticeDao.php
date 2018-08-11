<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 07/10/2016
 * Time: 07:58
 */
class VerticeDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(Vertice $vertice)
    {
        if($this->insert($vertice->parametro()))
            return $this->ultimoElemento($vertice->pegarClasse())->_id;
        else
            return 0;
    }

    public function minLong($zona)
    {
        $campos=array('min(v._longitude) as minLong');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id and t._id_zona=z._id and t._id=?';
        $dados=array($zona);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetch();
    }

    public function maxLong($zona)
    {
        $campos=array('max(v._longitude) as maxLong');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id and t._id_zona=z._id and t._id=?';
        $dados=array($zona);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetch();
    }

    public function minLat($zona)
    {
        $campos=array('min(v._latitude) as minLat');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id and t._id_zona=z._id and t._id=?';
        $dados=array($zona);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetch();
    }

    public function maxLat($zona)
    {
        $campos=array('max(v._latitude) as maxLat');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id and t._id_zona=z._id and t._id=?';
        $dados=array($zona);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetch();
    }

    public function verSobrePosicao($lng,$lat,$loc)
    {
        if (($lng>$this->minLong($loc)->minLong && $lng<$this->maxLong($loc)->maxLong) && ($lat>$this->minLat($loc)->minLat && $lat<$this->maxLat($loc)->maxLat))
            return 1;
        else
            return 0;
    }

//    public function Sobreposicao($loP1,$laP1,$zona) {
//
//        //ver todos os vertices de cada terreno numa zona
//        $campos=array('distinct v._latitude, v._longitude ,v._id as cod ,v._id_terreno as idTerreno');
//        $tabela='vertice v, terreno t, zona z';
//        $cond='v._id_terreno=t._id AND t._id_zona=?';
//        $dados=array($zona);
////        $verTudoCadavert=
//            return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetchAll();
//
////        $id=0;
////        foreach ($verTudoCadavert as $dadosTerreno) {
////            $id[]=$dadosTerreno;
//////                =$this->verSobrePosicao($loP1,$laP1,$dadosTerreno->idTerreno);
////
//////                if($this->verSobrePosicao($loP1,$laP1,$dadosTerreno->idTerreno)==1)
//////                    $id=$dadosTerreno->idTerreno;
//////                else
//////                    $id=0;
////        }
//           // return $id;
//    }

    public function todosTerrenosZona($zona) {

        //ver todos os vertices de cada terreno numa zona
        $campos=array('distinct v._latitude, v._longitude ,v._id as cod ,v._id_terreno as idTerreno');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id AND t._id_zona=?';
        $dados=array($zona);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetchAll();
    }

    public function dadosTerreno($id)
    {
        $campos=array('*');
        $tabela='terreno t';
        $cond='t._id=?';
        $dados=array($id);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetchAll();
    }
    public function terrenoFronteirico($lng,$lat,$loc)
    {
        
    }
}