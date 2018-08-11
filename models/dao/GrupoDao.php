<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 15/03/17
 * Time: 20:23
 */
class GrupoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Grupo $grupo)
    {
        return $this->insert($grupo->parametro());
    }

    public function listaGrupo($id)
    {
        $campos=array('*');
        $cond='_id_departamento=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,'grupo',$cond,$valor);
    }

    public function listaGrupo1($id)
    {
        $campos=array('*');
        $cond='_id=?';
        $valor=array($id);
        return $this->buscaExaustiva($campos,'grupo',$cond,$valor);
    }
    public function listarByPerfil($param)
    {
        $campos=array('*');
        $cond='_perfil=?';
        $valor=array($param);
        return $this->buscaExaustiva($campos,'grupo',$cond,$valor);
    }

    public function actualizar($daddos=array())
    {
        $stm=self::conn()->prepare("update grupo set _perfil=?, _id_departamento=?, _sigla=? where _id=?");
        if($stm->execute($daddos))
            return true;
        else
            return false;
    }

    public function rastreio($id)
    {
        $param=array($id);
        $field=array('*');
        return $this->buscaExaustiva($field,'utilizador','_id_grupo=?',$param)->rowCount();
    }
}