<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 01/02/17
 * Time: 19:15
 */
class TerrenoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registar()
    {

        $vertDao=new VerticeDao();
        $helper=new Helper();
        $terrenoDao=new TerrenoDao();
        $zona=$vertDao->listarPorId('zona',$_POST['id_zona'])->fetchObject();
        $prov=$vertDao->listarPorId('provincia',$zona->_id_provincia)->fetchObject();
        $muni=$vertDao->listarPorId('municipio',$zona->_id_municipio)->fetchObject();
        $comu=$vertDao->listarPorId('comuna',$zona->_id_comuna)->fetchObject();

        $cont=$vertDao->listarTodos('terreno')->rowCount();
        if($cont==0)
        {
            $id_terreno=1;
            $codigoTerreno=$helper->gerarCodigoTerreno($prov->_nome,$muni->_nome,$comu->_nome,$id_terreno);//gera o codigo do terreno
            $terreno=new Terreno($codigoTerreno,$helper->area($_POST['largura'],$_POST['comprimento']),$_POST['largura'],$_POST['comprimento'],$_POST['quarteirao'],$_POST['bloco'],$_POST['lote'],$_POST['numVertice'],$_POST['id_zona'],Session::get('id_user'),$_POST['id_requerente']);
            $terrenoDao->registar($terreno);
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            $_p_front=$_POST['_p_front'];
            for ($i=0;$i<count($lat);$i++)
            {
                $vert=new Vertice($lng[$i],$lat[$i],$id_terreno,$_p_front[$i]);
                $bool=$vertDao->registar($vert);
            }
        }else{
            $id_terreno=$vertDao->ultimoElemento('terreno')->_id;
            $codigoTerreno=$helper->gerarCodigoTerreno($prov->_nome,$muni->_nome,$comu->_nome,$id_terreno+1);//gera o codigo do terreno
            $terreno=new Terreno($codigoTerreno,$helper->area($_POST['largura'],$_POST['comprimento']),$_POST['largura'],$_POST['comprimento'],$_POST['quarteirao'],$_POST['bloco'],$_POST['lote'],$_POST['numVertice'],$_POST['id_zona'],Session::get('id_user'),$_POST['id_requerente']);
            $terrenoDao->registar($terreno);
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            $_p_front=$_POST['_p_front'];
            for ($i=0;$i<count($lat);$i++)
            {
                $vert=new Vertice($lng[$i],$lat[$i],$id_terreno+1,$_p_front[$i]);
                $bool=$vertDao->registar($vert);
            }
        }
        if($bool)
            echo 1;
        else
            echo 0;
    }

    public function verificacao()
    {
        $dados=array($_GET['lat'],$_GET['lng'],$_GET['id_zona']);
        if ($this->model->retornaIgualdadePontos($dados)!=0)
        {
            $res['nome']=$this->verDonoDoTerreno_($this->model->retornaIgualdadePontos($dados))->_nome;
            $res['id']=$this->model->retornaIgualdadePontos($dados);
            $res['tipo']="igual";
        }elseif ($this->verSobrePosicao()!=0)
        {
            $res['sobre']=$this->verSobrePosicao();
            $res['nome']=$this->verDonoDoTerreno_($this->verSobrePosicao())->_nome;
            $res['tipo']="sobre";
        }else{
            $res['sobre']=null;
            $res['nome']=null;
            $res['id']=null;
            $res['tipo']=null;
        }
        echo "[".json_encode($res)."]";
    }
    public function verSobrePosicao()
    {
        $vert=new VerticeDao();
        foreach ($vert->todosTerrenosZona($_GET['id_zona']) as $h)
        {
            $g[]=$h;
        }

        for ($i=0;$i<count($g);$i++) {
            if ($i%4==0) {
                if($vert->verSobrePosicao($_GET['lng'],$_GET['lat'],$g[$i]->idTerreno)==1)
                {
                    $idTerreno=$g[$i]->idTerreno;
                }

            }
        }
        return @$idTerreno;
    }
    public function retornaIgualdadePontos()
    {
        $dados=array($_GET['lat'],$_GET['lng'],$_GET['id_zona']);
        $id=$this->model->retornaIgualdadePontos($dados);
        if ($id!=0)
        {
            return $this->verDonoDoTerreno_($id)->_nome;
        }else
            return null;
    }

    public function verDonoDoTerreno_($id)
    {
       return $this->model->verDonoDoTerreno($id);
    }
}