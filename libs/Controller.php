<?php

class Controller extends App {
    function __construct() {
        $this->view = new View();
    }

    public function loadModel($name) {
        $path_dao = 'models/dao/' . $name . 'Dao.php';
        $path_entity = 'models/entity/' . $name . '.php';
        $path_controller='controllers/'.$name.'Controller';
        if (file_exists($path_dao)) {
            require $path_dao;
            $modelName = $name.'Dao';
            $this->model = new $modelName();
        }


        if (file_exists($path_entity)) {
            require $path_entity;
            $this->entity = new $name();
        }

        if (file_exists($path_controller)) {
            require $path_controller;
            $controllername = $name.'Controller';
            $this->controller = new $controllername();
        }
    }

    public function perfil()
    {
        if (isset($this->view))
            $this->view->render('main/perfil_utilizador/view/',1);
    }

    public function alterarCredenciais()
    {
        if (isset($this->view))
            $this->view->render('main/perfil_utilizador/edit/',1);
    }
    public function alterarCredenciais_()
    {
        if (isset($this->view))
            $this->view->render('main/perfil_utilizador/edit1/',1);
    }

    public function upload($path)
    {
        foreach ($_FILES['img_perfil']['name'] as $key=>$error)
        {
            $nome = 'onyx-' . md5(uniqid(rand(), true)) . '.jpg';
            $tmp=$_FILES['img_perfil']['tmp_name'][$key];
            $j[]=array('nomes'=>$nome);
            move_uploaded_file($tmp,$path.'/'.$nome);
        }
        return $j;
    }

    public function verNumero()
    {
        $hlp=new Helper();
        if(is_numeric($hlp->soNumero($_GET['param'])))
            echo 1;
        else
            echo 0;
    }

    public function verficarDominio()
    {
        $hlp=new Helper();
        echo $hlp->verificarDominio($_GET['param']);
    }
    public function __destruct()
    {
       //  unset($this);
    }

}
