<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 28/12/16
 * Time: 13:33
 */
class SDMGUUCController extends Controller
{
    public function __construct()
    {
        parent::__construct();
//        Auth::handlelogin();
    }

    public function Index()
    {
        $this->view->render(SDMGUUC,1);
    }

    public function entrada()
    {
        $this->view->render(SDMGUUC,'processo_entrada');
    }

    public function saida()
    {
        $this->view->render(SDMGUUC,'processo_saida');
    }

    public function perfil()
    {
        $this->view->render(SDMGUUC,'meu_perfil');
    }
}