<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 04:57
 */
interface iUtilizador
{
    //metodos gets
    public function get_id();
    public function get_nome();
    public function get_numBI();
    public function get_morada();
    public function get_dataNascimento();
    public function get_genero();
    public function get_telefone();
    public function get_email();
    public function get_nivelEscolar();
    public function get_idGrupo();
    public function getFoto();

    //metodos sets
    public function set_id($_id);
    public function set_nome($_nome);
    public function set_numBI($_numBI);
    public function set_morada($_morada);
    public function set_dataNascimento($_dataNascimento);
    public function set_genero($_genero);
    public function set_telefone($_telefone);
    public function set_email($_email);
    public function set_nivelEscolar($_nivelEscolar);
    public function set_idGrupo($_idGrupo);
    public function setFoto($foto);

}