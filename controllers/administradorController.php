<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 22/12/16
 * Time: 13:30
 */
class AdministradorController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "AAM") {
            parent::__construct();
            $GLOBALS['titulo'] = 'Administrador';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }

    public function Index()
    {
        if (isset($this->view))
            $this->view->render(ADMIN,1);
    }

    public function entrada()
    {
        if (isset($this->view))
            $this->view->render(ADMIN,'legalizacao_terreno/processo/processo_entrada');
    }

    public function saida()
    {
        if (isset($this->view))
            $this->view->render(ADMIN,'legalizacao_terreno/processo/processo_saida');
    }

    public function processo()
    {
        if (isset($this->view))
            $this->view->render(ADMIN,'legalizacao_terreno/processo/processo');
    }

    public function processoAaprovar()
    {
        if (isset($this->view))
            $this->view->render(ADMIN,'legalizacao_terreno/processo/processoAaprovar');
    }

    public function addParecer()
    {
        if (isset($this->view))
            $this->view->render(ADMIN,'legalizacao_terreno/processo/addParecer');
    }


    public function notificacoes()
    {
        $dao=new EntradaSaidaDao();
        $dao1=new ProcessoDao();
        $dao2=new UtilizadorDao();
        $rx[]=null;
        foreach ($dao->notificacao(Session::get('id_user')) as $res)
        {
            $id_envia=$dao->userEnvia(Session::get('id_user'))->_id_utilizador;
            $rx['numProcesso']=$dao1->listar($res['_id_processo'])->_num_processoGeral;
            $rx['nomeEnvia']=$dao2->listar($id_envia)->_nome;
            $rx['data']=$res['_data'];
        }
        echo "[".json_encode($rx)."]";
        unset($dao);
        unset($dao1);
        unset($dao2);
    }
}