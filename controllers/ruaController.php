<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:56
 */
class RuaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {

        $k = $this->model->listar($_GET['id_bairro']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhuma rua foi encontrada\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $rua) {
                $rs[] = $rua;
            }
            echo json_encode($rs);
        }
    }

    public function listar1()
    {

        $k = $this->model->listar($_GET['id_bairro']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhuma rua foi encontrada\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $rua) {
                $rs[] = $rua;
            }
            echo json_encode($rs);
        }
    }
}