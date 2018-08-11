<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-location-arrow"></i></div>
                <div class="stats-info">
                    <?php if($att->getParam()!=null){
                        $dadosDepa=$dao->listarPorId('departamento',base64_decode($att->getParam()))->fetchObject();
                        $nomeValue=$dadosDepa->_perfil;
                        $descValue=$dadosDepa->_descricao;
                        $btnClass='btn-editar-departamento';
                        $btnText='Salvar Alterações';
                        $idProv= base64_decode($att->getParam());
                        $clsnome_depa='nome_departa';
                        $action=URL."provincia/editarDepartamento"
                        ?>
                        <p><i class="fa fa-edit"></i> Editar Província</p>
                    <?php }else{
                        $nomeValue="";
                        $descValue="";
                        $btnClass='btn-salvar-departamento';
                        $btnText='Salvar';
                        $idProv="";
                        $clsnome_depa='nome_departamento';
                        $action=URL."provincia/salvar"
                        ?>
                        <p><i class="fa fa-edit"></i> Adicionar Província</p>
                    <?php }?>
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
                    <form data-parsley-validate="true" method="POST" action="<?php echo $action?>" class="form-add-provincia">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group blockNome">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?php echo $nomeValue?>" autofocus placeholder="nome" data-parsley-required="true" class="form-control input-lg <?php echo $clsnome_depa?>" required />
                                    <span class="error-nome"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group block1">
                                    <label>Sigla</label>
                                    <input type="text" name="sigla" maxlength="2" value="<?php echo $descValue?>" autofocus placeholder="Sigla" data-parsley-required="true" class="form-control input-lg ctrlNumDescDepa" required />
                                    <span class="error-desc"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group block1">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude" maxlength="18" value="<?php echo $descValue?>" autofocus placeholder="Longitude" data-parsley-required="true" class="form-control input-lg ctrlNumDescDepa" required />
                                    <span class="error-desc"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group block1">
                                    <label>Latitude</label>
                                    <input type="text" name="latitude" maxlength="18" value="<?php echo $descValue?>" autofocus placeholder="Latitude" data-parsley-required="true" class="form-control input-lg ctrlNumDescDepa" required />
                                    <span class="error-desc"></span>
                                </div>
                            </div>
                            <input type="hidden" name="idProvincia" value="<?php echo $idProv?>">
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-primary pull-right <?php echo $btnClass?>"><?php echo $btnText?></button>
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