
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                        <p><i class="fa fa-edit"></i> Adicionar Administração</p>
                    <h4>&nbsp;</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row palco">
        <!-- begin col-10 -->
        <div class="col-md-9">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-2">
                <div class="panel-body">
                    <form data-parsley-validate="true" action="<?php echo URL?>administracao_municipal/criar" method="post" class="form-add-administracao">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group blockNome">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="" autofocus placeholder="nome" data-parsley-required="true" class="form-control nome-completo" required />
                                    <span class="error-nome"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group block1">
                                    <label>Província</label>
                                    <select class="select2 select-prov" name="id_provincia" style="width: 100%" data-parsley-group="wizard-step-2" >
                                        <option value="">Selecione a Província</option>
                                        <?php foreach ($dao->listarTodos('provincia') as $rs):?>
                                            <option value="<?php echo $rs->_id?>"><?php echo $rs->_nome?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group block1">
                                    <label>Município</label>
                                    <select class="default-select select2 form-control select-municipio" data-parsley-group="wizard-step-2" name="_id_municipio" required></select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
        <div class="col-md-3">
            <div class="panel panel-primary" data-sortable-id="index-9">
                <div class="panel-heading">
                    <h4 class="panel-title">&nbsp;</h4>
                </div>
                <div class="panel-body p-0 image gallery-group-1">
                    <div class="panel-body p-0 image gallery-group-1">
                        <ul class="todolist">
                            <li>
                                <div id="datepicker-inline" class="datepicker-full-width"><div></div></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end #content -->