<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:54
 */
class ComunaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $id_municipio = $_GET['id_municipio'];
        $k = $this->model->listar($id_municipio);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhuma comuna foi encontrada\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $comuna) {
                $rs[] = $comuna;
            }

            $c = $this->model->listarComunaDistrito($id_municipio);

            foreach ($c->fetchAll(PDO::FETCH_ASSOC) as $distrito) {
                $rs[] = $distrito;
            }
            echo json_encode($rs);
        }
    }

    public function listar1()
    {

        $k = $this->model->listar($_GET['id_municipio']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhuma comuna foi encontrada\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $comuna) {
                $rs[] = $comuna;
            }
            echo json_encode($rs);
        }
    }
}