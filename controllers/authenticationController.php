<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 22/12/16
 * Time: 13:38
 */
class AuthenticationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function logon()
    {
            $conta=new Conta();
            $contaDao=new ContaDao();
            $conta->setUtilizador(htmlentities(addslashes(filter_input(INPUT_POST,'user'))));
            $conta->setTelefone(htmlentities(addslashes(filter_input(INPUT_POST,'user'))));
            $conta->setSenha(htmlentities(addslashes(Hash::create('md5',(filter_input(INPUT_POST,'senha')),HASH_PASSWORD_KEY))));
            echo $contaDao->logon($conta);
    }

    public function verificarSenha()
    {
        $conta=new Conta();
        $contaDao=new ContaDao();
        $conta->setUtilizador(htmlentities(addslashes(filter_input(INPUT_POST,'user'))));
        $conta->setSenha(htmlentities(addslashes(Hash::create('md5',(filter_input(INPUT_POST,'senha')),HASH_PASSWORD_KEY))));
        echo $contaDao->verificarSenha($conta);
    }
}