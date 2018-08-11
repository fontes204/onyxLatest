<?php
$param=new Atributo();
$moradaDao=new MoradaDao();
$idUtilizador=base64_decode($param->getParam());
$dados=$dao->listarPorId('utilizador',$idUtilizador)->fetchObject();
$cargo=$dao->listarPorId('grupo',$dados->_id_grupo)->fetchObject();
$dadosM=$dao->listarPorId('morada',$dados->_morada)->fetchObject();
$ctrlConta=$dao->listarPorId('conta',$idUtilizador);
$morada=$moradaDao->retornaMorada($dadosM->_id_provincia,$dadosM->_id_municipio,$dadosM->_id_comuna,$dadosM->_id_bairro,$dadosM->_id_rua);

?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <p class="text-capitalize"><i class="fa fa-user"></i> <?php echo $dados->_nome?></p>
                    <h4>&nbsp;</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-10 -->
        <div class="col-md-9">
            <!-- begin panel -->
            <div class="profile-container">
                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image" style="border: none">
                            <img class="img-thumbnail txt-ij" style="width: inherit;height: inherit"
                                 src="<?php echo URL ?>resources/img_perfil/<?php echo $dados->_foto?>"/>
                            <i class="fa fa-user hide"></i>
                        </div>
                        <!-- end profile-image -->
                        <div class="hidden-sm hidden-xs" style="width: 175px">
                            <p class="text-centers"><b>Cargo:</b> <?php echo $cargo->_perfil?></p>
                            <p>
                                <a href="" data-toggle="modal"
                                   class="btn btn-sm btn-default btn-block btn-ativar-btn-foto" style="text-align: left"><i
                                        class="fa fa-edit"></i> Alterar Dados</a>
                                <?php if($ctrlConta->rowCount()==0){?>
                                <a href="<?php echo URL.$param->getController()?>/addConta/<?php echo $param->getParam()?>"
                                   class="btn btn-sm btn-primary btn-block" style="text-align: left"><i
                                        class="fa fa-edit"></i> Adicionar Conta</a>
                                <?php }else{?>
                                <?php if($ctrlConta->fetchObject()->_estado==0){?>
                                    <p class="group-btn-activar" idUser="<?php echo $idUtilizador?>">
                                    <a href="javascript:;"
                                       class="btn btn-sm btn-success btn-block btn-activar-conta" idUser="<?php echo $idUtilizador?>" style="text-align: left"><i
                                            class="fa fa-check"></i> Activar Conta</a>
                                    </p>
                                <?php }else{?>
                            <p class="group-btn-desactivar" idUser="<?php echo $idUtilizador?>">
                                <a href="#modal-confirm-desctivar-conta" data-toggle="modal" idUser="<?php echo $idUtilizador?>"
                                   class="btn btn-sm btn-danger btn-block btn-desactivar-conta" style="text-align: left"><i
                                        class="fa fa-lock"></i> Desactivar Conta</a>
                                <?php }}
                                ?>
                            </p>
                            </p>
                        </div>
                        <!-- end profile-highlight -->
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsivse" style="border-left: 1px">
                                <h6 class="text-primary"><i class="fa fa-list-alt"></i> Dados Pessoais</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Apelido</th>
                                        <th>Gênero</th>
                                        <th>Data de Nascimento</th>
                                        <th>N&ordm; do Bilhete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-capitalize"><?php echo $dados->_apelido?></td>
                                        <td class="text-capitalize"><?php echo $dados->_genero?></td>
                                        <td class="text-capitalize"><?php echo $param->DataAo($dados->_data_nascimento)?></td>
                                        <td class="text-capitalize"><?php echo $dados->_num_bi?></td>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="" style="margin-top: -7%">
                                    <h6 class="text-primary">
                                        <i class="fa fa-home"></i> Morada
                                    </h6>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Municipio</th>
                                            <th>Comuna</th>
                                            <th>Bairro</th>
                                            <th>Rua</th>
                                            <th>Grau Acadêmico</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php for ($i=1;$i<count($morada);$i++):?>
                                                <td><?php echo $morada[$i]?></td>
                                            <?php endfor;?>
                                            <td><?php echo $dados->_nivel_escolar?></td>
                                        </tr>
                                        <hr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!--                <span>&nbsp;</span>-->
                    <div class="panel-footer">
                        <p>
                            <a href="<?php echo URL?>super/listarUtilizador" class="btn btn-inverse" style=" text-align: right">← Voltar</a>
                        </p>
                        <div class="pull-right f-s-14">
                            <div class="hidden progress progress-striped progress-sm active m-t-5">
                                <div class="progress-bar progress-bar-success" style="width: 25%">25%</div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile-right -->
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