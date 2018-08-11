<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 00:30
 */
class PaisDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        return 0;
    }

    public function listarById($id)
    {
        return $this->listarPorId('pais', $id)->fetchObject();
    }
}