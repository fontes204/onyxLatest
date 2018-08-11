<?php

/**
 * Created by Sublime.
 * User: Elvio Sadoc
 * Date: 16/05/16
 * Time: 17:12
 */
class Auth
    {
        public static function handlelogin()
            {
                @session_start();
                $logged=isset($_SESSION['logado']);
                if($logged==false)
                {
                    session_destroy();
                    header('location: '.URL);
                    exit;
                }
            }
    }