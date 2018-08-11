<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-list"></i> Listar Administração</p>
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
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Província</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        <?php
                            $ks=$dao->listarTodos('reparticao','order by _nome asc')->fetchAll(2);
                        foreach ($ks as $x):
                            $cont+=1;
                            $param=array(0,$x['_id']);
                            $field=array('*');
                            $count=$dao->buscaExaustiva($field,'reparticao','_estado=? and _id=?',$param)->rowCount();
//                            $loc=$dao->listarPorId('localizacao_municipio',$x['_id_localizacao'])->fetchObject();
                            $prov=$dao->listarPorId('provincia',$ks['_id_provincia'])->fetchObject();
                            //$muni=$dao->listarPorId('municipio',$loc->_id_municipio)->fetchObject();
                            //$concat=$prov->_nome.' - '.$muni->_nome;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $cont;?></td>
                                <td><?php echo $x['_nome'];?></td>
                                <td><?php echo $prov['_nome']?></td>
                                <td class="text-center">
                                    <p>
                                        <a title="Eliminar" href="#modal-confirm-eliminar" data-toggle="modal" idReparticao="<?php echo $x['_id']?>" class="btn-eliminar-depa btn-danger btn-icon btn-sm"><i class="fa fa-trash"></i></a>
                                        <a title="Editar" href="<?php echo URL.$att->getController()?>/editar/<?php echo base64_encode($x['_id'])?>" class="btn-primary btn-icon btn-sm"><i class="fa fa-edit"></i></a>
                                        <?php if($count==1){?>
                                            <a title="Adicionar Administrador" href="<?php echo URL.$att->getController()?>/adicionarUtilizador/<?php echo base64_encode($x['_id'])?>" class="btn-success btn-icon btn-sm"><i class="fa fa-user"></i></a>
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