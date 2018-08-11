<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 14/10/17
 * Time: 17:16
 */
class ReparticaoController extends Controller
{

    /**
     * ReparticaoController constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    public function salvar()
    {
        $entity=new Reparticao($_POST['id_provincia'],addslashes(filter_input(INPUT_POST,'nome')),0);
        echo $this->model->salvar($entity);
    }
}