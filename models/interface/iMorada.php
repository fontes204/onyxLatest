<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 06:37
 */
interface iMorada
{

    //metodos gets
    function get_id();
    function get_id_provincia();
    function get_id_municipio();
    function get_id_comuna();
    function get_id_bairro();
    function get_id_rua() ;

    //metodos sets
    function set_id($_id);
    function set_id_provincia($_id_provincia);
    function set_id_municipio($_id_municipio);
    function set_id_comuna($_id_comuna);
    function set_id_bairro($_id_bairro);
    function set_id_rua($_id_rua);

}