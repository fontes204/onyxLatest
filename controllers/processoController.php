<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/16
 * Time: 18:22
 */
class ProcessoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function upload1($name)
    {
        foreach ($_FILES[$name]['name'] as $key=>$error)
        {
            $nome = 'onyx-' . md5(uniqid(rand(), true)) . '.jpg';
            $tmp=$_FILES[$name]['tmp_name'][$key];
            $j[]=array('nomes'=>$nome);
            move_uploaded_file($tmp,'resources/documentos/'.$nome);
        }
        return $j;
    }
    public function criarProcessoIndividual()
    {

        $opcao = isset($_POST['opcao']) ? $_POST['opcao'] : 'primeiro';
        switch ($opcao)
        {
            case 'primeiro':

                echo json_encode($this->upload1('images'),JSON_PRETTY_PRINT);
                break;
            case 'segundo':
                $requerenteDao=new RequerenteDao();
                $moradaDao=new MoradaDao();
                $documento_processoDao=new Documento_ProcessoDao();
                $cidadaoDao=new CidadaoDao();
                $logDao=new LogsDao();

                //setando os dados da morada do requerente
                $morada=new Morada($_POST['prov'],$_POST['muni'],$_POST['comu'],$_POST['bai'],$_POST['rua']);

                $_id_morada=$moradaDao->registar($morada);//persistindo os dados na tabela morada

                //setando os dados pessoais do requerente
                $requerente=new Requerente(htmlentities(addslashes(filter_input(INPUT_POST,'nomecompleto'))),htmlentities(addslashes(filter_input(INPUT_POST,'telefone'))),htmlentities(addslashes(filter_input(INPUT_POST,'email'))),$_id_morada,'cidadao');

                $id_requerente=$requerenteDao->registar($requerente);//persistindo os dados na tabela requerente

                //setando os dados da pessoais do cidadao

                $cidadao=new Cidadao($id_requerente,htmlentities(addslashes(filter_input(INPUT_POST,'numbi'))),htmlentities(addslashes(filter_input(INPUT_POST,'dataEmissao'))),$requerente->retornaData(htmlentities(addslashes(filter_input(INPUT_POST,'data')))),$_POST['nacionalidade'],$_POST['estadocivil'],$_POST['genero']);
                $cidadaoDao->registar($cidadao);//persistindo os dados na tabela cidadao
                if($id_requerente>0)
                {
                    $helper=new Helper();
                    $processo=new Processo($helper->gerarNumeroProcesso($id_requerente),$_POST['assunto'],$_POST['id_sga'],$id_requerente,$_POST['distrito'],$_POST['id_administracao'],$_id_prioridade=1);
                    $id_processo=$this->model->registar($processo);//persistindo os dados na tabela processo

                    $documento = isset($_POST['documento']) ? $_POST['documento'] : '0';
                    $arrayParam=explode(",",$documento);
                    $fotos=explode(",",$_POST['foto']);

                    for ($i=0;$i<count($arrayParam);$i++){
                        $documento_processo=new Documento_processo($arrayParam[$i],$id_processo,$fotos[$i]);
                        $documento_processoDao->salvar($documento_processo);//persistindo os dados na tabela documento_processo
                    }

                    $cb=0;
                    if(in_array(1,$arrayParam) && in_array(3,$arrayParam)) {
                        $cb=$this->enviarProcesso('CAM','saida',$_POST['id_sga'],'entrada',$id_processo,0);

                    }else{
                        $cb=$this->enviarProcesso('CAM','pendente',$_POST['id_sga'],'pendente',$id_processo,0);
//                        $entrada_saida=new EntradaSaida(date('Y-m-d'),'pendente',$_POST['id_sga'],$id_processo);
//                        $cb=$entrada_saidaDao->registar($entrada_saida);//persistindo os dados na tabela entradasaida
                    }
                    echo $cb;
                }
                unset($processo);
                unset($documento_processo);
                unset($entrada_saida);
                unset($cidadao);
                unset($requerente);
                unset($morada);
                break;
        }
    }//fim do metodo que regista o processo para um cidadao


    public function criarProcessoOrganizacao()
    {

        $opcao = isset($_POST['opcao']) ? $_POST['opcao'] : 'primeiro';
        $rs=0;
        switch ($opcao)
        {
            case 'primeiro':
                echo json_encode($this->upload1('images'),JSON_PRETTY_PRINT);
                break;
            case 'segundo':
                $requerenteDao=new RequerenteDao();
                $moradaDao=new MoradaDao();
                $documento_processoDao=new Documento_ProcessoDao();
                $organizaoDao=new OrganizacaoDao();
                $proprietario_orgDao=new Proprietario_orgDao();
                $logDao=new LogsDao();



                //setando os dados da morada do requerente
                $morada=new Morada(1,1,$_POST['comu'],$_POST['bai'],$_POST['rua']);
                $_id_morada=$moradaDao->registar($morada);//persistindo os dados na tabela morada

                $requerente=new Requerente(htmlentities(addslashes(filter_input(INPUT_POST,'nomecompleto'))),htmlentities(addslashes(filter_input(INPUT_POST,'telefone'))),htmlentities(addslashes(filter_input(INPUT_POST,'email'))),$_id_morada,'organizacao');

                $id_requerente=$requerenteDao->registar($requerente);//persistindo os dados na tabela requerente

                //setando os dados da classe organizacao
                $organizao=new Organizacao($id_requerente,htmlentities(addslashes(filter_input(INPUT_POST,'nif'))),htmlentities(addslashes(filter_input(INPUT_POST,'numDecreto'))),htmlentities(addslashes(filter_input(INPUT_POST,'tipo_organizacao'))));
                $idOrg=$organizaoDao->registar($organizao);//persistindo os dados na tabela organizacao

                $proprietario_org=new Proprietario_org($idOrg,addslashes(filter_input(INPUT_POST,'nomeProprietario')),addslashes(filter_input(INPUT_POST,'telefoneProprietario')),addslashes(filter_input(INPUT_POST,'nacionalidadeProp')),addslashes(filter_input(INPUT_POST,'numeroDI')));
                $proprietario_orgDao->salvar($proprietario_org);//persistindo os dados na tabela Proprietario_org

                if($id_requerente>0)
                {
                    $helper=new Helper();
                    $processo=new Processo($helper->gerarNumeroProcesso($id_requerente),'Legalização de Terreno',$_POST['id_sga'],$id_requerente);
                    $id_processo=$this->model->registar($processo);//persistindo os dados na tabela processo

                    $documento = isset($_POST['documento']) ? $_POST['documento'] : '0';
                    $arrayParam=explode(",",$documento);
                    $fotos=explode(",",$_POST['foto']);

                    for ($i=0;$i<count($arrayParam);$i++){
                        $documento_processo=new Documento_processo($arrayParam[$i],$id_processo,$fotos[$i]);
                        $documento_processoDao->salvar($documento_processo);//persistindo os dados na tabela documento_processo
                    }

                    $cb=0;
                    if(in_array(1,$arrayParam) && in_array(3,$arrayParam)) {
                        $cb=$this->enviarProcesso('CAM','saida',$_POST['id_sga'],'entrada',$id_processo,0);

                    }else{
                        $cb=$this->enviarProcesso('CAM','pendente',$_POST['id_sga'],'pendente',$id_processo,0);
                    }
                    echo $cb;
                }
                break;
        }



    }

    public function idDestino($sigla)
    {
        $opcao=array(
            new EntradaSaidaDao()
        );
        $campos = array('*');
        $valor = array($sigla);
        $k=$opcao[0]->buscaExaustiva($campos, 'grupo', '(_sigla=?)', $valor)->fetchObject();
        $campos = array('_id');
        $valor = array($k->_id);
        $cond = '_id_grupo=?';
        $k = $opcao[0]->buscaExaustiva($campos, 'utilizador', $cond, $valor)->fetchObject();
        return $k->_id;
    }

    public function enviarProcesso($sigla,$descOrg,$idOrigem,$descDest,$idProc,$estado)
    {
        $dao=new EntradaSaidaDao();
        $hlp=new Helper();
        $idDestino=null;
        if($hlp->soNumero($sigla)=="" || $hlp->soNumero($sigla)==null)
            $idDestino=$this->idDestino($sigla);
        else
            $idDestino=$sigla;

        $entrada_saida=new EntradaSaida(date('Y-m-d'),$descOrg,$idOrigem,$descDest,$idDestino,$idProc,$estado);
        echo ($dao->registar($entrada_saida));//persistindo os dados na tabela entradasaida
    }


    
    public function registarParcer($fase,$sigla)
    {
        $parecerDao=new ParecerDao();
        $hlp=new Helper();
        $idDestino=null;
        if($hlp->soNumero($sigla)=="" || $hlp->soNumero($sigla)==null)
            $idDestino=$this->idDestino($sigla);
        else
            $idDestino=$sigla;

        $parecer=new Parecer($_POST['desc'],date('Y-m-d'), $idDestino,$_POST['id_user'],$_POST['id_proc'],$fase);
        $parecerDao->registar($parecer);
    }

    public function movimento()
    {
        switch ($_POST['user'])
        {
            case 'cga':
                    $this->enviarProcesso('AAM','saida',$_POST['id_user'],'entrada',$_POST['id_proc'],0);
                break;
            case 'cga1':
                    $this->enviarProcesso('DDMGUUC','saida',$_POST['id_user'],'entrada',$_POST['id_proc'],0);
                break;
            case 'admin':
                    $this->enviarProcesso('CAM','saida',$_POST['id_user'],'entrada',$_POST['id_proc'],0);
                    $this->registarParcer(1,'DDMGUUC');
                break;
            case 'dmguuc':
                    $this->enviarProcesso('CRUC','saida',$_POST['id_user'],'entrada',$_POST['id_proc'],0);
                    $this->registarParcer(1,'CRUC');
                    break;
            case 'tecnico1':
                    $this->enviarProcesso($_POST['destino'],'saida',$_POST['id_user'],'entrada',$_POST['id_proc'],0);
                    $this->registarParcer(1,$_POST['destino']);
                break;
            case 'tecnico2':
                    $this->enviarProcesso('CRUC','saida',$_POST['id_user'],'entrada',$_POST['id_proc'],0);
                    $this->registarParcer(2,'CRUC');
                break;
        }
    }

    public function addDocumento()
    {
        $opcao = isset($_POST['opcao']) ? $_POST['opcao'] : 'primeiro';
        switch ($opcao) {
            case 'primeiro':
                echo json_encode($this->upload1('image'),JSON_PRETTY_PRINT);
                break;
            case 'segundo':

                $documento_processoDao= new Documento_ProcessoDao();
                $documento = isset($_POST['documento']) ? $_POST['documento'] : '0';
                $fotos=$_POST['foto'];

                for ($i=0;$i<count($documento);$i++)
                {
                    $documento_processo=new Documento_processo($documento[$i],$_POST['id_proc'],$fotos[$i]);
                    $cb=$documento_processoDao->salvar($documento_processo);//persistindo os dados na tabela documento_processo
                }
                $campos = array('*');
                $valor = array($_POST['id_proc']);
                $k = $documento_processoDao->buscaExaustiva($campos, 'entradasaida', '_id_processo=?', $valor)->fetchObject();
                if($k->_descDest=="pendente") {
                    if ($documento_processoDao->apagar('entradasaida', $k->_id))
                        $this->enviarProcesso('CAM', 'saida', $_POST['id_sga'], 'entrada', $_POST['id_proc'], 0);
                }else{
                    echo $cb;
                }
                break;
        }
    }//fim do método adicionar documento a um processo préviamente registado


    public function numEntradaAdmin()
    {
        echo $this->model->numEntradaAdmin($_GET['id']);
    }

    public function numEntradaSec()
    {
        echo $this->model->numEntradaSec($_GET['id']);
    }


    public function actualizarPrioridade()
    {
        $estado = $_POST['estado'];
        $id_processo = $_POST['id_proc'];

        $tabela = 'processo';
        $campos = '_id_prioridade';
        $condicao = '_id='.$id_processo;
        $valor = $estado;
        echo $this->model->editarPrioridade($tabela,$campos,$condicao,$valor);
    }
}