<?php
$procDao=new ProcessoDao();
$prc=new ParecerDao();
$att=new Atributo();
$rs=$procDao->listarEntrada(Session::get('id_user'));
$cont=0;


function prioridade($id_prioridade){
    switch ($id_prioridade) {
         case '1':
             return 'default';
             break;
         case '2':
             return 'success';
             break;
         case '3':
             return 'warning';
             break;
         case '4':
             return 'danger';
             break;
         default:
             return 'default';
             break;
     } 
}
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
                            <th>Origem</th>
                            <th>Assunto</th>
                            <th>Requerente</th>
                            <th>Data</th>
                            <th>Ver</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rs as $ls):
                            $cont+=1;
                            $href=URL.'administrador/processo/'. base64_encode($ls->_id);
                            $fase=$prc->buscarfase($ls->_id);
                            $title='Ver mais informa&ccedil;&otilde;es';
                                if($fase==-1)
                                {
                                    $fa='fa-eye';
                                    $title='Ver mais informa&ccedil;&otilde;es';
                                    $btn='btn-primary';
                                }elseif($fase[0]['_id_fase']=='1')
                                {
                                    $fa='fa-check';
                                    $title='Aprovar ou reprovar';
                                    $btn='btn-primary';
                                }elseif($fase[0]['_id_fase']=='2')
                                {
                                    $fa='fa-suitcase';
                                    $title='Finalizar processo';
                                    $btn='btn-primary';
                                }
                            ?>


                            <tr class="<?php echo $procDao->prioridade($ls->_id_prioridade);?> odd gradeX">
                                <td><?php echo $cont;?></td>
                                <td><?php echo $ls->_num_processoGeral?></td>
                                <td>CGA</td>
                                <td><?php echo $ls->_assunto?></td>
                                <td><?php echo stripslashes($ls->_nome)?></td>
                                <td><?php echo $att->DataAo($ls->_data)?></td>
                                <td class="text-center">
                                    <p>
                                        <a href="<?php echo $href?>" class="btn <?php echo $btn?> btn-icon btn-sm btn-mais-info" title="<?php echo $title?>"><i class="fa <?php echo $fa?>" data-toggle="modal"></i></a>
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
<!-- #modal-dialog -->
<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Legalização de Terreno - <span class="nome-tente"></span></h4>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group block1">
                        <label>Selecione a Área</label>
                        <select class="default-select2 form-control" style="width: 100%">
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                        </select>
                    </div>
                    <div class="form-group block1">
                        <label>Parecer do Adiministrador</label>
                        <textarea class="form-control" rows="2" placeholder="Escreva aqui o parecer" id="texto-texto" style="resize: none"></textarea>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary">Enviar</a>
            </div>
        </div>
    </div>
</div>