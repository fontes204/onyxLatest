<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 01/01/17
 * Time: 06:18
 */
class ContaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function editar()
    {
        $opcoes=array('conta',array('_estado=?'),array('_id_utilizador=?'),array($_POST['status'],$_POST['id_utilizador']));
        if($this->model->alterar($opcoes[0],$opcoes[1],$opcoes[2],$opcoes[3]))
            echo 1;
        else
            echo 0;
    }

    public function alterarCredenciais1()
    {
        //$tabela,$campos=array(),$cond,$valores=array()
        $user=htmlentities(addslashes(filter_input(INPUT_POST,'user')));
        $senha=htmlentities(addslashes(Hash::create('md5',(filter_input(INPUT_POST,'senha')),HASH_PASSWORD_KEY)));
        $opcoes=array('conta',array('_utilizador=?,_senha=?'),'_id_utilizador=?',array($user,$senha,$_POST['id_utilizador']));
        if($this->model->alterar($opcoes[0],$opcoes[1],$opcoes[2],$opcoes[3]))
        {
            $dados=array(1,$_POST['id_utilizador']);
            $daoCred=new Control_CredDao();
            $ret=$daoCred->actualizar($dados);
            echo $ret;
        }else
            echo 0;
    }

    public function add()
    {
        $entity=new Conta(htmlentities(addslashes(filter_input(INPUT_POST,'telefone'))),htmlentities(addslashes(filter_input(INPUT_POST,'username'))),htmlentities(addslashes(Hash::create('md5',(filter_input(INPUT_POST,'senha')),HASH_PASSWORD_KEY))),1,$_POST['id_utilizador']);
        $ret=0;
        if($this->model->criarConta($entity)==1)
        {
            $ctrl_cred=new Control_Cred($_POST['id_utilizador'],0);
            $daoCtrl=new Control_CredDao();
            $ret=$daoCtrl->salvar($ctrl_cred);
        }
        echo $ret;
        unset($ctrl_cred);
        unset($entity);
        unset($daoCtrl);
    }

    public function actualizarEstado()
    {
        $param=array($_POST['param'][0],$_POST['param'][1]);
        echo $this->model->actualizarEstado($param);
    }
}