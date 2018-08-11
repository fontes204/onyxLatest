<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 05/01/17
 * Time: 16:47
 */
class EntradaSaidaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar(EntradaSaida $entradaSaida)
    {
        if ($this->insert($entradaSaida->parametro()))
            return 1;
        else
            return 0;
    }

    public function notificacao($id_user)
    {
        $campos=array('*');
        $valor=array($id_user,'entrada');
        return $this->buscaExaustiva($campos,'entradasaida','_id_utilizador=? and _descricao=?',$valor)->fetchAll(2);
    }

    public function userEnvia($id_user)
    {
        $campos=array('_id_utilizador');
        $valor=array($id_user,'saida');
        return $this->buscaExaustiva($campos,'entradasaida','_id_utilizador=? and _descricao=?',$valor)->fetchObject();
    }

    public function contaRegistro($id_processo)
    {
        $campos=array('*');
        $valor=array($id_processo);
        return $this->buscaExaustiva($campos,'entradasaida','_id_processo=?',$valor)->rowCount();
    }

    public function buscaIdDestino($id,$user)
    {
        $campos=array('distinct es._id_utilizador as id');
        $valor=array('saida',$id,$user,$user);
        $tabela='entradasaida es, parecer pcr';
        return $this->buscaExaustiva($campos,$tabela,'es._descricao=? and es._id_processo=? and es._id_processo=pcr._id_processo and pcr._id_utilizador=? and es._id_utilizador!=?',$valor)->fetchAll(2);
    }

    public function buscaIdGrupo($id)
    {
        $campos=array('_nome');
        $valor=array($id);
        $tabela='utilizador';
        return $this->buscaExaustiva($campos,$tabela,'_id=?',$valor)->fetchAll(2);
    }

}