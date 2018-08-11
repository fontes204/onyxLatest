<?php
$dao=new Database();
$prov=$dao->listarTodos('provincia')->fetchAll(2);
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-arrow-circle-down"></i></div>
                <div class="stats-info">
                    <h4>Entradas</h4>
                    <p>3</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-arrow-circle-up"></i></div>
                <div class="stats-info">
                    <h4>Saídas</h4>
                    <p>20</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-lock"></i></div>
                <div class="stats-info">
                    <h4>Pendentes</h4>
                    <p>00</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-file-archive-o"></i></div>
                <div class="stats-info">
                    <h4>Todos Processos</h4>
                    <p>23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row palco">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-globe"></i> Cadastrar Zona</h4>
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
                                        <div class="col-md-2">
                                            <div class="form-group block1">
                                                <label>Província</label>
                                                <select class="default-select2 form-control select-prov" name="_id_provincia">
                                                    <option>Selecione uma província</option>
                                                    <?php foreach ($prov as  $res):?>
                                                        <option value="<?php echo $res['_id'];?>"><?php echo $res['_nome']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Município</label>
                                                <select class="default-select2 form-control select-municipio" name="_id_municipio" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Comuna</label>
                                                <select class="default-select2 form-control select-comuna" name="_id_comuna" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block2">
                                                <label>Bairro</label>
                                                <select class="default-select2 form-control select-bairro" name="_id_bairro" required></select>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-3">
                                            <div class="form-group block2">
                                                <label>Nome da Zona</label>
                                                <input class="default-select2 form-control" name="nomeZona" type="text" required>
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