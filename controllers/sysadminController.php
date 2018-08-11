<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 30/12/16
 * Time: 14:01
 */
class SysAdminController extends Controller
{
    public function __construct()
    {
        if (Session::get('grupo') == "admin") {
            parent::__construct();
            $GLOBALS['titulo'] = 'Sys Admin';
        }else{
            $this->error1();
        }
        Auth::handlelogin();
    }

    public function Index()
    {
        if (isset($this->view))
            $this->view->render(SYS,1);
    }

    //area rservada para documento
    public function adcionarDocumento()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/documento');
    }

    public function listarDocumento()
    {
        if (isset($this->view))
            $this->view->render(SYS,'listagem/documento');
    }
    public function editarDocumento()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/documento');
    }

    //area reservada para departamento
    public function adcionarDepartamento()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/departamento');
    }

    public function listarDepartamento()
    {
        if (isset($this->view))
            $this->view->render(SYS,'listagem/departamento');
    }
    public function editarDepartamento()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/departamento');
    }

    //area reservada para grupo
    public function adcionarGrupo()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/grupo');
    }

    public function listarGrupo()
    {
        if (isset($this->view))
            $this->view->render(SYS,'listagem/grupo');
    }
    public function editarGrupo()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/grupo');
    }

    //area reservada para  utilizador
    public function adicionarUtilizador()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/utilizador');
    }

    public function listarUtilizador()
    {
        if (isset($this->view))
            $this->view->render(SYS,'listagem/utilizador');
    }

    public function visualizarUtilizador()
    {
        if (isset($this->view))
            $this->view->render(SYS,'conta/ver');
    }

    public function addConta()
    {
        if (isset($this->view))
            $this->view->render(SYS,'conta/add');
    }

    public function contaActiva()
    {
        if (isset($this->view))
            $this->view->render(SYS,'conta/activa');
    }

    public function contaInactiva()
    {
        if (isset($this->view))
            $this->view->render(SYS,'conta/inactiva');
    }

    public function porCriar()
    {
        if (isset($this->view))
            $this->view->render(SYS,'conta/porcriar');
    }

    //area reservada para a auditoria
    public function auditoria()
    {
        if (isset($this->view))
            $this->view->render(SYS,'listagem/auditoria');
    }

    //area reservada para a administracao
    public function addAdministracao()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/administracao');
    }

    public function listarAdministracao()
    {
        if (isset($this->view))
            $this->view->render(SYS,'listagem/administracao');
    }



    //area reservada para provincia
    public function addProvincia()
    {
        if (isset($this->view))
            $this->view->render(SYS,'cadastro/provincia');
    }
}