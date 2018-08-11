<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 29/05/17
 * Time: 07:52
 */
class RelatorioController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criarRelatorioTec()
    {
        $nordeste=$_POST['nordeste1']."+ tendo o ponto +".$_POST['nordeste2']." +".$_POST['nordeste3']." / ".$_POST['nordeste4']."+ e o ponto +".$_POST['nordeste5']." +".$_POST['nordeste6']." / ".$_POST['nordeste7'].". +".$_POST['nordeste8'] ;
        $sudeste=$_POST['sudeste1']."+ tendo o ponto +".$_POST['sudeste2']." +".$_POST['sudeste3']." / ".$_POST['sudeste4']."+ e o ponto +".$_POST['sudeste5']." +".$_POST['sudeste6']." / ".$_POST['sudeste7'].". +".$_POST['sudeste8'] ;
        $sudoeste=$_POST['sudoeste1']."+ tendo o ponto +".$_POST['sudoeste2']." +".$_POST['sudoeste3']." / ".$_POST['sudoeste4']."+ e o ponto +".$_POST['sudoeste5']." +".$_POST['sudoeste6']." / ".$_POST['sudoeste7'].". +".$_POST['sudoeste8'] ;
        $noroeste=$_POST['noroeste1']."+ tendo o ponto +".$_POST['noroeste2']." +".$_POST['noroeste3']." / ".$_POST['noroeste4']."+ e o ponto +".$_POST['noroeste5']." +".$_POST['noroeste6']." / ".$_POST['noroeste7'].". +".$_POST['noroeste8'] ;
        //$confront=$nordeste.$sudeste.$sudoeste.$noroeste;
        $entity=new Relatorio($_POST['observacao'],$_POST['id_processo'],date('Y-m-d'));
        $id=$this->model->salvar($entity);

        $confrontEntity=new Confronto($id,$nordeste,$sudeste,$sudoeste,$noroeste);
        $dao=new ConfrontoDao();
        echo $dao->salvar($confrontEntity);
    }
}