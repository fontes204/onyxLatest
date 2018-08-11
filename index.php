<?php
if (!isset($_SESSION))
{
    Session::init();
}
ini_set('display_errors',1);//activa ou desactiva sms de erro
error_reporting(E_ALL);

require 'config.php';
require 'util/Auth.php';

//requerendos as itefaces
require 'models/interface/iUtilizador.php';
require 'models/interface/iVertice.php';
require 'models/interface/iUtente.php';
require 'models/interface/iTerreno.php';
require 'models/interface/iProcesso.php';
require 'models/interface/iPagamento.php';
require 'models/interface/iMorada.php';
require 'models/interface/iLocalizacao.php';
require 'models/interface/iFicha.php';
require 'models/interface/iOnyxCoreDB.php';


function __autoload($st_file)
{
    if(file_exists('libs/'.$st_file.'.php'))
    {
        require_once 'libs/'.$st_file.'.php';
    }elseif (file_exists('models/entity/'.$st_file.'.php'))
    {
        require 'models/entity/'.$st_file.'.php';
    }elseif (file_exists('models/dao/'.$st_file.'.php'))
    {
        require 'models/dao/'.$st_file.'.php';
    }elseif (file_exists('resources/'.$st_file.'.php'))
    {
        require 'resources/'.$st_file.'.php';
    }
}
$app= new App();