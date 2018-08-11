<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 06/10/2016
 * Time: 15:52
 */
class UtilizadorDao extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function registar(Utilizador $utilizador)
    {
        if($this->insert($utilizador->parametro()))
            return $this->ultimoElemento($utilizador->pegarClasse())->_id;
        else
            return 0;
    }

    public function listar($id_user)
    {
        return $this->listarPorId('utilizador',$id_user)->fetchObject();
    }

    public function nomeIgual($param)
    {
        $param=array($param);
        $field=array('*');
        return $this->buscaExaustiva($field,'utilizador','_nome=?',$param)->rowCount();
    }

    public function idDestino($sigla)
    {
        $dao=new EntradaSaidaDao();
        $campos = array('*');
        $valor = array($sigla);
        $k=$dao->buscaExaustiva($campos, 'grupo', '(_sigla=?)', $valor)->fetchObject();
        $campos = array('_id');
        $valor = array($k->_id);
        $cond = '_id_grupo=?';
        $k = $dao->buscaExaustiva($campos, 'utilizador', $cond, $valor)->fetchObject();
        return $k->_id;
    }
}