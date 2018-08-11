<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 13/03/17
 * Time: 16:39
 */
class DocumentoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        $documento=new Documento(addslashes(filter_input(INPUT_POST,'nome')),addslashes(filter_input(INPUT_POST,'descricao')),1);
        echo  $this->model->salvar($documento);
    }

    public function editarDoc()
    {
        $opcoes=array('documento',array('_nome=?'),array('_descricao=?'),array(addslashes(filter_input(INPUT_POST,'nome')),addslashes(filter_input(INPUT_POST,'descricao'))));
        if($this->model->editar($opcoes[0],$opcoes[1],$opcoes[2],$opcoes[3]))
            echo 2;
        else
            echo 0;
    }
    public function editarDocumento()
    {
        $valores=array(addslashes(filter_input(INPUT_POST,'nome')),addslashes(filter_input(INPUT_POST,'descricao')),$_POST['idDoc']);
        if($this->model->actualizar($valores))
            echo 2;
        else
            echo 0;
    }
    public function consultarNome()
    {
        echo $this->model->consultarNome($_GET['param']);
    }

    public function eliminarDoc()
    {
        if($this->model->rastreio($_POST['param'])>0)
        {
            echo 1;
        }else {
            echo $this->eliminar();
    }
    }

    public function listar()
    {
        foreach ($this->model->listarTodos('documento','order by _nome asc')->fetchAll(2) as $x){
            $rx[]=$x;
        }
        echo json_encode($rx);
    }

    public function eliminar()
    {
        if ($this->model->apagar('documento',$_POST['param']))
            return 2;
        else
            return 0;
    }
}