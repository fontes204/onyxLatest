<?php
$prov=$dao->listarTodos('comuna')->fetchAll(2);
$utilizador=$dao->listarTodos('utilizador',"order by _nome asc")->fetchAll(2);
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-building"></i> Criar Projecto</p>
                    <h4>&nbsp;</h4>
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
                    <h4>&nbsp;</h4>
                </div>
                <div class="panel-body">
                    <form action="<?php echo URL?>zona/salvar" method="POST" class="frm-salvar-zona" name="">
                        <div id="">
                            <!-- begin wizard step-4 -->
                            <div class="">
                                <fieldset>
                                    <!-- begin row -->
                                    <legend></legend>
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nome do Projecto</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Coordenador</label>
                                                <select class="default-select2 form-control" name="" required>
                                                    <?php foreach ($utilizador as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block1">
                                                <label>Município</label>
                                                <select class="default-select2 form-control select-prov" name="_id_provincia">
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
                                                <label>Comuna/ Destrito</label>
                                                <select class="default-select2 form-control select-prov" name="_id_provincia">
                                                    <?php foreach ($prov as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->

                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-4 -->
                        </div>
                    </form>
                    <div class="panel-footer">
                        <a href="javascript:window.history.go(-1)" title="Voltar" class="btn btn-default">Voltar</a>
                        <div class="pull-right">
                            <button class="btn btn-primary add-zona">Salvar</button>
                        </div>
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