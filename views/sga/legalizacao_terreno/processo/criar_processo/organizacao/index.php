<?php
$paises=$dao->listarTodos('pais')->fetchAll(2);
$campo = array('_id');
$valor = array('Cacuaco');
$rs = $dao->buscaExaustiva($campo, 'municipio', '_nome=?', $valor)->fetchObject();

$campo = array('*');
$valor = array($rs->_id);
$comu = $dao->buscaExaustiva($campo, 'comuna', '_id_municipio=?', $valor)->fetchAll(2);
$doc=$dao->listarTodos('documento')->fetchAll(2);
$fa='';
$cont=0;
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-home"></i> Registo de Requerente</p>
                    <h4>Organização/ Empresa</h4>
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
                </div>
                <div class="panel-body">
                    <form action="<?php echo URL?>processo/criarProcessoOrganizacao" id="form_criar_processo_organizacao" method="POST" data-parsley-validate="true" name="form-wizard">
                        <div id="wizard">
                            <ol style="font-family: Verdana, Arial, sans-serif" class="frm-cad-proc-org">
                                <li>
                                    Dados Gerais
                                </li>
                                <li>
                                    Dados do Proprietário
                                </li>
                                <li>
                                    Localização
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
                                                <label>Nome da Organização</label>
                                                <input type="text" name="nomecompleto" placeholder="IFAL" class="form-control nomecompleto text-capitalize" autofocus data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nº do Decreto</label>
                                                <input type="text" name="numDecreto" placeholder="000918281" class="form-control numDecreto" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>NIF</label>
                                                <input type="text" name="nif" placeholder="002841878ZZ039" class="form-control nif" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tipo de Organização</label>
                                                <select class="default-select2 form-control tipo_organizacao" name="tipo_organizacao">
                                                    <option value="igreja">Igreja</option>
                                                    <option value="escola">Escola</option>
                                                    <option value="farmacia">Farmácia</option>
                                                    <option value="super_mercado">Super Mercado</option>
                                                    <option value="outro">Outro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="telefone" value="NULL">
                                        <input type="hidden" name="email"value="NULL">
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
                                                <label>Nome</label>
                                                <input type="text" name="nomeProprietario" placeholder="João Lopes" class="form-control nomecompleto text-capitalize" autofocus data-parsley-group="wizard-step-2" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefone</label>
                                                <input type="text" name="telefoneProprietario" placeholder="923999999" class="form-control telefoneProprietario" data-parsley-group="wizard-step-2" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nacionalidade</label>
                                                <select class="default-select form-control nacionalidadeProp" name="nacionalidadeProp">
                                                    <?php foreach ($paises as $pais):?>
                                                        <option value="<?php echo $pais['_nome']?>"><?php echo $pais['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nº do Documento de Identificação</label>
                                                <input type="text" name="numeroDI" placeholder="002841878ZZ039" class="form-control numeroDI" data-parsley-group="wizard-step-2" required />
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
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
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Comuna</label>
                                                <select class="default-select form-control select-comuna-1" name="comu" required>
                                                    <?php foreach ($comu as $comu1):?>
                                                        <option value="<?php echo $comu1['_id']?>"><?php echo $comu1['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <select class="default-select form-control select-bairro-1" name="bai" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Rua</label>
                                                <select class="default-select form-control select-rua-1" name="rua" required></select>
                                                <!--                                                <input type="text" name="_id_rua" id="datepicker-autoClose" placeholder="Pedro de Castro Vandúnen Loy" class="form-control" data-parsley-group="wizard-step-2" required />-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <!-- begin wizard step-5 -->
                            <div class="wizard-step-4">
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
                                    </ul>
                                </div>
                            </div>
                            <!-- end wizard step-5 -->
                        </div>
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
<!-- #modal-dialog -->
<div class="modal fade calback-sucesso-prcesso" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close fechar-sucesso-processo" data-dismiss="modal" aria-hidden="true">×</button>
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