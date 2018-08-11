<?php
$procDao=new ProcessoDao();
$att=new Atributo();
$entradaSaida=new EntradaSaidaDao();
$rs=$procDao->listarEntrada(Session::get('id_user'));
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
            <div class="widget widget-stats bg-orange">
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
                    <div class="btn-group pull-right">
                        <a href="<?php echo URL?>chefeGabAdmin/entrada"
                           class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-down"></i> Secretaria <span class="badge badge-danger numEntSec"></span></a>&nbsp;
                        <a href="<?php echo URL?>chefeGabAdmin/entrada_admin" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-down"></i> Administrador <span class="badge badge-danger numEntAdmin"></span></a>
                    </div>
                    <h4 class="panel-title">Caixa de entrada de processos vindo da Secretaria</h4>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nº Processo</th>
                            <th>Assunto</th>
                            <th>Requerente</th>
                            <th>Data de Entrada</th>
                            <th>Data de Saída</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rs as $ls):
                            $cont+=1;
                            $campo=array('*');
                            $valor=array($ls->_id);
                            $k=$procDao->buscaExaustiva($campo,'entradasaida','_id_processo=?',$valor)->rowCount();
                            if($k>=2)
                            {
                                $fa='fa-check';
                                $btn='btn-success';
                                $href='javascript:;';
                                $title='O processo já foi enviado';
                            }else{
                                $fa='fa-send';
                                $btn='btn-primary';
                                $href=URL.'processo/movimento';
                                $title='Enviar ao Administrador';
                            }
                            ?>
                        <tr class="odd gradeX">
                            <td><?php echo $cont;?></td>
                            <td><?php echo $ls->_num_processoGeral?></td>
                            <td><?php echo $ls->_assunto?></td>
                            <td><?php echo stripslashes($ls->_nome)?></td>
                            <td><?php echo $att->DataAo($ls->_data)?></td>
                            <td><?php echo $att->DataAo($ls->_data)?></td>
                            <td class="text-center">
                                <button href="<?php echo $href?>" id_proc="<?php echo $ls->_id?>" class="btn <?php echo $btn?> btn-icon btn-sm btn-enviar-admin" title="<?php echo $title?>"><i class="fa <?php echo $fa?>"></i></button>
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