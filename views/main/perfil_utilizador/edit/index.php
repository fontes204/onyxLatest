<?php
$param=new Atributo();
$dao=new UtilizadorDao();
$moradaDao=new MoradaDao();
$idUtilizador=base64_decode($param->getParam());
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
                    <p><i class="fa fa-edit"></i> Alterar Credenciais</p>
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
                                <form action="<?php echo URL?>authentication/verificarSenha" method="post" class="frm-verifcar-senha">
                                    <fieldset>
                                        <legend>&nbsp;</legend>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Senha Actual</label>
                                            <input type="password" class="form-control senha-req" autofocus name="senha" id="exampleInputEmail1" placeholder="Insira a senha actual" />
                                            <input type="hidden" class="id_usuario" name="id_usuario" value="<?php echo $idUtilizador?>">
                                            <input type="hidden" class="id_usuario1" name="user" value="<?php echo $dadosC->_utilizador?>">
                                        </div>
                                        <div class="alert-error-verify"></div>
                                    </fieldset>

                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                        <div class="panel-footer">
                            <div class="pull-right f-s-14">
                            	<button type="submit" class="btn btn-sm btn-primary btn-verificar-senha">OK</button>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>
                    <!--                <span>&nbsp;</span>-->
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