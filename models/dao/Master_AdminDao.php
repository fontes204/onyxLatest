<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 06:44
 */
class Master_AdminDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Master_Admin $admin)
    {
        if($this->insert($admin->parametro()))
            return 1;
        else
            return 0;
    }
}