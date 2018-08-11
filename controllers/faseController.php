<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 17/01/17
 * Time: 15:13
 */
class FaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fase($_id_processo)
    {
        $parecerDao = new ParecerDao();
        $fase = $parecerDao->buscarFase($_id_processo);

        if ($fase == -1)
            return 1;
        elseif(count($fase) >= 1 AND $fase[0]['_id_fase']=='1')
            return 2;
        elseif(count($fase) > 1 AND $fase[0]['_id_fase']=='2')
            return 3;
    }
}