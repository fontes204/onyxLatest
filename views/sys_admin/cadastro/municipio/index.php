<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <?php
                    $prov1=$dao->listarTodos('provincia')->fetchAll();
                    if($att->getParam()!=null){
                        $dadosMuni=$dao->listarPorId('municipio',base64_decode($att->getParam()))->fetchObject();
                        $prov=$dao->listarPorId('provincia',$dadosMuni->_id_provincia)->fetchObject();
                        $nomeValue=$dadosMuni->_nome;
                        $descValue=$prov->_nome;
                        $idMuni=$prov->_id;
                        $btnClass='btn-editar-municipio';
                        $btnText='Salvar Alterações';
                        $idMunicipio= base64_decode($att->getParam());
                        $clsnome_grupo='nome_grupo';
                        $action=URL."municipio/editar"
                        ?>
                        <p><i class="fa fa-edit"></i> Editar Município</p>
                    <?php }else{
                        $nomeValue="";
                        $descValue="Selecione a Província";
                        $idMuni="";
                        $btnClass='btn-salvar-municipio';
                        $btnText='Salvar';
                        $idMunicipio="";
                        $clsnome_grupo='nome_grupoD';
                        $action=URL."municipio/salvar"
                        ?>
                        <p><i class="fa fa-edit"></i> Adicionar Município</p>
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
                    <form data-parsley-validate="true" method="POST" action="<?php echo $action?>" class="form-add-municipio">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group blockNome">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?php echo $nomeValue?>" autofocus placeholder="nome" data-parsley-required="true" class="form-control <?php echo $clsnome_grupo?>" required />
                                    <span class="error-nome"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group block1">
                                    <label>Província</label>
                                    <select class="combobox" name="id_provincia">
                                        <option value="<?php echo $idMuni?>"><?php echo $descValue?></option>
                                        <?php foreach ($prov1 as $rs):?>
                                            <option value="<?php echo $rs->_id?>"><?php echo $rs->_nome?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="error-desc"></span>
                                </div>
                            </div>
                            <input type="hidden" name="idMunicipio" value="<?php echo $idMunicipio?>">
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