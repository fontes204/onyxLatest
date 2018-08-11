<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author elviosadoc
 */
class ErrorController extends Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function Index()
        {
            $this->view->render('error/index');
        }

    public function error()
    {
        $this->view->render('error/index2');
    }
}
