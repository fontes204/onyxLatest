<?php
$fase=new ParecerDao();
$terreno=new TerrenoDao();
$relatorio=new RelatorioDao();
$opcao = array(
    new Atributo(),
    new Database()
);

$proc = $opcao[1]->listarPorId('processo', base64_decode($opcao[0]->getParam()))->fetchObject();//capturando o id do utente na tabela processo
$utente = $opcao[1]->listarPorId('requerente', $proc->_id_requerente)->fetchObject();
$ctrlFase=$ctrlfase=$terreno->numRegisto($proc->_id_requerente);

$ctrlRelatorio=$relatorio->numRelatorio(base64_decode($opcao[0]->getParam()));
$pais = $opcao[1]->listarPorId('pais', $utente->_id_morada)->fetchObject();//buscando a nacionalidade

$idProcesso = array(base64_decode($opcao[0]->getParam()));
$docDado = $opcao[1]->docDado($idProcesso)->fetchAll();
$vl = array($utente->_id);
$campos = array('*');
$terreno = $opcao[1]->buscaExaustiva($campos, 'terreno', '_id_utente=?', $vl)->fetchObject();//buscando o terreno

$loc = $opcao[1]->listarPorId('morada', $utente->_id_morada)->fetchObject();//buscando a localizacao

$provincia = $opcao[1]->listarPorId('provincia', $loc->_id_provincia)->fetchObject();//buscando a provincia
$municipio = $opcao[1]->listarPorId('municipio', $loc->_id_municipio)->fetchObject();//buscando o municipio
$comuna = $opcao[1]->listarPorId('comuna', $loc->_id_comuna)->fetchObject();//buscando a comuna
$bairro = $opcao[1]->listarPorId('bairro', $loc->_id_bairro)->fetchObject();//buscando o bairro
$rua = $opcao[1]->listarPorId('rua', $loc->_id_rua)->fetchObject();//buscando a rua


$campo=array('_id');
$param=array('Reparticao de Urbanismo e Cadastro');
$retID=$opcao[1]->buscaExaustiva($campo, 'departamento', '_perfil=?', $param)->fetchObject();//buscando as funcoes

$campo=array('_id');
$param=array('Chefe',$retID->_id);
$ret=$opcao[1]->buscaExaustiva($campo, 'grupo', '_perfil=? AND _id_departamento=?', $param)->fetchObject();//buscando as funcoes


$campo = array('*');
$param = array(base64_decode($opcao[0]->getParam()), 1,Session::get('id_user'));
$parecer = $opcao[1]->buscaExaustiva($campo, 'parecer', '_id_processo=? and _id_fase=? and _destino=?', $param)->fetchObject();//buscando o parecer

$campo=array('*');
$param=array('Tecnico','TRUC');
$grupo=$opcao[1]->buscaExaustiva($campo,'grupo','_perfil=? and _sigla=?',$param)->fetchObject();//buscando as funcoes

