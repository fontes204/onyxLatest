<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 28/04/17
 * Time: 23:49
 */
class ZonaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        $db=new Database();
        $campo=array('*');
        $tabela='zona';

        $condicao='_nome=? and _id_provincia=? and _id_municipio=? and _id_comuna=? and _id_bairro=?';
        $valor=array(addslashes(filter_input(INPUT_POST,'nomeZona')),$_POST['_id_provincia'],$_POST['_id_municipio'],$_POST['_id_comuna'],$_POST['_id_bairro']);
        $rs=$db->buscaExaustiva($campo,$tabela,$condicao,$valor)->rowCount();
        if($rs>0)
            echo 0;
        else {
            $zona = new Zona(addslashes(filter_input(INPUT_POST, 'nomeZona')), $_POST['_id_provincia'], $_POST['_id_municipio'], $_POST['_id_comuna'], $_POST['_id_bairro']);
            echo $this->model->salvar($zona);
        }
    }
}