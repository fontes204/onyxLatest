<?php
$param=new Atributo();
$idUtilizador=base64_decode($param->getParam());
$dados=$dao->listarPorId('utilizador',$idUtilizador)->fetchObject();
$cargo=$dao->listarPorId('grupo',$dados->_id_grupo)->fetchObject();
$dadosM=$dao->listarPorId('morada',$dados->_morada)->fetchObject();
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-key"></i></div>
                <div class="stats-info">
                    <p><i class="fa fa-edit"></i> Adicionar Conta</p>
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
                                <a href="<?php echo URL.$param->getController()?>/addConta/<?php echo $param->getParam()?>"
                                   class="btn btn-sm btn-primary btn-block" style="text-align: left"><i
                                        class="fa fa-edit"></i> Adicionar Conta</a>
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
                                <form action="<?php echo URL?>conta/add" method="post" class="frm-add-conta">
                                    <fieldset>
                                        <legend>&nbsp;</legend>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Utilizador</label>
                                            <input type="text" class="form-control input-lg" id="exampleInputPassword1" name="username" placeholder="Utilizador" value="<?php echo strtolower($param->username($dados->_nome,$dados->_apelido))?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Senha Nova</label>
                                            <div class="">
                                                <input type="password" name="senha" autofocus id="password-indicator-default" placeholder="insira a senha" class="form-control input-lg m-b-5 senhaP" />
                                                <div id="passwordStrengthDiv" class="is0 m-t-5"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Repita a Senha</label>
                                            <input type="password" class="form-control repSenha input-lg" id="exampleInputPassword1" name="repSenha" placeholder="repita a senha" value="" />
                                            <div class="alert-senha-verify"></div>
                                        </div>
                                        <input type="hidden" name="id_utilizador" value="<?php echo $idUtilizador?>">
                                        <input type="hidden" name="telefone" value="<?php echo $dados->_telefone?>">
                                    </fieldset>
                                </form>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                        <div class="panel-footer">
                            <div class="pull-right f-s-14">
                                <button type="button" class="btn btn-sm btn-primary m-r-5 btn-add-conta"><i class="fa fa-save"></i> Salvar Alteração</button>
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