<?php

/**
 * 
 */
class IndexController extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function Index() {
        $this->view->render('login/index');
    }

    public function registro()
    {
        $this->view->render('registo/index');
    }
}

?>