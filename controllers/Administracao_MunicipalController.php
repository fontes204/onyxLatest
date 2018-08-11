<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 05:33
 */
class Administracao_MunicipalController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criar()
    {
        $dao=new Localizacao_MunicipioDao();
        $entity=new Localizacao_Municipio($_POST['id_provincia'],$_POST['_id_municipio']);
        $id_localizacao=$dao->salvar($entity);
        $entity1=new Administracao_municipal($id_localizacao,htmlentities(addslashes(filter_input(INPUT_POST,'nome'))),0);
        echo $this->model->salvar($entity1);
    }
}