$campo=array('*');
$param=array($grupo->_id);
$tecnico=$opcao[1]->buscaExaustiva($campo,'utilizador','_id_grupo=?',$param)->fetchAll(2);//buscando as funcoes
?>
<!-- begin #content -->
<div id="content" class="content">
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-arrow-circle-down"></i></div>
                <div class="stats-info">
                    <h4>Entradas</h4>
                    <p>3</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes<i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-arrow-circle-up"></i></div>
                <div class="stats-info">
                    <h4>Saídas</h4>
                    <p>20</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-lock"></i></div>
                <div class="stats-info">
                    <h4>Pendentes</h4>
                    <p>00</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-file-archive-o"></i></div>
                <div class="stats-info">
                    <h4>Todos Processos</h4>
                    <p>23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <?php
    switch ($utente->_tipo) {
        case 'cidadao':
            $vl = array($utente->_id);
            $campos = array('*');
            $dadosRq = $opcao[1]->buscaExaustiva($campos, 'cidadao', '_id_requerente=?', $vl)->fetchObject();//buscando os dados do cidadao
            $pais = $opcao[1]->listarPorId('pais', $dadosRq->_nacionalidade)->fetchObject();//buscando a nacionalidade
            if ($dadosRq->_genero == 'f')
                $genero = 'Femenino';
            else
                $genero = 'Masculino';
            ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-inverse" data-sortable-id="index-6">
                        <div class="panel-heading">
                            <div class="btn-group pull-right" data-toggle="buttons">
                                <a href="#modal-parecer-admin"
                                   class="btn btn-xs btn-default" data-toggle="modal"><i class="fa fa-list"></i> Ver o parecer</a>&nbsp;
                                <?php if($ctrlFase==0){?>
                                <a
                                        href="<?php echo URL?>tecnico/capturar_coordenadas/<?php echo $opcao[0]->getParam()?>" class="btn btn-xs btn-primary"
                                        data-toggle="modal"><i class="fa fa-map-pin"></i> Capturar Vértices</a>
                                <?php }?>
                                <?php if($ctrlFase==1 && $ctrlRelatorio==0){?>
                                    <a
                                            href="<?php echo URL?>tecnico/criarRelatorio/<?php echo $opcao[0]->getParam()?>" class="btn btn-xs btn-success"
                                            data-toggle="modal"><i class="fa fa-edit"></i> Criar Relatório</a>
                                <?php }?>
                                </span>
                            </div>
                            <h4 class="panel-title"><i class="fa fa-user"></i> <?php echo stripslashes($utente->_nome) ?></h4>
                        </div>
                        <div class="panel-body p-t-0">
                            <fieldset style="margin-top: 1%">
                                <legend class="text-primary" style="font-size: medium">Dados Pessoais</legend>
                                <table class="table table-valign-middle m-b-0 table-striped table-bordered">
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
                                    </tbody>
                                </table>
                            </fieldset>

                            <fieldset style="margin-top: 1%">
                                <legend class="text-primary" style="font-size: medium">Morada</legend>
                                <table class="table table-valign-middle m-b-0 table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Província</th>
                                        <th>Municipio</th>
                                        <th>Comuna</th>
                                        <th>Bairro</th>
                                        <th>Rua</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $provincia->_nome ?></td>
                                        <td><?php echo $municipio->_nome ?></td>
                                        <td><?php echo $comuna->_nome ?></td>
                                        <td><?php echo $bairro->_nome ?></td>
                                        <td><?php echo $rua->_nome ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                            <fieldset>
                                <legend></legend>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-inverse" data-sortable-id="index-9">
                        <div class="panel-heading">
                            <h4 class="panel-title">Documento(s) préviamente apresentados</h4>
                        </div>
                        <div class="panel-body p-0 image gallery-group-1">
                            <ul class="todolist">
                                <?php foreach ($docDado as $res):
                                    $campo = array('dp._foto');
                                    $idDoc = array($res->_id, base64_decode($opcao[0]->getParam()));
                                    $foto = $opcao[1]->buscaExaustiva($campo, 'documento_processo dp', '_id_documento=? and _id_processo=?', $idDoc)->fetchAll(2);
                                    foreach ($foto as $ft):
                                        if($res->_nome=="Requerimento")
                                            $fa='fa fa-list-alt';
                                        elseif ($res->_nome=="Croqu&iacute;s de Localização")
                                            $fa='fa fa-map-o';
                                        elseif ($res->_nome=="Bilhete de Identidade")
                                            $fa='fa fa-list-alt';
                                        elseif ($res->_nome=="Fotografia")
                                            $fa='fa fa-picture-o';
                                        ?>
                                        <li>
                                            <a href="<?php echo URL ?>resources/documentos/<?php echo $ft['_foto'] ?>"
                                               class="todolist-container" data-lightbox="gallery-group-1">
                                                <div class="todolist-input"><i class="<?php echo $fa?> text-primary"></i>
                                                </div>
                                                <div class="todolist-title"><?php echo $res->_nome ?></div>
                                            </a>
                                        </li>
                                    <?php endforeach;
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-inverse" data-sortable-id="index-9">
                        <div class="panel-heading">
                            <h4 class="panel-title">Relatórios do Processo</h4>
                        </div>
                        <div class="panel-body p-0 image gallery-group-2">
                            <ul class="todolist">
                                <li>
                                    <a href="<?php echo URL ?>views/relatorio/ficheiro/<?php echo $relatorio->listarRelatorio(base64_decode($opcao[0]->getParam()))->_path?>"
                                       class="todolist-container" data-lightbox="gallery-group-2">
                                        <div class="todolist-input"><i class="fa fa-file-text text-primary"></i>
                                        </div>
                                        <div class="todolist-title">Relatório Técnico</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            break;
        case 'organizacao':

            ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-inverse" data-sortable-id="index-6">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php echo stripslashes($utente->_nome) ?></h4>
                        </div>
                        <div class="panel-body p-t-0">
                            <fieldset style="margin-top: 1%">
                                <legend class="text-primary" style="font-size: medium">Dados do Requerente <span
                                            class="pull-right"><a href="#modal-parecer-admin"
                                                                  class="btn btn-xs btn-default" data-toggle="modal">Ver o parecer</a>&nbsp;<a
                                                href="<?php echo URL?>tecnico/capturar_coordenadas/<?php echo $opcao[0]->getParam()?>" class="btn btn-xs btn-primary"
                                                data-toggle="modal">Adicionar Parecer</a></span></legend>
                                <table class="table table-valign-middle m-b-0 table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Comuna</th>
                                        <th>Bairro</th>
                                        <th>Quarteirão</th>
                                        <th>Rua</th>
                                        <th>Bloco</th>
                                        <th>Área do Terreno</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $comuna->_nome ?></td>
                                        <td><?php echo $bairro->_nome ?></td>
                                        <td><?php echo $loc->_sector ?></td>
                                        <td><?php echo $rua->_nome ?></td>
                                        <td><?php echo $loc->_bloco ?></td>
                                        <td><?php echo $terreno->_area ?> m <sup>2</sup></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                            <fieldset>
                                <legend></legend>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-inverse" data-sortable-id="index-9">
                        <div class="panel-heading">
                            <h4 class="panel-title">Documento(s) préviamente apresentados</h4>
                        </div>
                        <div class="panel-body p-0 image gallery-group-1">
                            <ul class="todolist">
                                <?php foreach ($docDado as $res):
                                    $campo = array('dp._foto');
                                    $idDoc = array($res->_id, base64_decode($opcao[0]->getParam()));
                                    $foto = $opcao[1]->buscaExaustiva($campo, 'documento_processo dp', '_id_documento=? and _id_processo=?', $idDoc)->fetchAll(2);
                                    foreach ($foto as $ft):
                                        ?>
                                        <li>
                                            <a href="<?php echo URL ?>resources/documentos/<?php echo $ft['_foto'] ?>"
                                               class="todolist-container" data-lightbox="gallery-group-1">
                                                <div class="todolist-input"><i class="fa fa-check text-success"></i>
                                                </div>
                                                <div class="todolist-title"><?php echo $res->_nome ?></div>
                                            </a>
                                        </li>
                                    <?php endforeach;
                                endforeach;
                                ?>
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

<!---modal que serve para o administrador enviar o seu parecer-->
<div class="modal fade" id="parecer-dmguuc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Selecione o Técnico</h6>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control selectpicker destino" data-size="10" data-live-search="true" data-style="btn-info">
                                <?php foreach ($tecnico as $res):?>
                                    <option value="<?php echo $res['_id']?>"><?php echo $res['_nome']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea cols="101" class="form-control desc" style="resize: none"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?php echo URL?>processo/movimento" id_proc="<?php echo base64_decode($opcao[0]->getParam())?>" meu_id="<?php echo $_SESSION['id_user']?>" class="btn btn-sm btn-info btn-viar-tecnico">Enviar</a>
            </div>
        </div>
    </div>
</div>