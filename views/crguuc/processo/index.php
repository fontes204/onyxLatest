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
$idReq=$rs->_id_requerente;
$dadosReq = $procDao->listarPorId('requerente', $rs->_id_requerente)->fetchObject();

$docDado = $procDao->docDado($valor)->fetchAll();
$ctrlFase = $ctrlfase = $terreno->numRegisto($dadosReq->_id);

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
    <?php
    switch ($dadosReq->_tipo) {
    case 'cidadao':
    $vl = array($rs->_id_requerente);
    $campos = array('*');
    $dadosRq = $opcao[1]->buscaExaustiva($campos, 'cidadao', '_id_requerente=?', $vl)->fetchObject();//buscando os dados do cidadao
    $pais = $opcao[1]->listarPorId('pais', $dadosRq->_nacionalidade)->fetchObject();//buscando a nacionalidade

    $campo=array('*');
    $param=array('Tecnico','TRUC');
    $grupo=$opcao[1]->buscaExaustiva($campo,'grupo','_perfil=? and _sigla=?',$param)->fetchObject();//buscando as funcoes

    if ($dadosRq->_genero == 'f')
        $genero = 'Femenino';
    else
        $genero = 'Masculino';
    ?>
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
                        <!-- end profile-image -->
                        <div class="hidden-sm hidden-xs" style="width: 175px">
                            <p>
                                <a href="#modal-parecer-admin" data-toggle="modal"
                                   class="btn btn-sm btn-default btn-block" style="text-align: left"><i
                                        class="fa fa-eye"></i> Ver o Parecer</a>
                                <?php if ($ctrl<=5) { ?>
                                    <a href="<?php echo URL.$att->getController() ?>/addParecer/<?php echo $att->getParam()?>" data-toggle="modal"
                                       class="btn btn-sm btn-primary btn-block" style="text-align: left"><i
                                            class="fa fa-edit"></i> Adicionar Parecer</a>
                                <?php }?>
                            </p>
                        </div>
                        <!-- end profile-highlight -->
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsivse" style="border-left: 1px">
                                <h6 class="text-primary"><i class="fa fa-list-alt"></i> Dados Pessoais</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nacionalidade</th>
                                        <th>Estado Civíl</th>
                                        <th>Gênero</th>
                                        <th>Idade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $pais->_nome ?></td>
                                        <td class="text-capitalize"><?php echo $dadosRq->_estado_civil ?></td>
                                        <td><?php echo $genero ?></td>
                                        <td><?php echo $opcao[0]->idade($dadosRq->_data_nascimento); ?></td>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="" style="margin-top: -7%">
                                    <h6 class="text-primary"><i class="fa fa-home"></i> Morada <span
                                            class="f-s-9 text-inverse">&</span> <i class="fa fa-phone"></i> Telefone
                                    </h6>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Municipio</th>
                                            <th>Comuna</th>
                                            <th>Bairro</th>
                                            <th>Rua</th>
                                            <th>Telefone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php for ($i = 1; $i < count($dadosMorada); $i++) { ?>
                                                <td><?php echo $dadosMorada[$i] ?></td>
                                            <?php } ?>
                                            <td><?php echo $dadosReq->_telefone ?></td>
                                        </tr>
                                        <hr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!--                <span>&nbsp;</span>-->
                    <div class="panel-footer">
                        <a href="javascript:window.history.go(-1)" title="Voltar" class="btn btn-sm btn-default">Voltar</a>
                        <div class="pull-right f-s-14">
                            <i class="fa fa-clock-o"></i> Tempo de espera: <span class="text-primary"><?php echo substr($hlp->tempoEspera($rd->_data, date('Y-m-d')), 1) ?></span>
                        </div>
                    </div>
                    <!-- end profile-right -->
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
        <?php
        break;
    case 'organizacao':

    $param=array($idReq);
    $field=array('*');
    $dadosOrga=$dao->buscaExaustiva($field,'organizacao','_id_requerente=?',$param)->fetchObject();

    $param=array($dadosOrga->_id);
    $field=array('*');
    $dadosProp=$dao->buscaExaustiva($field,'proprietario_org','_id_organizacao=?',$param)->fetchObject();
    ?>
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
                            <!-- end profile-image -->
                            <div class="hidden-sm hidden-xs" style="width: 175px">
                                <p>
                                    <a href="#modal-parecer-admin" data-toggle="modal"
                                       class="btn btn-sm btn-default btn-block" style="text-align: left"><i
                                            class="fa fa-eye"></i> Ver o Parecer</a>
                                    <?php if ($ctrl<=5) { ?>
                                        <a href="<?php echo URL.$att->getController() ?>/addParecer/<?php echo $att->getParam()?>" data-toggle="modal"
                                           class="btn btn-sm btn-primary btn-block" style="text-align: left"><i
                                                class="fa fa-edit"></i> Adicionar Parecer</a>
                                    <?php }?>
                                </p>
                            </div>
                            <!-- end profile-highlight -->
                        </div>
                        <!-- end profile-left -->
                        <!-- begin profile-right -->
                        <div class="profile-right">
                            <!-- begin profile-info -->
                            <div class="profile-info">
                                <!-- begin table -->
                                <div class="table-responsivse">
                                    <h6 class="text-primary"><i class="fa fa-list-alt"></i> Dados do Proprietário</h6>
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>País</th>
                                            <th>Nº de Identificação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $dadosProp->_nome ?></td>
                                            <td class="text-capitalize"><?php echo $dadosProp->_telefone ?></td>
                                            <td><?php echo $dadosProp->_pais ?></td>
                                            <td><?php echo $dadosProp->_numDI; ?></td>
                                        </tr>
                                        <hr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="" style="margin-top: -7%">
                                        <h6 class="text-primary"><i class="fa fa-building"></i> Dados da Organização</h6>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>NIF</th>
                                                <th>Tipo</th>
                                                <th>Comuna</th>
                                                <th>Bairro</th>
                                                <th>Rua</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $dadosOrga->_nif?></td>
                                                <td class="text-capitalize"><?php echo $dadosOrga->_tipo_organizacao?></td>
                                                <?php for ($i = 2; $i < count($dadosMorada); $i++) { ?>
                                                    <td><?php echo $dadosMorada[$i] ?></td>
                                                <?php } ?>
                                            </tr>
                                            <hr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end table -->
                            </div>
                            <!-- end profile-info -->
                        </div>
                        <!--                <span>&nbsp;</span>-->
                        <div class="panel-footer">
                            <a href="javascript:window.history.go(-1)" title="Voltar" class="btn btn-sm btn-default">Voltar</a>
                            <div class="pull-right f-s-14">
                                <i class="fa fa-clock-o"></i> Tempo de espera: <span
                                    class="text-primary"><?php echo substr($hlp->tempoEspera($rd->_data, date('Y-m-d')), 1) ?></span>
                            </div>
                        </div>
                        <!-- end profile-right -->
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
        <?php

        break;
    }
    ?>
</div>
<!-- end #content -->


<!-- #modal-dialog -->
<div class="modal fade" id="modal-parecer-admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Parecer do DMGUUC</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead">
                            <?php echo $parecer->_descricao ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>
