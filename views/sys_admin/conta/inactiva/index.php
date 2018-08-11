<?php
$user=new Utilizador();
$field=array('u.*');
$param=array(0);
$k=$dao->buscaExaustiva($field,'utilizador u,conta c','u._id=c._id_utilizador and c._estado=?',$param);
$i=0;
?>

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-list"></i> Listar Conta Inactiva</p>
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
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>Gênero</th>
                            <th>Telefone</th>
                            <th>Morada</th>
                            <th>Grupo</th>
                            <th>Estado</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($k as $rs):

                            $i=$i+1;
                            $data=$user->DataAo($rs->_data_nascimento);
                            $morada=$rs->_morada!=null?$rs->_morada:'por definir';
                            $genero=$rs->_genero!=null?$rs->_genero:'por definir';

                            $funcao=$dao->listarPorId('grupo',$rs->_id_grupo)->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($funcao as $funcaors)
                            {
                                $nomeFunc=$funcaors['_perfil'];
                            }

                            $morad=$dao->listarPorId('morada',$rs->_morada)->fetchObject();
                            $muni=$dao->listarPorId('municipio',$morad->_id_municipio)->fetchObject();
                            $bairro=$dao->listarPorId('bairro',$morad->_id_bairro)->fetchObject();
                            $morada=$muni->_nome.' - '.$bairro->_nome;

                            if($dao->listarPorId('conta',$rs->_id)->rowCount()==0)
                            {
                                $estado="Conta por criar";
                                $class = "text-success";
                            }else {
                                $conta = $dao->listarPorId('conta', $rs->_id)->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($conta as $contars) {
                                    $estado = $contars['_estado'] != 0 ? 'activa' : 'inactiva';
                                    if ($estado == 'inactiva')
                                        $class = "text-danger";
                                    else
                                        $class = "text-info";
                                }
                            }

                            ?>
                            <tr class="odd gradeX text-center">
                                <td><?php echo $i?></td>
                                <td class="text-capitalize"><?php echo $rs->_nome?></td>
                                <td><?php echo $data?></td>
                                <td><?php echo strtoupper($genero)?></td>
                                <td><?php echo $rs->_telefone?></td>
                                <td><?php echo $morada?></td>
                                <td><?php echo $nomeFunc?></td>
                                <td class="<?php echo $class?>"><?php echo $estado?></td>
                                <td class="text-center">
                                    <p>
                                        <a title="Eliminar" class="btn btn-danger btn-icon btn-sm"><i class="fa fa-trash"></i></a>
                                        <a href="<?php echo URL.$att->getController()?>/visualizarUtilizador/<?php echo base64_encode($rs->_id);?>" title="Ver mais" class="btn btn-primary btn-icon btn-sm"><i class="fa fa-eye"></i></a>
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