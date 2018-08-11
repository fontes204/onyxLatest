<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 07/01/17
 * Time: 13:53
 */
class ProvinciaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        $entity=new Provincia(addslashes(filter_input(INPUT_POST,'nome')),addslashes(filter_input(INPUT_POST,'silga')),addslashes(filter_input(INPUT_POST,'longitude')),addslashes(filter_input(INPUT_POST,'latitude')));
        echo $this->model->salvar($entity);
    }
    public function listarById()
    {
        echo $this->model->listarById($_GET['param'])->_sigla;
    }
}