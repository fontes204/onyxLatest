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
                    $depa1=$dao->listarTodos('provincia')->fetchAll();
                    if($att->getParam()!=null){
                        $dadosDoc=$dao->listarPorId('grupo',base64_decode($att->getParam()))->fetchObject();
                        $depa=$dao->listarPorId('departamento',$dadosDoc->_id_departamento)->fetchObject();
                        $nomeValue=$dadosDoc->_perfil;
                        $descValue=$depa->_perfil;
                        $idDepa=$depa->_id;
                        $btnClass='btn-editar-reparticao';
                        $btnText='Salvar Alterações';
                        $idGrupo= base64_decode($att->getParam());
                        $clsnome_grupo='nome_grupo';
                        $action=URL."reparticao/editarGrupo"
                        ?>
                        <p><i class="fa fa-edit"></i> Editar Repartição</p>
                    <?php }else{
                        $nomeValue="";
                        $descValue="Selecione a Província";
                        $idDepa="";
                        $btnClass='btn-salvar-reparticao';
                        $btnText='Salvar';
                        $idGrupo="";
                        $clsnome_grupo='nome_grupoD';
                        $action=URL."reparticao/salvar"
                        ?>
                        <p><i class="fa fa-edit"></i> Adicionar Repartição</p>
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
                    <form data-parsley-validate="true" method="POST" action="<?php echo $action?>" class="form-add-reparticao">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group block1">
                                    <label>Província</label>
                                    <select class="combobox select-provincia-admin" name="id_provincia">
                                        <option value="<?php echo $idDepa?>"><?php echo $descValue?></option>
                                        <?php foreach ($depa1 as $rs):?>
                                            <option value="<?php echo $rs->_id?>"><?php echo $rs->_nome?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="error-desc"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group blockNome">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?php echo $nomeValue?>" placeholder="nome" readonly data-parsley-required="true" class="form-control <?php echo $clsnome_grupo?> nomeAdmin" required />
                                    <span class="error-nome"></span>
                                </div>
                            </div>
                            <input type="hidden" name="idGrupo" value="<?php echo $idGrupo?>">
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