<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 17/06/17
 * Time: 10:38
 */


class SuperController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "AT") {
            parent::__construct();
            $GLOBALS['titulo'] = 'Super Utilizador';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }

    public function Index()
    {
        if (isset($this->view))
            $this->view->render(SUPER,1);
    }

    //area rservada para documento
    public function adcionarDocumento()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/documento');
    }

    public function listarDocumento()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'listagem/documento');
    }
    public function editarDocumento()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/documento');
    }

    //area reservada para departamento
    public function adcionarDepartamento()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/departamento');
    }

    public function listarDepartamento()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'listagem/departamento');
    }
    public function editarDepartamento()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/departamento');
    }

    //area reservada para grupo
    public function adcionarGrupo()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/grupo');
    }

    public function listarGrupo()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'listagem/grupo');
    }
    public function editarGrupo()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/grupo');
    }

    //area reservada para  utilizador
    public function adicionarUtilizador()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'cadastro/utilizador');
    }

    public function listarUtilizador()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'listagem/utilizador');
    }

    public function visualizarUtilizador()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'conta/ver');
    }

    public function addConta()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'conta/add');
    }

    public function contaActiva()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'conta/activa');
    }

    public function contaInactiva()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'conta/inactiva');
    }

    public function porCriar()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'conta/porcriar');
    }

    //area reservada para a auditoria
    public function auditoria()
    {
        if (isset($this->view))
            $this->view->render(SUPER,'listagem/auditoria');
    }
}