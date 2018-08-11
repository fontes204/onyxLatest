<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 22/12/16
 * Time: 13:32
 */
class ChefeGabAdminController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "CAM") {
            parent::__construct();
            $GLOBALS['titulo'] = 'Chefe do Gabinete';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }

    public function Index()
    {
        if (isset($this->view))
            $this->view->render(CGA,1);
    }

    public function entrada()
    {
        if (isset($this->view))
            $this->view->render(CGA,'processo_entrada');
    }

    public function entrada_admin()
    {
        if (isset($this->view))
            $this->view->render(CGA,'processo_entrada_admin');
    }

    public function saida()
    {
        if (isset($this->view))
            $this->view->render(CGA,'processo_saida');
    }
    public function todos()
    {
        if (isset($this->view))
            $this->view->render(CGA,'todos_processos');
    }

    public function notificacoes()
    {
        $dao=new EntradaSaidaDao();
        $dao1=new ProcessoDao();
        $dao2=new UtilizadorDao();
        foreach ($dao->notificacao(Session::get('id_user')) as $res)
        {
            $id_envia=$dao->userEnvia($res['_id_processo'])->_id_utilizador;
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