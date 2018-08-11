<?php
$procDao = new ProcessoDao();
$att = new Atributo();
$fase = new ParecerDao();
$terreno = new TerrenoDao();
$morada = new MoradaDao();
$hlp = new Helper();
$opcao = array(
    new Atributo(),
    new Database()
);
$entradaSaida=new EntradaSaidaDao();
$ctrl=$entradaSaida->contaRegistro(base64_decode($opcao[0]->getParam()));

$campo = array('_id_requerente,_num_processoGeral');
$tabela = 'processo p';
$condicao = 'p._id=?';
$valor = array(base64_decode($att->getParam()));
$rs = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

$dadosReq = $procDao->listarPorId('requerente', $rs->_id_requerente)->fetchObject();

$docDado = $procDao->docDado($valor)->fetchAll();

$ctrlfase=isset($fase->fase(base64_decode($opcao[0]->getParam()))->_id_fase) ? $fase->fase(base64_decode($opcao[0]->getParam()))->_id_fase : 0;

$campo = array('_id');
$tabela = 'documento d';
$condicao = 'd._nome=?';
$valor = array("Fotografia");
$rx = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

$campo = array('_foto');
$tabela = 'documento_processo dp';
$condicao = 'dp._id_processo=? and dp._id_documento=?';
$valor = array(base64_decode($att->getParam()), $rx->_id);
$rk = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();


$campo = array('*');
$tabela = 'entradasaida es';
$condicao = 'es._id_processo=? and _descOrg=? ORDER BY _id ASC LIMIT 1';
$valor = array(base64_decode($att->getParam()), "saida");
$rd = $procDao->buscaExaustiva($campo, $tabela, $condicao, $valor)->fetchObject();

$idMorada = $procDao->listarPorId('morada', $dadosReq->_id_morada)->fetchObject();

//pegado os valores da morada
$dadosMorada = $morada->retornaMorada($idMorada->_id_provincia, $idMorada->_id_municipio, $idMorada->_id_comuna, $idMorada->_id_bairro, $idMorada->_id_rua);

$campo = array('*');
$param = array(base64_decode($opcao[0]->getParam()), 1, Session::get('id_user'));
$parecer = $opcao[1]->buscaExaustiva($campo, 'parecer', '_id_processo=? and _id_fase=? and _destino=?', $param)->fetchObject();//buscando o parecer

$campo=array('*');
$param=array('Reparticao das Obras Publicas','Reparticao de Urbanismo e Cadastro','Reparticao de Gestao de Imobiliario');
$grupo=$opcao[1]->buscaExaustiva($campo,'departamento','_perfil=? OR _perfil=? OR _perfil=?',$param)->fetchAll(2);//buscando as funcoes
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-user"></i> <?php echo $dadosReq->_nome ?></p>
                    <h4><i class="fa fa-file-text"></i> n&ordm;: <?php echo $rs->_num_processoGeral ?></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-10 -->
        <div class="col-md-9">
            <!-- begin panel -->
            <div class="profile-container">
                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image" style="border: none">
                            <img class="img-thumbnail" style="width: inherit;height: inherit"
                                 src="<?php echo URL ?>resources/documentos/<?php echo $rk->_foto ?>"/>
                            <i class="fa fa-user hide"></i>
                        </div>
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsivse" style="border-left: 1px">
                                <form action="#" method="post" class="frm-verifcar-senha">
                                    <fieldset>
                                        <legend>&nbsp;</legend>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Escolhe a Área</label>
                                            <select class="form-control selectpicker destino" data-size="10" data-live-search="true" data-style="btn-primary">
                                                <?php foreach ($grupo as $res):?>
                                                    <option value="<?php echo $res['_id']?>"><?php echo $res['_perfil']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Escreva aqui o parecer</label>
                                            <textarea cols="101" class="form-control desc" style="resize: none"></textarea>
                                        </div>
                                    </fieldset>

                                    <!-- end table -->
                            </div>
                            <!-- end profile-info -->
                            <div class="panel-footer m-b-25">
                                <div class="pull-right f-s-14">
                                    <a href="<?php echo URL?>processo/movimento" id_proc="<?php echo base64_decode($opcao[0]->getParam())?>" meu_id="<?php echo Session::get('id_user')?>" class="btn btn-sm btn-primary btn-enviar-crguuc">Enviar</a>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!--                <span>&nbsp;</span>-->
                    <!-- end profile-right -->
                </div>
                <div class="panel-footer">
                    <a href="javascript:window.history.go(-1)" title="Voltar" class="btn btn-sm btn-default">Voltar</a>
                    <div class="pull-right f-s-14">
                        <i class="fa fa-clock-o"></i> Tempo de espera: <span
                            class="text-primary"><?php echo substr($hlp->tempoEspera($rd->_data, date('Y-m-d')), 1) ?></span>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
        <div class="col-md-3">
            <div class="panel panel-primary" data-sortable-id="index-9">
                <div class="panel-heading">
                    <h4 class="panel-title">Documento(s) préviamente apresentados</h4>
                </div>
                <div class="panel-body p-0 image gallery-group-1">
                    <ul class="todolist">
                        <?php foreach ($docDado as $res):
                            $campo = array('dp._foto');
                            $idDoc = array($res->_id, base64_decode($att->getParam()));
                            $foto = $procDao->buscaExaustiva($campo, 'documento_processo dp', '_id_documento=? and _id_processo=?', $idDoc)->fetchAll(2);
                            foreach ($foto as $ft):
                                if ($res->_nome == "Requerimento")
                                    $fa = 'fa fa-list-alt';
                                elseif ($res->_nome == "Croqu&iacute;s de Localização")
                                    $fa = 'fa fa-map-o';
                                elseif ($res->_nome == "Bilhete de Identidade")
                                    $fa = 'fa fa-list-alt';
                                elseif ($res->_nome == "Fotografia")
                                    $fa = 'fa fa-picture-o';
                                ?>
                                <li>
                                    <a href="<?php echo URL ?>resources/documentos/<?php echo $ft['_foto'] ?>"
                                       class="todolist-container" data-lightbox="gallery-group-1">
                                        <div class="todolist-input"><i class="<?php echo $fa ?> text-primary"></i>
                                        </div>
                                        <div class="todolist-title"><?php echo $res->_nome ?></div>
                                    </a>
                                </li>
                            <?php endforeach;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end #content -->