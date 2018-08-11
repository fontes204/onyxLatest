<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 29/05/17
 * Time: 17:30
 */
class File_RelatorioDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(File_Relatorio $relatorio)
    {
        if($this->insert($relatorio->parametro()))
            return $this->ultimoElemento($relatorio->pegarClasse())->_id;
    }
}