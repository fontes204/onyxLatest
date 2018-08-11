<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 17/03/17
 * Time: 07:55
 */
class LogsDao extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar(Logs $logs)
    {
        return $this->insert($logs->parametro());
    }
}