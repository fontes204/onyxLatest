<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 15/06/17
 * Time: 23:51
 */

class Proprietario_orgDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Proprietario_org $proprietario_org)
    {
        return $this->insert($proprietario_org->parametro());
    }
}