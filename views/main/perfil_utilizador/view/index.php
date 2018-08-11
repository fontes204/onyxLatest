<?php
    $param=new Atributo();
    $dao=new UtilizadorDao();
    $moradaDao=new MoradaDao();
    $idUtilizador=base64_decode($param->getParam());
    $dados=$dao->listarPorId('utilizador',$idUtilizador)->fetchObject();
    $dadosM=$dao->listarPorId('morada',$dados->_morada)->fetchObject();

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
                    <p><i class="fa fa-user"></i> Meus Dados</p>
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
                                 src="<?php echo URL ?>resources/img_perfil/<?php echo $ft->_foto?>"/>
                            <i class="fa fa-user hide"></i>
                        </div>
                        <!-- end profile-image -->
                        <div class="hidden-sm hidden-xs" style="width: 175px">
                            <p>
                                <a href="#modal-captura-imagem-perfil" data-toggle="modal"
                                   class="btn btn-sm btn-default btn-block btn-ativar-btn-foto" style="text-align: left"><i
                                            class="fa fa-camera"></i> Alterar Fotografia</a>
                                <a href="<?php echo URL.$param->getController() ?>/alterarCredenciais/<?php echo base64_encode(Session::get('id_user'))?>"
                                   class="btn btn-sm btn-primary btn-block" style="text-align: left"><i
                                            class="fa fa-edit"></i> Alterar Credênciais</a>
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
                                        <th>Nome</th>
                                        <th>Gênero</th>
                                        <th>Data de Nascimento</th>
                                        <th>N&ordm; do Bilhete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-capitalize"><?php echo $dados->_nome?></td>
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
                                    <h6 class="text-primary"><i class="fa fa-home"></i> Morada <span
                                                class="f-s-9 text-inverse">&</span> <i class="fa fa-graduation-cap"></i> Grau Acadêmico
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