<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 15/03/17
 * Time: 20:27
 */
class GrupoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        $depa=new DepartamentoDao();
        $op=$depa->listarDepaPorId($_POST['depa'])->fetchObject();
        $sigla="";
        switch ($op->_perfil)
        {
            case 'Reparticao das Obras Publicas':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."ROP";
                break;
            case 'Reparticao de Urbanismo e Cadastro':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."RUP";
                break;
            case 'Reparticao de Gestao de Imobiliario':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."RGI";
                break;
            case 'Secretaria Geral':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."SG";
                break;
            case 'Administracao Municipal':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."AM";
                break;
            case 'DMGUUC':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."DMGUUC";
                break;
            case 'Tecnologia e Informação':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."TI";
                break;
        }
        $grupo=new Grupo(addslashes(filter_input(INPUT_POST,'perfil')),$_POST['depa'],$sigla);
        if($this->model->listarByPerfil($_POST['perfil'])->rowCount()==0)
            echo $this->model->salvar($grupo);
        else
            echo 3;
    }

    public function editarGrupo()
    {
        $depa=new DepartamentoDao();
        $op=$depa->listarDepaPorId($_POST['depa'])->fetchObject();
        $sigla="";
        switch ($op->_perfil)
        {
            case 'Reparticao das Obras Publicas':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."ROP";
                break;
            case 'Reparticao de Urbanismo e Cadastro':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."RUP";
                break;
            case 'Reparticao de Gestao de Imobiliario':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."RGI";
                break;
            case 'Secretaria Geral':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."SG";
                break;
            case 'Administracao Municipal':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."AM";
                break;
            case 'DMGUUC':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."DMGUUC";
                break;
            case 'Tecnologia e Informação':
                $sigla=substr(filter_input(INPUT_POST,'perfil'),0,1)."TI";
                break;
        }
        $dados=array(addslashes(filter_input(INPUT_POST,'perfil')),$_POST['depa'],$sigla,$_POST['idGrupo']);
        if($this->model->actualizar($dados))
            echo 2;
        else
            echo 0;
    }

    public function listar()
    {

        $k = $this->model->listaGrupo($_GET['id_depa']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhum departamento foi encontrado\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $res) {
                $rs[] = $res;
            }
            echo json_encode($rs);
        }
    }

    public function listar1()
    {

        $k = $this->model->listaGrupo1($_GET['id']);
        if($k->rowCount()==0){
            echo "[{\"erro\":\"Nenhum grupo foi encontrado\"}]";
        }else{
            foreach ($k->fetchAll(PDO::FETCH_ASSOC) as $res) {
                $rs[] = $res;
            }
            echo json_encode($rs);
        }
    }
    public function consultarNome()
    {
        echo $this->model->listarByPerfil($_GET['param'])->rowCount();
    }

    public function listarTodosGrupos()
    {
        $capta=array();
        foreach ($this->model->listarTodos('grupo','order by _perfil asc')->fetchAll(2) as $x)
        {
            $depa=$this->model->listarPorId('departamento',$x['_id_departamento'])->fetchObject();
            $rs['departamento']=$depa->_perfil;
            $rs['grupo']=$x['_perfil'];
            $rs['sigla']=$x['_sigla'];
            $rs['id']=$x['_id'];
            array_push($capta,$rs);
        }
        echo json_encode($capta);
    }

    public function eliminarGrupo()
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
        if ($this->model->apagar('grupo',$_POST['param']))
            return 2;
        else
            return 0;
    }
}