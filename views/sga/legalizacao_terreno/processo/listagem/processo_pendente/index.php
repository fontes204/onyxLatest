<?php
$procDao=new Database();
$att=new Atributo();
$campo=array('distinct r._id as cod, r._nome, p._assunto, p._num_processoGeral, es._data');
$tabela='requerente r, processo p, documento_processo dp, entradasaida es';
$condicao='p._id_requerente=r._id and (p._id=dp._id_processo) and p._id=es._id_processo and es._descOrg=\'pendente\' and es._descDest=\'pendente\'';
$valor=array(null);
$rs=$procDao->buscaExaustiva($campo,$tabela,$condicao,$valor)->fetchAll();
$cont=0;
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-lock"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-folder"></i> Processos Pendentes</p>
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
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Processo N&ordm;</th>
                            <th>Nome do Utente</th>
                            <th>Assuto</th>
                            <th>Data de Entrada</th>
                            <th>Op&ccedil;&otilde;es</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rs as $ls):?>
                            <?php $cont+=1;?>
                            <tr class="odd gradeX text-center">
                                <td><?php echo $cont?></td>
                                <td><?php echo $ls->_num_processoGeral?></td>
                                <td><?php echo stripslashes($ls->_nome)?></td>
                                <td><?php echo $ls->_assunto?></td>
                                <td><?php echo $att->DataAo($ls->_data)?></td>
                                <td class="text-center">
                                    <p>
                                        <a title="Continuar" href="<?php echo URL?>secretariaGeral/continuar/<?php echo base64_encode($ls->cod)?>" class="btn btn-primary btn-icon btn-circle btn-sm"><i class="fa fa-play"></i></a>
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