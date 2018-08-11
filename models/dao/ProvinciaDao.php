<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:58
 */
class ProvinciaDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Provincia $provincia
     * @return bool
     */
    public function salvar(Provincia $provincia)
    {
        return $this->insert($provincia->parametro());
    }

    public function listarById($id)
    {
        return $this->listarPorId('provincia', $id)->fetchObject();
    }
}