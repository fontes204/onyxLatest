<?php

class View  extends Controller {
    #code

    function __construct() {
        //echo"Isto e uma view";
    }

    public function render1($name=false,$menu=false,$area=false) {

        if($menu==false && $area==false)
        require DIR_VIEWS.DIRECTORY_SEPARATOR.$name.EXTENSION;
        else
            {
                $dir = explode(DIRECTORY_SEPARATOR, $menu);
                require DIR_VIEWS.DIRECTORY_SEPARATOR.$dir[0].GEN_HEADER;
                require DIR_VIEWS.DIRECTORY_SEPARATOR.$menu.EXTENSION;
                require DIR_VIEWS.DIRECTORY_SEPARATOR.$area.EXTENSION;
                require DIR_VIEWS.DIRECTORY_SEPARATOR.$dir[0].GEN_FOOTER;
            }
    }

    public function render($name,$include=null) {

        if($include==null)
            require 'views/'.$name.'.php';
        else
        {
            $pasta=explode("/",$name);

            require 'views/main/header.php';
            require 'views/main/index.php';
            if($include==1)
                require 'views/'.$name.'index.php';
            else {
                require 'views/' . $pasta[0] . '/' . $include . '/index.php';
            }
            require 'views/main/footer.php';
        }
    }


}

