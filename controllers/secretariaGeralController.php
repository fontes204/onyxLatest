<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 18:13
 */
class SecretariaGeralController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "SSG") {
            parent::__construct();
            $GLOBALS['titulo'] = 'Secretaria';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }

    public function Index()
    {
        if (isset($this->view))
            $this->view->render(SGA,1);
    }

    public function criarProcessoIndividual()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/criar_processo/individual');
    }

    public function criarProcessoOrganizacao()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/criar_processo/organizacao');
    }

    public function selecionarRequerente()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/criar_processo/selecionar_requerente');
    }
    public function saidaOrganizacao()
    {
        if (isset($this->view))
        $this->view->render(SGA,'legalizacao_terreno/processo/listagem/processo_saida/organizacao');
    }

    public function saidaCidadao()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/listagem/processo_saida/individual');
    }

    public function pendente()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/listagem/processo_pendente');
    }
    public function todos()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/listagem/todos_processos');
    }

    public function continuar()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/continuar_pendente');
    }

    public function edit()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/edit');
    }

    public function view_percent25()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/listagem/percent25');
    }

    public function processo()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/listagem/processo');
    }

    public function view_percent100()
    {
        if (isset($this->view))
            $this->view->render(SGA,'legalizacao_terreno/processo/listagem/percent100');
    }

    public function relatorioTecnico()
    {
        if (isset($this->view))
            $this->view->render('relatorio/classes/RelatorioTecnico');
    }

    public function notificacoes()
    {
        $dao=new EntradaSaidaDao();
        $dao1=new ProcessoDao();
        $dao2=new UtilizadorDao();
        $rx=null;
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

    public function recibo()
    {
        if (isset($this->view))
            $this->view->render('relatorio/classes/Recibo');
    }
}