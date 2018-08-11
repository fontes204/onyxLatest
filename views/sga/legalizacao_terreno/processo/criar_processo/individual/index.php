<?php
    $paises=$dao->listarTodos('pais')->fetchAll(2);
    $prov=$dao->listarTodos('provincia')->fetchAll(2);
    $assunto=$dao->listarTodos('assunto')->fetchAll(2);

    $param=array(null);
    $campo=array('*');
    $doc=$dao->buscaExaustiva($campo,'documento','_id not in (5,6,7)',$param)->fetchAll(2);
    //$doc=$dao->listarTodos('documento')->fetchAll(2);
    $fa='';
    $cont=0;

    $condicao = 'u._id_administracao = a._id AND a._id_localizacao=l._id AND u._id=?';
    $campos = array('l._id_municipio');
    $tabelas = 'localizacao_municipio l, administracao_municipal a, utilizador u';


    $municipio=$dao->buscaExaustiva($campos,$tabelas,$condicao,$valor)->fetchObject();

    $campos = array('_id,','_nome');
    $tabelas = 'distrito';
    $valores = $municipio->_id_municipio;

    $distrito=$dao->listarDistritos($tabelas,$valores)->fetchAll(2);

  //  $distrito=$dao->buscaExaustiva($campos,$tabelas,$condicao,$valores);
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-user"></i> Registo de Requerente</p>
                    <h4>Pessoa Singular</h4>
                </div>
            </div>
        </div>
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
<!--                    <h4 class="panel-title"><i class="fa fa-user"></i> Legaliza&ccedil;&atilde;o de Terreno</h4>-->
                </div>
                <div class="panel-body">
                    <form action="<?php echo URL?>processo/criarProcessoIndividual" id="form_criar_processo"  method="POST" data-parsley-validate="true" name="form-wizard" enctype="multipart/form-data">
                        <div id="wizard">
                            <ol style="font-family: Verdana, Arial, sans-serif" class="frm-cad-proc-ind">
                                <li>
                                    Dados Pesssoais
                                </li>
                                <li>
                                    Morada
                                </li>
                                <li>
                                    Contacto & Localização do terreno
                                </li>
                                <li>
                                    Documentos
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
                                                <label><i class="fa fa-user "></i> Nome Completo</label>
                                                <input type="text" name="nomecompleto" placeholder="António Manuel Francisco" class="form-control text-capitalize nome-completo" autofocus data-parsley-group="wizard-step-1" required />
                                                <span class="error-nome" style="position: absolute; margin-top: -7px"></span>
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
                                                <input type="text" name="data" id="datepicker-autoClose" onkeypress='return numeros(event)' placeholder="30-10-1988" class="form-control" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->

                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-globe "></i> Nacionalidade</label>
                                                <select class="select2 form-control nacionalidade" name="nacionalidade">
                                                    <?php foreach ($paises as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 agrupa-elementos">
                                            <div class="form-group block1 div-provinvia">
                                                <label><i class="fa fa-location-arrow "></i> Província</label>
                                                <select style="width: 100%" class="select2 form-control select-prov-mask" name="provincia">
                                                    <?php foreach ($prov as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>

                                            <div class="form-group div-tipo-documento">
                                                <label><i class="fa fa-credit-card "></i> Tipo de Documento</label>
                                                <div class="">
                                                    <div id="gender" class="btn-group" style="display: inline" data-toggle="buttons">
                                                        <label class="btn btn-primary generoUtente btn-passaporte" style="width: 50%" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" class="generoUtente" name="tipoDocumento" id="select_" checked value="passaporte">Passaporte
                                                        </label>
                                                        <label class="btn btn-default generoUtente btn-cartao_residente" style="width: 50%" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                            <input type="radio" class="generoUtente" name="tipoDocumento" value="cartao_residente"> Cartão Residente
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-credit-card "></i> <span class="lbl-num-documento">N&uacute;mero do Documento</span></label>
                                                <input type="text" name="numbi" placeholder="002841878ZZ039" class="form-control numbi-user"  data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-calendar "></i> Data de Emissão</label>
                                                <input type="text" name="dataEmissao" onkeypress='return numeros(event)' placeholder="30-10-1988" class="form-control data-pick" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-genderless "></i> Estado Civil</label>
                                                <select class="select2 form-control" name="estadocivil">
                                                    <option value="casado">Casado(a)</option>
                                                    <option value="divorciado">Divorciado(a)</option>
                                                    <option value="solteiro">Solteiro(a)</option>
                                                    <option value="viuvo">Vi&uacute;vo(a)</option>
                                                </select>
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
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label><i class="fa fa-location-arrow "></i> Província</label>
                                                <select class="select2 form-control select-prov-1" data-parsley-group="wizard-step-2" name="prov">
                                                    <option value="">Selecione uma província</option>
                                                    <?php foreach ($prov as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block2">
                                                <label><i class="fa fa-location-arrow "></i> Município</label>
                                                <select class="select2 form-control select-municipio-1" data-parsley-group="wizard-step-2" name="muni" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><i class="fa fa-location-arrow "></i> Comuna/Distrito</label>
                                                <select class="select2 form-control select-comuna-1" data-parsley-group="wizard-step-2" name="comu" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><i class="fa fa-location-arrow "></i> Bairro</label>
                                                <select class="select2 form-control select-bairro-1" data-parsley-group="wizard-step-2" name="bai" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><i class="fa fa-location-arrow "></i> Rua</label>
                                                <select class="select2 form-control select-rua-1" name="rua" data-parsley-group="wizard-step-2" required></select>
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
                                                <input type="text" name="telefone" onkeypress='return numeros(event)' placeholder="9XX 123 456" class="form-control numTelefone" data-parsley-group="wizard-step-3" data-parsley-type="letras" required />
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-envelope "></i> E-mail</label>
                                                <input type="email" name="email" placeholder="onyx@example.com" class="form-control email-dominio" data-parsley-group="wizard-step-3" data-parsley-type="email"  />
                                                <span class="error-email"></span>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-location-arrow "></i> Localização do terreno </label>
                                                <select style="width: 100%" class="select2 form-control select-prov-mask2" name="distrito">
                                                    <?php foreach ($distrito as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                    <option value="0">Nenhum</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><i class="fa fa-cc-discover "></i> Assunto</label>
                                                <select class="select2 form-control" name="assunto">
                                                    <?php foreach ($assunto as  $res):?>
                                                        <option value="<?php echo $res['_assunto'];?>"><?php echo $res['_assunto']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <input type="hidden" value="<?php echo Session::get('administracao')?>" name="id_administracao">
                    </form>
                            <!-- end wizard step-4 -->
                            <!-- begin wizard step-5 -->

                            <div class="wizard-step-5">
<!--                                <fieldset>-->
<!--                                    <!-- begin row -->
                                    <div>
                                        <ul class="list-inline">
                                            <?php foreach ($doc as $docs):
                                                $cont+=1;
                                                if($docs['_id']=='1')
                                                {
                                                    $fa='fa fa-list-alt';
                                                }elseif ($docs['_id']=='2')
                                                {
                                                    $fa='fa fa-map-o';
                                                }elseif ($docs['_id']=='3')
                                                {
                                                    $fa='fa fa-list-alt';
                                                }else
                                                {
                                                    $fa='fa fa-picture-o';
                                                }
                                                ?>
                                                <li class="btn-check list-group list-group-lg no-radius" indice="<?php echo $cont?>"><input type="checkbox" class="documento input-xs" value="<?php echo $docs['_id']?>"  data-render="switchery" data-theme="default" name="" /> <b><?php echo $docs['_nome']?> <i class="<?php echo $fa;?>"></i></b>
                                                    <span class="agrega-input-file<?php echo $cont?>">
                                                        <span class="btn btn-primary btn-xs btn-group-xs fileinput-button btn-upload<?php echo $cont?>"> <i class="fa fa-picture-o"></i> <input type="file" accept="image/*" cont="<?php echo $cont?>" name="image" id="image" class="input-xs form-control"> </span>
                                                        <span class="btn btn-danger btn-xs btn-group-xs fileinput-button del-file<?php echo $cont?>"> <i class="fa fa-trash"></i></span>
                                                        <br><span class="text-center" id="image-span<?php echo $cont?>"></span>
                                                    </span>
                                                </li>
                                            <?php endforeach;?>
<!--                                            <li><span class="btn btn-xs btn-primary" href="#cameraModal" data-toggle="modal"><i class="fa fa-camera"></i> Tirar Foto</span></li>-->
                                        </ul>
                                    </div>
<!--                                    <!-- end row -->
<!--                                </fieldset>-->
                            </div>
                            <!-- end wizard step-5 -->

                        </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->