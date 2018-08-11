<?php
$att=new Atributo();
$campo=array('distinct r._nome, p._assunto, p._num_processoGeral, es._data, o._tipo_organizacao as tipo, p._id as cod, o._id as idK');
$tabela='requerente r, processo p, documento_processo dp, entradasaida es, organizacao o';

$condicao='p._id_requerente=r._id and dp._id_documento in(1,3) and p._id=dp._id_processo and p._id=es._id_processo and es._descOrg=\'saida\' and o._id_requerente=r._id';
$valor=array(null);
$rs=$dao->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchAll();
$cont=0;

?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-arrow-up"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-folder"></i> Saída de Processo</p>
                    <h4>&nbsp;</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-10 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">&nbsp;</h4>
<!--                    <h4 class="panel-title">Caixa de Saída de Organizações</h4>-->
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Processo N&ordm;</th>
                            <th>Organização</th>
                            <th>Proprietário</th>
                            <th>Assuto</th>
                            <th>Tipo</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Estado Documental</th>
                            <th>Opção</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rs as $ls):
                            $field=array('*');
                            $value=array($ls->idK);
                            $dadosPro=$dao->buscaExaustiva($field,'proprietario_org','_id_organizacao=?',$value)->fetchObject();

                            $tab='documento_processo dp';
                            $field=array('*');
                            $cnd='dp._id_processo=?';
                            $value=array($ls->cod);
                            $k=$dao->buscaExaustiva($field,$tab,$cnd,$value)->rowCount();
                            if($k==7)
                            {
                                $fa='fa-check';
                                $btn='btn-success';
                                $href='javascript:;';
                                $title='';
                            }else
                            {
                                $fa='fa-warning';
                                $btn='btn-warning';
                                $href=URL.'secretariaGeral/continuar/'.base64_encode($ls->cod);
                                $title='Adicionar documento';
                            }
                            $cont+=1;
                            ?>

                        <tr class="odd gradeX text-center">
                            <td><?php echo $cont?></td>
                            <td><?php echo $ls->_num_processoGeral?></td>
                            <td><?php echo stripslashes($ls->_nome)?></td>
                            <td><?php echo stripslashes($dadosPro->_nome)?></td>
                            <td><?php echo $ls->_assunto?></td>
                            <td><?php echo $ls->tipo?></td>
                            <td><?php echo $att->DataAo($ls->_data)?></td>
                            <td><?php echo $att->DataAo($ls->_data)?></td>
                            <td class="text-center">
                                <p>
                                    <a title="<?php echo $title?>" href="<?php echo $href?>" class="btn <?php echo $btn?>  btn-icon btn-sm"><i class="fa <?php echo $fa?>"></i></a>
                                </p>
                            </td>
                            <td class="text-center">
                                <p>
                                    <a title="Editar" href="<?php echo URL?>secretariaGeral/edit/<?php echo base64_encode($ls->cod)?>" class="btn-primary btn-icon btn-sm"><i class="fa fa-edit"></i></a>
                                    <a title="Ver mais" href="<?php echo URL?>secretariaGeral/processo/<?php echo base64_encode($ls->cod)?>" class="btn-info btn-icon btn-sm"><i class="fa fa-eye"></i></a>
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