<?php

class App {
    #code

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode("/", $url);

        if (empty($url[0])) {
            require 'controllers/indexController.php';
            $controller = new IndexController();
            $controller->Index();
            return false;
        }

        $file = 'controllers/' . $url[0] . 'Controller.php';

        $controller = null;        

        if (!file_exists($file)) {
            
            $this->error();
        } else {
            require $file;

            $nome=$url[0].'Controller';
            $controller = new $nome;
            $controller->loadModel($url[0]);

            //chamada de methods
            if (isset($url[2])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}($url[2]);
                } else {
                    $this->error();
                }
            } else {
                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        $controller->{$url[1]}();
                    } elseif (!(method_exists($controller, $url[1]))) {
                        $this->error();
                    } else {
                        $this->error();
                    }
                } else {
                    @$controller->index();
                }
            }
        
        }
    }

    public function error() {
        require 'controllers/errorController.php';
        $controller = new ErrorController();
        $controller->index();
        return false;
    }
    public function error1() {
        require 'controllers/errorController.php';
        $controller = new ErrorController();
        $controller->error();
        return false;
    }

}
