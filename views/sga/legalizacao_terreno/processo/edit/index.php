<?php
$opcao = array(
    new Atributo(),
    new Database()
);

$proc = $opcao[1]->listarPorId('processo', base64_decode($opcao[0]->getParam()))->fetchObject();//capturando o id do utente na tabela processo
$utente = $opcao[1]->listarPorId('requerente', $proc->_id_requerente)->fetchObject();

$pais = $opcao[1]->listarPorId('pais', $utente->_id_morada)->fetchObject();//buscando a nacionalidade

$idProcesso = array(base64_decode($opcao[0]->getParam()));
$docDado = $opcao[1]->docDado($idProcesso)->fetchAll();

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
$param = array(base64_decode($opcao[0]->getParam()), 1,$ret->_id);
$parecer = $opcao[1]->buscaExaustiva($campo, 'parecer', '_id_processo=? and _id_fase=? and _destino=?', $param)->fetchObject();//buscando as funcoes

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
                    <a href="javascript:;">Ver Detalhes <?php echo $ret->_id?><i class="fa fa-arrow-circle-o-right"></i></a>
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
                            <h4 class="panel-title"><i class="fa fa-user"></i> <?php echo stripslashes($utente->_nome) ?>  (<span href="#editar-nome" class="lnk-edit-nome text-info" style="cursor: pointer" nome="<?php echo stripslashes($utente->_nome) ?>" data-toggle="modal">editar</span>)</h4>
                        </div>
                        <div class="panel-body p-t-0">
                            <fieldset style="margin-top: 1%">
                                <legend class="text-primary" style="font-size: medium">Dados do Requerente</legend>
                                <table class="table table-valign-middle m-b-0 table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Estado Civíl</th>
                                        <th>Gênero</th>
                                        <th>Idade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-capitalize"><?php echo $dadosRq->_estado_civil ?> (<a href="#editar-estado-civil" data-toggle="modal">editar</a>)</td>
                                        <td><?php echo $genero ?> (<a href="#editar-genero" data-toggle="modal">editar</a>)</td>
                                        <td><?php echo $opcao[0]->idade($dadosRq->_data_nascimento); ?> (<a href="#editar-idade" class="lnk-edit-data" data="<?php echo $dadosRq->_data_nascimento?>" data-toggle="modal">editar</a>)</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>

                            <fieldset style="margin-top: 1%">
                                <legend class="text-primary" style="font-size: medium">Morada</legend>
                                <table class="table table-valign-middle m-b-0 table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Provincia</th>
                                        <th>Município</th>
                                        <th>Comuna</th>
                                        <th>Bairro</th>
                                        <th>Rua</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $provincia->_nome ?> (<a href="#">editar</a>)</td>
                                        <td><?php echo $municipio->_nome ?> (<a href="#">editar</a>)</td>
                                        <td><?php echo $comuna->_nome ?> (<a href="#">editar</a>)</td>
                                        <td><?php echo $bairro->_nome ?> (<a href="#">editar</a>)</td>
                                        <td><?php echo $rua->_nome ?> (<a href="#">editar</a>)</td>
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
<!--                    <div>-->
<!--                        <img src="--><?php //echo URL?><!--resources/documentos/onyx-8bd7fdf9272dcc8c727ec51e680e96ca.jpg" style="width: 150px;height: 150px" class="img-rounded img-responsive">-->
<!--                    </div>-->
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
                                <legend class="text-primary" style="font-size: medium">Dados do Requerente</legend>
                                <table class="table table-valign-middle m-b-0 table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Comuna</th>
                                        <th>Bairro</th>
                                        <th>Quarteirão</th>
                                        <th>Rua</th>
                                        <th>Bloco</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $comuna->_nome ?> (<a href="#">editar</a>)</td>
                                        <td><?php echo $bairro->_nome ?></td>
                                        <td><?php echo $loc->_sector ?></td>
                                        <td><?php echo $rua->_nome ?></td>
                                        <td><?php echo $loc->_bloco ?></td>
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
                                                <div class="todolist-input"><i class="fa fa-check text-success"></i></div>
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