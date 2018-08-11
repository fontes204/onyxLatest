<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 28/12/16
 * Time: 13:31
 */
class DMGUUCController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "DDMGUUC")
        {
            parent::__construct();
            $GLOBALS['titulo'] = 'DMGUUC';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }
    public function Index()
    {
        if (isset($this->view))
            $this->view->render(DMGUUC,1);
    }

    public function entrada()
    {
        if (isset($this->view))
            $this->view->render(DMGUUC,'processo_entrada');
    }

    public function saida()
    {
        if (isset($this->view))
            $this->view->render(DMGUUC,'processo_saida');
    }

    public function processo()
    {
        if (isset($this->view))
            $this->view->render(DMGUUC,'processo');
    }

    public function addParecer()
    {
        if (isset($this->view))
            $this->view->render(DMGUUC,'addParecer');
    }

    public function criarProjecto()
    {
        if (isset($this->view))
            $this->view->render(DMGUUC,'projecto/criar');
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