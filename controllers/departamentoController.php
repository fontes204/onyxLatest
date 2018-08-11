<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 02/04/17
 * Time: 19:41
 */
class DepartamentoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        $depa=new Departamento(addslashes(filter_input(INPUT_POST,'nome')),addslashes(filter_input(INPUT_POST,'descricao')));
        echo $this->model->salvar($depa);
    }

    public function listarDepa()
    {

        $k = $this->model->listar($_GET['_perfil'])->fetchObject();
        echo $k->_id;
    }

    public function consultarNome()
    {
        echo $this->model->listar($_GET['param'])->rowCount();
    }

    public function editarDepartamento()
    {
        $valores=array(addslashes(filter_input(INPUT_POST,'nome')),addslashes(filter_input(INPUT_POST,'descricao')),$_POST['idDepa']);
        if($this->model->actualizar($valores))
            echo 2;
        else
            echo 0;
    }

    public function listar()
    {
        foreach ($this->model->listarTodos('departamento','order by _perfil asc')->fetchAll(2) as $x){
            $rx[]=$x;
        }
        echo json_encode($rx);
    }
    public function eliminarDepartamento()
    {
        if($this->model->rastreio($_POST['param'])>0)
        {
            echo 1;
        }else {
            echo $this->eliminar();
        }
    }

    public function eliminar()
    {
        if ($this->model->apagar('departamento',$_POST['param']))
            return 2;
        else
            return 0;
    }
}