<?php
$prov=$dao->listarTodos('provincia')->fetchAll(2);
$grupo=$dao->listarTodos('grupo')->fetchAll(2);
$depa=$dao->listarTodos('departamento')->fetchAll(2);
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-edit"></i> Adicionar Utilizador</p>
                    <h4>&nbsp;</h4>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">&nbsp;</h4>
                </div>
                <div class="panel-body">
                    <form action="<?php echo URL?>utilizador/registar" method="POST" class="form-registo-user-back-end" data-parsley-validate="true" name="form-wizard">
                        <div id="wizard">
                            <ol style="font-family: Verdana, Arial, sans-serif" class="frm-reg-user">
                                <li>
                                    Dados Pesssoais
                                </li>
                                <li>
                                    Morada & Grau Acadêmico
                                </li>
                                <li>
                                    Contacto & Grupo
                                </li>
                                <li>
                                    Concluir Registo
                                </li>
                            </ol>
                            <!-- begin wizard step-1 -->
                            <div class="wizard-step-1">
                                <fieldset>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-user "></i> Nome</label>
                                                <input type="text" name="nomecompleto" autofocus placeholder="António Manuel Francisco" class="form-control nomeUtilizador text-capitalize" data-parsley-group="wizard-step-1" required />
                                                <span class="error-nome"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-user"></i> Apelido</label>
                                                <input type="text" name="apelido" placeholder="apelido" class="form-control" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-venus-mars "></i> G&ecirc;nero</label>
                                                <div class="">
                                                    <div id="gender" class="btn-group" style="display: inline" data-toggle="buttons">
                                                        <label class="btn btn-primary generoUtente btn-male" style="width: 50%" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" class="generoUtente" name="genero" id="select_" checked value="m">Masculino
                                                        </label>
                                                        <label class="btn btn-default generoUtente btn-female" style="width: 50%" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" class="generoUtente" name="genero" value="f"> Feminino
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-calendar "></i> Data de Nascimento</label>
                                                <input type="text" name="datanascimento" id="datepicker-autoClose" placeholder="30-10-1988" class="form-control" onkeypress='return numeros(event)' data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-location-arrow "></i> Província</label>
                                                <select class="select-prov-mask select2 form-control default-select" data-parsley-group="wizard-step-1" required name="_id_provincia_prov">
                                                    <option value="">Selcione uma província</option>
                                                    <?php foreach ($prov as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-credit-card "></i> N&uacute;mero do Bilhete de Identidade</label>
                                                <input type="text" name="numbi"  placeholder="002841878ZZ039" maxlength="14" minlength="14" class="form-control numbi-user" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-calendar "></i> Data de Emissão</label>
                                                <input type="text" name="dataEmissao" class="form-control data-prev" maxlength="10"  id="datetimepicker3" placeholder="data de emissão" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-calendar "></i> Data de Caducidade</label>
                                                <input type="text" name="dataValidade" class="form-control data-next" id="datetimepicker4" placeholder="data de caducidade" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-1 -->
                            <!-- begin wizard step-2 -->
                            <div class="wizard-step-2">
                                <fieldset>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-location-arrow "></i> Província</label>
                                                <select class="select-prov select2 form-control default-select" data-parsley-group="wizard-step-2" required="" name="_id_provincia">
                                                    <option value="">Selcione uma província</option>
                                                    <?php foreach ($prov as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group txt">
                                                <label><i class="fa fa-location-arrow "></i> Município</label>
                                                <select class="default-select select2 form-control select-municipio" data-parsley-group="wizard-step-2" name="_id_municipio" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><i class="fa fa-location-arrow "></i> Comuna</label>
                                                <select class="default-select form-control select2 select-comuna" data-parsley-group="wizard-step-2" name="_id_comuna" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->

                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group block2">
                                                <label><i class="fa fa-location-arrow "></i> Bairro</label>
                                                <select class="default-select select2 form-control select-bairro" data-parsley-group="wizard-step-2" name="_id_bairro" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><i class="fa fa-road "></i> Rua</label>
                                                <select class="default-select select2 form-control select-rua" data-parsley-group="wizard-step-2" name="_id_rua" required></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><i class="fa fa-graduation-cap "></i> Nível Escolar</label>
                                                <select name="nivel_escolar" class="form-control select2">
                                                    <option value="Tecnico de Base">Técnico de Base</option>
                                                    <option value="Tecnico Medio">Técnico Médio</option>
                                                    <option value="Bacharel">Bacharel</option>
                                                    <option value="Tecnico Superior">Técnico Superior</option>
                                                    <option value="Mestre">Mestre</option>
                                                    <option value="Doutor">Doutor</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-2 -->
                            <!-- begin wizard step-3 -->
                            <div class="wizard-step-3">
                                <fieldset>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-6 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-phone "></i> Telefone</label>
                                                <input type="text" name="telefone" onkeypress='return numeros(event)' placeholder="9XX 123 456" class="form-control numTelefone"  data-parsley-group="wizard-step-3" data-parsley-type="letras" required />
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-envelope "></i> E-mail</label>
                                                <input type="email" name="email" placeholder="onyx@example.com" class="form-control email-dominio" data-parsley-group="wizard-step-3" data-parsley-type="email" required />
                                                <span class="error-email"></span>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-folder"></i> Departamento</label>
                                                <select class="form-control select-depa select2" data-parsley-group="wizard-step-3" required data-parsley-group="wizard-step-3"  name="depa">
                                                    <option value="">Selcione o departamento</option>
                                                    <?php foreach ($depa as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_perfil']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-folder"></i> Função</label>
                                                <select class="grupo-change form-control select2" data-parsley-group="wizard-step-3" required data-parsley-group="wizard-step-3" name="grupo"></select>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <div class="wizard-step-4">
                                <div class="jumbotron m-b-0 text-center">
                                    <p>Os dados foram inserido correctamente, clique no botão Salvar para finalizar o registo...</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="" name="tipo_tecnico" class="tipo_tecnico">
                        <input type="hidden" value="<?php echo base64_decode($att->getParam())?>" name="id_administracao">
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->