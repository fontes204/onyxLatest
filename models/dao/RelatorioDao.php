<?php

/**
 * Created by PhpStorm.
 * User: JOÃO FONTES PEREIRA
 * Date: 07/10/2016
 * Time: 08:27
 */
class RelatorioDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Relatorio $relatorio)
    {
        if($this->insert($relatorio->parametro()))
            return $this->ultimoElemento($relatorio->pegarClasse())->_id;
    }

    public function numRelatorio($id_processo)
    {
        $campo=array('*');
        $param=array($id_processo);
        return $this->buscaExaustiva($campo,'relatorio','_id_pocesso=?',$param)->rowCount();
    }

    public function listarRelatorio($id_processo)
    {
        $campo=array('fr._path');
        $param=array($id_processo);
        return $this->buscaExaustiva($campo,'relatorio r, file_relatorio fr','r._id=fr._id_relatorio and r._id_pocesso=?',$param)->fetchObject();
    }
}