<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 05:45
 */
interface iProcesso
{
    //metodos gets
    public function get_id();
    public function get_num_processoGeral();
    public function get_id_utilizador();
    public function get_id_requerente();
    public function getAssunto();

    //metodos sets
    public function set_id($_id);
    public function set_num_processoGeral($_num_processoGeral);
    public function set_id_utilizador($_id_utilizador);
    public function set_id_requerente($_id_requerente);
    public function setAssunto($assunto);
}