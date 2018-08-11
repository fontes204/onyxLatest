<?php
$dao = new Database();
$depa = $dao->listarTodos('departamento')->fetchAll(2);
$pais = $dao->listarTodos('pais')->fetchAll(2);
?>
<!-- #modal-dialog -->
<div class="modal fade calback-sucesso" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-refresh" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Onyx informa</h6>
            </div>
            <div class="modal-body">
                <div class="alert alert-info fade in m-b-15 text-center">
                    <strong class="txt-call-back"></strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse btn-refresh btn-exit-modal-send-pro"
                   data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade adicionar-documento" id="adicionar-documento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Adicionar Documento</h6>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control nomedoc" name="nomedoc" placeholder="Nome"
                           data-parsley-required="true"/>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary link-add-doc" data-dismiss="modal">Salvar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade adicionar-departamento" id="adicionar-departamento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-users"></i> Adicionar Departamento</h6>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <input type="text" class="form-control nomeDepa" name="nomeDepa" placeholder="Nome"
                           data-parsley-required="true"/>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary link-add-depa-user">Salvar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adicionar-tipo-tecnico">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header panel-inverse">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title text-capitalize"><i class="fa fa-user"></i> Selecione o tipo de técnico</h6>
            </div>
            <div class="modal-body text-center">
                <select class="form-control selectpicker select_tipo_tecnico" data-size="10" id="tipo_tec"
                        data-live-search="true" data-style="btn-info">
                    <option value="tect_admin" selected>Técnico Administrativo</option>
                    <option value="tect_campo">Técnico de Campo</option>
                </select>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary btn-add-tecnico" data-dismiss="modal">Adicionar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade adicionar-documento" id="adicionar-grupo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-users"></i> Adicionar Função de Utilizador</h6>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <input type="text" class="form-control nomeGrupo" name="nomeGrupo" placeholder="Nome"
                           data-parsley-required="true"/>
                </div>
                <div class="form-group">
                    <select class="form-control selectpicker select_id_depa" data-size="10" data-live-search="true"
                            data-style="btn-info">
                        <?php foreach ($depa as $res): ?>
                            <option value="<?php echo $res['_id']; ?>"><?php echo $res['_perfil'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary link-add-grupo-user">Salvar</a>
            </div>
        </div>
    </div>
</div>

<!-- Alterar os dados do processo do requerente-->

<!-- Alterar o nome-->
<div class="modal fade editar-nome" id="editar-nome">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-edit"></i> Editar o nome</h6>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <input type="text" class="form-control nomeRequerente" name="nomeRequerente" placeholder="Nome"
                           data-parsley-required="true"/>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary btn-edit-nome-requerente">Alterar</a>
            </div>
        </div>
    </div>
</div>

<!-- Alterar o estado civil-->
<div class="modal fade editar-estado-civil small" id="editar-estado-civil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-edit"></i> Editar o Estado Civil</h6>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <select class="selectpicker form-control" name="estadocivil" data-size="10" data-live-search="true">
                        <option value="casado">Casado(a)</option>
                        <option value="divorciado">Divorciado(a)</option>
                        <option value="solteiro">Solteiro(a)</option>
                        <option value="viuvo">Vi&uacute;vo(a)</option>
                    </select>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary btn-edit-estadoRequerente">Alterar</a>
            </div>
        </div>
    </div>
</div>


<!-- Alterar a nacionalidade-->
<div class="modal fade editar-pais small" id="editar-pais">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-globe"></i> Editar Nacionalidade</h6>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <select class="selectpicker form-control" name="pais" data-size="10" data-live-search="true">
                        <?php foreach ($pais as $res): ?>
                            <option value="<?php echo $res['_id']; ?>"><?php echo $res['_nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary btn-edit-pais">Alterar</a>
            </div>
        </div>
    </div>
</div>


<!-- Alterar o genero-->
<div class="modal fade editar-genero" id="editar-genero">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-edit"></i> Editar o Gênero</h6>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-offset-4">
                    <div class="text-center">
                        <div id="gender" class="btn-group" style="display: inline" data-toggle="buttons">
                            <label class="btn btn-primary generoUtente btn-male" data-toggle-class="btn-primary"
                                   data-toggle-passive-class="btn-default">
                                <input type="radio" class="generoUtente" name="genero" id="select_" checked value="m">Masculino
                            </label>
                            <label class="btn btn-default generoUtente btn-female" data-toggle-class="btn-primary"
                                   data-toggle-passive-class="btn-default">
                                <input type="radio" class="generoUtente" name="genero" value="f"> Feminino
                            </label>
                        </div>
                    </div>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary btn-edit-generoRequerente">Alterar</a>
            </div>
        </div>
    </div>
</div>

<!-- Alterar a idade-->
<div class="modal fade editar-nome" id="editar-idade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-calendar"></i> Editar Data de Nascimento</h6>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <input type="text" class="form-control idadeRequerente" name="idadeRequerente"
                           id="datepicker-autoClose" onkeypress='return numeros(event)' placeholder="30-10-1988"
                           data-parsley-required="true"/>
                </div>
                <span class="sms-callback text-center">&nbsp;</span>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary btn-edit-idadeRequerente">Alterar</a>
            </div>
        </div>
    </div>
</div>

<!--CAPTURA DE PONTOS - IGUALDADE--->
<div class="modal fade editar-nome" id="iguldade-pontos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-map-pin"></i> Igualidade de Pontos</h6>
            </div>
            <div class="modal-body">
                <p class="f-s-14 text-inverse text-justify">
                    Foi encontrado uma igualidade de pontos entre o terreno em que estás a demarcar os pontos e o
                    terreno do Sr(a). <span
                            class="nomeRequerenteIgu underline f-w-200 text-primary text-capitalize"></span>.
                    Certifique-se de que é um ponto fronteiriço.<br/>
                </p>
                <p class="f-s-13 text-inverse">É realmente um ponto fronteiriço?</p>
                <p>
                    <a href="javascript:;" data-dismiss="modal" class="btn btn-primary btn-xs m-r-5 btn-pig-front-s"
                       valor="s">Sim <i class="fa fa-check"></i></a>
                    <!--<a href="javascript:;" data-dismiss="modal" class="btn btn-white btn-xs btn-pig-front-n" valor="n">Não
                        <i class="fa fa-times"></i></a>-->
                    <a href="javascript:;" class="btn btn-white btn-xs" data-dismiss="modal">Não<i class="fa fa-times"></i></a>
                </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>

<!--CAPTURA DE PONTOS - SOBREPOSICAO--->
<div class="modal fade editar-nome" id="sobreposicao-terreno">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-map-pin"></i> Sobreposição de Terreno</h6>
            </div>
            <div class="modal-body">
                <p class="f-s-14 text-inverse text-justify">
                    Foi encontrado uma sobreposição de pontos entre o terreno em que estás a demarcar os pontos e o
                    terreno do Sr(a). <span class="nomeRequerenteIgu underline f-w-200 text-primary text-capitalize"></span>
                </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>

<!--CALLBACKS DO CRUD ZONA--->
<div class="modal fade modal-zona" id="modal-zona">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><i class="fa fa-info-circle"></i> Onyx informa</h6>
            </div>
            <div class="modal-body text-center">
                <div class="alert fade in m-b-15 div-alert">
                    <strong class="text-strong"></strong>
                    <span class="text-calback"></span>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse fechar-sucesso-processo" data-dismiss="modal"
                   aria-hidden="true">Fechar</a>
            </div>
        </div>
    </div>
</div>

<!--Camera-->
<div class="modal fade" id="cameraModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title"><i class="fa fa-camera"></i> Captura de Imagem</h5>
            </div>
            <div class="modal-body">
                <div id="camera" class="img-thumbnails"></div>
            </div>
            <div class="modal-footer">
                <!--                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>-->
                <input type="button" class="btn btn-primary btn-xs" value="Capturar" onClick="webcam.freeze()">
                &nbsp;
                <input type="button" class="btn btn-info btn-xs btn-upload-foto" value="Salvar">
                &nbsp;
                <input type="button" class="btn btn-danger btn-xs" value="Reset" onClick="webcam.reset()">
            </div>
        </div>
    </div>
</div>

<!-- #modal-dialog -->
<div class="modal fade calback-sucesso-prcesso" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close fechar-sucesso-processo" data-dismiss="modal" aria-hidden="true">×
                </button>
                <h4 class="modal-title">Onyx informa</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info fade in m-b-15 text-center">
                    <strong>O processo foi criado com sucesso.</strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse fechar-sucesso-processo" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>


<!--Area reservada para atualizacao de imagem de perfil do utilizador-->
<div class="modal fade" id="modal-captura-imagem-perfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Alterar Fotografia</h6>
            </div>
            <div class="modal-body">
                <div style="margin: 1% 35%">
                    <div class="profile-image" style="border: 1px">
                        <div class="text-center" id="image-span" style="width: 206px;width: 206px;z-index: 1">
                        <img class="img-thumbnail image-perfil-usr" style="width: inherit;height: inherit"
                             src="<?php echo URL ?>resources/img_perfil/<?php echo $ft->_foto?>"/>
                        </div>
                    </div>
<!--                    <div style="margin-top: -30%;left: 29%; position: relative">-->
                    <div style="text-align: center">
                        <p class="control-buttons">
                            <span title="Carregar uma foto apartir do Computador" class="btn btn-primary btn-sm m-r-5 fileinput-button btn-upload"> <i class="fa fa-upload"></i> <input type="file" accept="image/*" name="image" id="image" class="input-xs form-control"> </span>
                            <a href="javascript:;"  style="border-radius: 4px" class="btn btn-white btn-sm btn-web-cam" title="Usar a Camera"><i class="fa fa-camera"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<div class="modal fade calback-sucesso" id="modal-alterar-creditos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-exit-alterar-creditos" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Onyx informa</h6>
            </div>
            <div class="modal-body">
                <div class="alert alert-success fade in m-b-15 text-center">
                    <strong class="txt-call-back"></strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse btn-refresh btn-exit-alterar-creditos"
                   data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>


<!--callbacks para o crud realcionado ao super adimi-->
<div class="modal fade" id="modal-callback">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-refresh" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title">Onyx informa</h6>
            </div>
            <div class="modal-body">
                <div class="alert alert-info fade in m-b-15 text-center">
                    <strong class="txt-call-back"></strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:window.history.go(-1)" class="btn btn-sm btn-inverse">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirm-eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-refresh" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><span class="text-info">On</span>yx informa</h6>
            </div>
            <div class="modal-body">
                <div class="agrupador-txt">

                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" data-dismiss="modal" class="btn btn-sm btn-inverse">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirm-desctivar-conta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-refresh" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><span class="text-info">On</span>yx informa</h6>
            </div>
            <div class="modal-body">
                <div class="agrupador-txt">

                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" data-dismiss="modal" class="btn btn-sm btn-inverse">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alert-actualizar-credencias">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close btn-refresh" data-dismiss="modal" aria-hidden="true">×</button>-->
                <h6 class="modal-title"><span class="text-info">On</span>yx informa <span class="pull-right"><i class="fa fa-key"></i></span></h6>
            </div>
            <div class="modal-body">
                <p class="text-center "><strong>Por razões de segurança aconselhamos-te a trocar as tuas credencias de acesso ao sistema.</strong></p>
                <p class="text-center">
                    <a href="<?php echo URL.$att->getController()?>/alterarCredenciais/<?php echo base64_encode(Session::get('id_user'))?>" class="btn btn-primary btn-xs m-r-5 btn-alterar-cred" >Alterar Agora</a>
                    <a href="javascript:;" class="btn btn-default btn-xs btn-adiar-cred" data-dismiss="modal">Próxima vez</a>
                </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" data-dismiss="modal" class="btn btn-xs btn-inverse btn-adiar-cred">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade calback-sucesso" id="modal-mostrar-sms-conta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-exit-alterar-creditos" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><span class="text-info">On</span>yx informa</h6>
            </div>
            <div class="modal-body">
                <div class="alert alert-success fade in m-b-15 text-center">
                    <strong class="txt-call-back"></strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade calback-sucesso1" id="modal-conta-criada">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><span class="text-info"></span>On</span>yx informa</h6>
            </div>
            <div class="modal-body">
                <div class="alert alert-success fade in m-b-15 text-center">
                    <strong class="txt-call-back1"></strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade calback-sucesso" id="modal-tipo-de-processo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><span class="text-info">On</span>yx informa</h6>
            </div>
            <div class="modal-body">
                <select class="select2 form-control" name="estadocivil" style="width: 100%">
                    <option value="casado">Vila Verde</option>
                    <option value="divorciado">Vila Cativa</option>
                    <option value="viuvo">Por do Sol</option>
                </select>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>