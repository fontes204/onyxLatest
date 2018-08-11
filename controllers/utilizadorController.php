<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 12:26
 */
class UtilizadorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar()
    {
        //setando os dados da morada do utente
        $morada= new Morada($_POST['_id_provincia'],$_POST['_id_municipio'],$_POST['_id_comuna'],$_POST['_id_bairro'],$_POST['_id_rua']);
        $daoMorada=new MoradaDao();

        $this->entity->setMorada($daoMorada->registar($morada));//persistindo os dados na tabela morada e setando o id da morada na tabela utilizador

        $entity=new Utilizador($_POST['id_administracao'],htmlentities(addslashes(filter_input(INPUT_POST,'nomecompleto'))),htmlentities(addslashes(filter_input(INPUT_POST,'apelido'))),htmlentities(addslashes(filter_input(INPUT_POST,'numbi'))),$this->entity->retornaData(htmlentities(addslashes(filter_input(INPUT_POST,'datanascimento')))),$_POST['genero'],htmlentities(addslashes(filter_input(INPUT_POST,'telefone'))),htmlentities(addslashes(filter_input(INPUT_POST,'email'))),$_POST['nivel_escolar'],$this->entity->getMorada(),$_POST['grupo'],"padrao.jpg",$_POST['_id_provincia_prov'],$this->entity->retornaData(htmlentities(addslashes(filter_input(INPUT_POST,'dataEmissao')))),$this->entity->retornaData(htmlentities(addslashes(filter_input(INPUT_POST,'dataValidade')))));

        $id=$this->model->registar($entity);//persistindo os dados na tabela utilizador

        $vl=array($_POST['grupo']);
        $campos=array('g._perfil as perfil,d._perfil as depa');
        $func=$this->model->buscaExaustiva($campos,'grupo g,departamento d','g._id_departamento=d._id and g._id=?',$vl)->fetchObject();
        $ret=0;
        switch ($func->perfil)
        {
            case 'Administrador':
                $admin=new Administrador($id);
                $daoAdmin=new AdministradorDao();
                $ret=$daoAdmin->registar1($admin);
                break;
            case 'Tecnico':
                $tecnico=new Tecnico($id,$_POST['tipo_tecnico']);
                $daoTec=new TecnicoDao();
                $ret=$daoTec->registar1($tecnico);
                break;
            case 'Chefe do Gabinete':
                $cga=new CGA($id);
                $daoCga=new CGADao();
                $ret=$daoCga->registar1($cga);
                break;
            case 'Secretario':
                $sec=new SecretariaGeral($id);
                $daoSec=new SecretariaGeralDao();
                $ret=$daoSec->registar1($sec);
                break;
            case 'Chefe':
                if($func->depa=="Reparticao das Obras Publicas")
                {
                    echo 404;
                }elseif ($func->depa=="Reparticao de Urbanismo e Cadastro")
                {
                    $chefeEntity=new CRGUUC($id);
                    $daoChefe=new CRGUUCDao();
                    $ret=$daoChefe->registar1($chefeEntity);
                }
                break;
            case 'Director':
                $dmguuc=new DMGUUC($id);
                $daoDmguuc=new DMGUUCDao();
                $ret=$daoDmguuc->registar1($dmguuc);
                break;
            case 'Admin TI':
                $ret=1;
                break;
        }
        if($ret!=0)
        {
            $param=array($_POST['id_administracao'],0);
            $field=array('*');
            $ctrl=$this->model->buscaExaustiva($field,'administracao_municipal','_id=? and _estado=?',$param)->rowCount();
            if($ctrl>0)
            {
                $daoAM=new Administracao_MunicipalDao();
                $daoMA=new Master_AdminDao();
                $entyti=new Master_Admin($id,$_POST['id_administracao']);
                $daoMA->salvar($entyti);
                $dados=array(1,$_POST['id_administracao']);
                $ret=$daoAM->actualizar($dados);
            }
        }
            echo $ret;

    }// fim do metodo registar utilizador

    public function nomeIgual()
    {
        echo $this->model->nomeIgual($_GET['param']);
    }

    public function actualizarFoto()
    {

        $dao=new Database();
        require 'libs/Upload.php';
        $img = $_FILES['img_perfil'];
        $tmp = $img['tmp_name'];
        $name = $img['name'];
        $type = $img['type'];
        $pasta="resources/img_perfil";
        //Extensoes permitidas
        $tipos=array('image/png','image/jpeg','image/jpg','image/gif','image/bmp','image/pjpeg');
        $vl=null;
        if (!empty($name) && in_array($type, $tipos)) {
            $nome = 'onyx-' . md5(uniqid(rand(), true)) . '.jpg';
            $vl=Upload::upload_jpg($tmp, $nome, 121, 121, $pasta);

        } elseif ($type == 'image/png') {
            $nome = 'onyx-' . md5(uniqid(rand(), true)) . '.png';
            $vl=Upload::upload_png($tmp, $nome, 121, 121, $pasta);

        }
        if ($vl!=null){
            $opcoes=array('utilizador',array('_foto=?'),'_id=?',array($vl,Session::get('id_user')));
            if($dao->editar($opcoes[0],$opcoes[1],$opcoes[2],$opcoes[3]))
                echo 1;
            else
                echo 0;
        }
        unset($dao);
    }

}