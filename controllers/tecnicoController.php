<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 11/01/17
 * Time: 17:30
 */
class TecnicoController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "TRUC" || Session::get('grupo') == "TRGI" || Session::get('grupo') == "TROP") {
            parent::__construct();
            $GLOBALS['titulo'] = 'Técnico';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }

    public function Index()
    {
        if (isset($this->view))
            $this->view->render(TEC,1);
    }

    public function entrada()
    {
        if (isset($this->view))
            $this->view->render(TEC,'legalizacao_terreno/processo_entrada');
    }

    public function saida()
    {
        if (isset($this->view))
            $this->view->render(TEC,'legalizacao_terreno/processo_saida');
    }

    public function processo()
    {
        if (isset($this->view))
            $this->view->render(TEC,'legalizacao_terreno/processo');
    }

    public function capturar_coordenadas()
    {
        if (isset($this->view))
            $this->view->render(TEC,'legalizacao_terreno/captura_coordenadas');
    }

    public function registarZona()
    {
        if (isset($this->view))
            $this->view->render(TEC,'crudZona/registar');
    }

    public function visualizarZona()
    {
        if (isset($this->view))
            $this->view->render(TEC,'crudZona/visualizar');
    }

    public function criarRelatorio()
    {
        if (isset($this->view))
            $this->view->render(TEC,'legalizacao_terreno/criarRelatorio');
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