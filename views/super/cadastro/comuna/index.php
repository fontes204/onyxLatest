<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <?php if($att->getParam()!=null){
                        $dadosDoc=$dao->listarPorId('comuna',base64_decode($att->getParam()))->fetchObject();
                        $nomeValue=$dadosDoc->_nome;
                        $btnClass='btn-editar-documento';
                        $btnText='Salvar Alterações';
                        $idDoc= base64_decode($att->getParam());
                        $clsnome_documento='nome_docume';
                        $action=URL."comuna/editar"
                        ?>
                        <p><i class="fa fa-edit"></i> Editar Comuna</p>
                    <?php }else{
                        $nomeValue="";
                        $btnClass='btn-salvar-documento';
                        $btnText='Salvar';
                        $idDoc="";
                        $clsnome_documento='nome_documento';
                        $action=URL."comuna/salvar"
                        ?>
                        <p><i class="fa fa-edit"></i> Adicionar Comuna</p>
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
                    <form data-parsley-validate="true" action="<?php echo $action?>" class="form-add-documento">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group blockNome">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?php echo $nomeValue?>" autofocus placeholder="nome" data-parsley-required="true" class="form-control input-lg <?php echo $clsnome_documento?>" required />
                                    <span class="error-nome"></span>
                                </div>
                            </div>
                            <input type="hidden" name="idDoc" value="<?php echo $idDoc?>">
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