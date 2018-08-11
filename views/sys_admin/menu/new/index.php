<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-12 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-info-circle"></i></div>
                <div class="stats-info">
                    <?php
                    $cont=0;
                    $depa1=$dao->listarTodos('departamento')->fetchAll();
                    $grupo=$dao->listarTodos('grupo')->fetchAll();
                    if($att->getParam()!=null){
                        $dadosDoc=$dao->listarPorId('grupo',base64_decode($att->getParam()))->fetchObject();
                        $depa=$dao->listarPorId('departamento',$dadosDoc->_id_departamento)->fetchObject();
                        $nomeValue=$dadosDoc->_perfil;
                        $descValue=$depa->_perfil;
                        $idDepa=$depa->_id;
                        $btnClass='btn-editar-menu';
                        $btnText='Salvar Alterações';
                        $idGrupo= base64_decode($att->getParam());
                        $clsnome_grupo='nome_grupo';
                        $action=URL."grupo/editarGrupo"
                        ?>
                        <p><i class="fa fa-edit"></i> Editar Menu</p>
                    <?php }else{
                        $nomeValue="";
                        $descValue="Selecione o Departamento";
                        $idDepa="";
                        $btnClass='btn-criar-menu';
                        $btnText='Salvar';
                        $idGrupo="";
                        $clsnome_grupo='nome_grupoD';
                        $action=URL."grupo/salvar"
                        ?>
                        <p><i class="fa fa-edit"></i> Adicionar Menu</p>
                    <?php }?>
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
                    <form data-parsley-validate="true" method="POST" action="<?php echo $action?>" class="form-add-grupo">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group blockNome">
                                    <label>Descrição</label>
                                    <input type="text" name="perfil" value="<?php echo $nomeValue?>" autofocus placeholder="nome" data-parsley-required="true" class="form-control <?php echo $clsnome_grupo?> input-lg" required />
                                    <span class="error-desc"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group block1">
                                    <div class="email-content">
                                        <table class="table table-email tabela-menu">
                                            <thead>
                                            <tr>
                                                <th class="email-select">#</th>
                                                <th class="email-select" colspan="2">Função</th>
                                                <th class="email-select">Privilégio</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($grupo as $item):
                                                $cont+=1;
                                                ?>
                                            <tr>
                                                <td><?php echo $cont?></td>
                                                <td class="email-date" colspan="2"><b><input type="hidden" class="vet-id_grupo" value=""><?php echo $item->_perfil.' - '.$item->_sigla?></b></td>
                                                <td class="email-subject linha-<?php echo $item->_id?>">
                                                    <span class="f-s-11 text-inverse">R</span><input cod="<?php echo $item->_id?>" class="vet-ler" name="ler[]" valor="r" type="checkbox" value="r">
                                                    <span class="f-s-11 text-info">W</span><input cod="<?php echo $item->_id?>" class="vet-escrever" name="escrever[]" valor="w" type="checkbox" value="w">
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="idGrupo" value="<?php echo $idGrupo?>">
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-primary pull-right <?php echo $btnClass?>"><?php echo $btnText?></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
        <div class="col-md-3">
            <div class="panel panel-primary" data-sortable-id="index-9">
                <div class="panel-heading">
                    <h4 class="panel-title text-center">Todos Menus</h4>
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