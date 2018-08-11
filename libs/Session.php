<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 13/05/16
 * Time: 20:08
 */
class Session
    {

        public static function init()
            {
                @session_start();
            }
        public static function destruir()
            {
                session_destroy();
                unset($_SESSION);
            }
        public static function set($chave,$valor)
            {
                $_SESSION[$chave]=$valor;
            }

        public static function get($chave)
            {
                if(isset($_SESSION[$chave]))
                return $_SESSION[$chave];
            }
    }