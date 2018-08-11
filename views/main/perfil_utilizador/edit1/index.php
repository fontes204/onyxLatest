<?php
$param=new Atributo();
$idUtilizador=base64_decode($param->getParam());
//$dadosC=$dao->listarPorId('utilizador',2)->fetchObject();
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
                                        class="fa fa-edit"></i> Alterar Credenciais</a>
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
                                <form action="<?php echo URL?>conta/alterarCredenciais1" method="post" class="frm-editar-credenciais">
                                    <fieldset>
                                        <legend>&nbsp;</legend>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Utilizador</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="user" placeholder="Utilizador" value="<?php echo $dadosC->_utilizador;?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Senha Nova</label>
                                            <div class="">
                                                <input type="password" name="senha" autofocus id="password-indicator-default" placeholder="Insira a nova Senha" class="form-control m-b-5 senhaP" />
                                                <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Repita a Senha</label>
                                            <input type="password" class="form-control repSenha" id="exampleInputPassword1" name="repSenha" placeholder="Repita a Senha" value="" />
                                        </div>
                                        <input type="hidden" name="id_utilizador" value="<?php echo $idUtilizador?>">
                                        <div class="alert-senha-verify"></div>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                        <div class="panel-footer">
                            <div class="pull-right f-s-14">
                                <button type="button" class="btn btn-sm btn-primary m-r-5 btn-salvar-alteracao"><i class="fa fa-save"></i> Salvar Alteração</button>
                            </div>
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