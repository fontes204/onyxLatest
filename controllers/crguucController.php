<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 09/01/17
 * Time: 16:49
 */
class CRGUUCController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "CRUC") {
            parent::__construct();
            $GLOBALS['titulo'] = 'CRGUUC';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }


    public function Index()
    {
        if (isset($this->view))
            $this->view->render(CRGUUC, 1);
    }

    public function entrada()
    {
        if (isset($this->view))
            $this->view->render(CRGUUC, 'processo_entrada');
    }

    public function saida()
    {
        if (isset($this->view))
            $this->view->render(CRGUUC, 'processo_saida');
    }

    public function processo()
    {
        if (isset($this->view))
            $this->view->render(CRGUUC, 'processo');
    }

    public function processoTec()
    {
        if (isset($this->view))
            $this->view->render(CRGUUC, 'processso_tec');
    }

    public function addParecer()
    {
        if (isset($this->view))
            $this->view->render(CRGUUC, 'addParecer');
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