<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 19/06/17
 * Time: 10:33
 */

class Control_CredController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rastreio()
    {
        echo $this->model->rastreio($_GET['param']);
    }

    public function adiar()
    {
        Session::set('adiado',1);
    }
    public function alterar()
    {
        Session::set('alterado',1);
    }
}