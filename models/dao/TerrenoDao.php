<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 16:04
 */
class TerrenoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(Terreno $terreno)
    {
        if($this->insert($terreno->parametro()))
            return $this->ultimoElemento($terreno->pegarClasse())->_id;
        else
            return 0;
    }

    public function retornaIgualdadePontos($dados=array())
    {

        $campos=array('v._latitude,v._longitude,v._id_terreno');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id AND t._id_zona=z._id AND v._latitude=? AND v._longitude=? AND z._id=?';
        $k=$this->buscaExaustiva($campos,$tabela,$cond,$dados);
        if($k->rowCount()>0)
        {
            $j=$k->fetchObject();
            return $j->_id_terreno;
        }
        else
            return 0;

    }

    function verDonoDoTerreno($idTerr)
    {
        $campos=array('t._id , t._id_utente, u._nome');
        $tabela='terreno t, requerente u';
        $cond='t._id_utente=u._id AND t._id=?';
        $dados=array($idTerr);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetch();
    }


    function pegaNumTrrenoIgual($dados=array()) {

        $campos=array('v._latitude,v._longitude,v._descricao,v._id_terreno');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id AND t._id_zona=z._id AND v._latitude=? AND v._longitude=?';
        $stmt=$this->buscaExaustiva($campos,$tabela,$cond,$dados);
        $numTerrenIguais['num'] = $stmt->rowCount();
        $numTerrenIguais['dados'] = $stmt->fetchAll(2);
        if ($numTerrenIguais['num'] > 0)
            return $numTerrenIguais['dados'];
        else
            return null;
    }


    function pegTodosTer_vejaDistanPont($idZona) {
        $campos=array('v._latitude,v._longitude,v._descricao,v._id_terreno');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id AND t._id_zona=z._id AND v._latitude=? AND z._id=?';
        $dados=array($idZona);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetchAll(2);
    }

    function verSobrePosicao() {
        $campos=array('v._latitude,v._longitude,v._descricao,v._id_terreno,v._id');
        $tabela='vertice v, terreno t, zona z';
        $cond='v._id_terreno=t._id AND t._id_zona=z._id';
        $dados=array(null);
        return $this->buscaExaustiva($campos,$tabela,$cond,$dados)->fetchAll(2);
    }

    public function numRegisto($idRequente)
    {
        $campos=array('*');
        $dados=array($idRequente);
        return $this->buscaExaustiva($campos,'terreno','_id_utente=?',$dados)->rowCount();
    }
}