<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:55
 */
class BairroController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {

        $k = $this->model->listar($_GET['id_comuna']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhum bairro foi encontrado\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $comuna) {
                $rs[] = $comuna;
            }
            echo json_encode($rs);
        }
    }

    public function listar1()
    {

        $k = $this->model->listar($_GET['id_comuna']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhum bairro foi encontrado\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $comuna) {
                $rs[] = $comuna;
            }
            echo json_encode($rs);
        }
    }
}