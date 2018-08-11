<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 05:31
 */
interface iRequerente
{

    //metodos gets
    public function get_id();
    public function get_nome();
    public function get_id_morada();
    public function get_telefone();
    public function getEmail();
    public function getTipo();

    //metodos sets
    public function setTipo($tipo);
    public function set_id($_id);
    public function set_nome($_nome);
    public function set_id_morada($_id_morada);
    public function set_telefone($_telefone);
    public function setEmail($email);
}