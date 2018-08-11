<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/06/17
 * Time: 00:31
 */
class PaisController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarById()
    {
        echo $this->model->listarById($_GET['param'])->_nome;
    }
}