<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 09:36
 */
interface iOnyxCoreDB
{
    public function conn();
    public function insert($tabela,$campos=array(),$valores=array());
    public function select($tabela,$campos,$condicao);
    public function update($tabela,$condicao);
    public function delete($tabela,$campos,$condicao);

}