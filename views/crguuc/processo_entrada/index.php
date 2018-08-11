<?php
$procDao=new ProcessoDao();
$att=new Atributo();
$rs=$procDao->listarEntradaAdmin(Session::get('id_user'));
$cont=0;
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
    <div class="row">
        <!-- begin col-10 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Caixa de Entrada</h4>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nº Processo</th>
                            <th>Assunto</th>
                            <th>Requerente</th>
                            <th>Data</th>
                            <th>Visualizar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rs as $ls):
                            $cont+=1;
                            $num=$procDao->listarEntradaTEC(Session::get('id_user'),2,$ls->_id)->rowCount();
                            ?>
                        <tr class="odd gradeX">
                            <td><?php echo $cont;?></td>
                            <td><?php echo $ls->_num_processoGeral?></td>
                            <td><?php echo $ls->_assunto?></td>
                            <td><?php echo $ls->_nome?></td>
                            <td><?php echo $att->DataAo($ls->_data)?></td>
                            <td class="text-center">
                                <p>
                                    <a href="<?php echo URL?>crguuc/processo/<?php echo base64_encode($ls->_id)?>" class="btn btn-primary btn-icon btn-sm"><i class="fa fa-eye"></i></a>
                                    <?php if($num>0){?>
                                    <a href="<?php echo URL?>crguuc/processoTec/<?php echo base64_encode($ls->_id)?>" class="btn btn-info btn-icon btn-sm"><i class="fa fa-eye"></i></a>
                                    <?php }?>
                                </p>
                            </td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->