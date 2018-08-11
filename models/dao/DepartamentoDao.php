<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 02/04/17
 * Time: 19:42
 */
class DepartamentoDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Departamento $departamento)
    {
        return $this->insert($departamento->parametro());
    }

    public function listar($param)
    {
        $campos=array('*');
        $cond='_perfil=?';
        $valor=array($param);
        return $this->buscaExaustiva($campos,'departamento',$cond,$valor);
    }

    public function listarDepaPorId($id)
    {
        return $this->listarPorId('departamento',$id);
    }

    public function actualizar($daddos=array())
    {
        $stm=self::conn()->prepare("update departamento set _perfil=?, _descricao=? where _id=?");
        if($stm->execute($daddos))
            return true;
        else
            return false;
    }

    public function rastreio($id)
    {
        $param=array($id);
        $field=array('*');
        return $this->buscaExaustiva($field,'grupo','_id_departamento=?',$param)->rowCount();
    }
}