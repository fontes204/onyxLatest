<ul class="nav">
    <li class="nav-header text-center">Menu de Navega&ccedil;&atilde;o</li>
    <li class="has-sub active">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-user"></i>
            <span>Utilizador</span>
        </a>
        <ul class="sub-menu">
            <li class="active"><a href="<?php echo URL?>sysadmin/registarUtilizador"><i class="fa fa-plus"></i> Registar</a></li>
            <li><a href="<?php echo URL?>sysadmin/visualizarUtilizador"><i class="fa fa-eye"></i> Vizualizar</a></li>
        </ul>
    </li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-sign-in"></i>
            <span>Entra Como</span>
        </a>
        <ul class="sub-menu">
            <li><a href="<?php echo URL?>secretariaGeral"><i class="fa fa-user"></i> SGA</a></li>
            <li><a href="<?php echo URL?>chefeGabAdmin"><i class="fa fa-user"></i> CGA</a></li>
            <li><a href="<?php echo URL?>dmguuc"><i class="fa fa-user"></i> DMGUUC</a></li>
            <li><a href="<?php echo URL?>sdmguuc"><i class="fa fa-user"></i> SDMGUUC</a></li>
        </ul>
    </li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <!--                    <i class="fa fa-cogs"></i>-->
            <span><i class="fa fa-cog"></i>Cadastrar</span>
        </a>
        <ul class="sub-menu">
            <li><a href="#adicionar-documento" data-toggle="modal"><i class="fa fa-file"></i> Documento</a></li>
            <li><a href="#adicionar-departamento" data-toggle="modal"><i class="fa fa-users"></i> Departamento</a></li>
            <li><a href="#adicionar-grupo" data-toggle="modal"><i class="fa fa-users"></i> Grupo</a></li>
        </ul>
    </li>
    <li><a href="<?php echo URL?>sysadmin/auditoria"><i class="fa fa-list"></i> Auditoria</a></li>
    <!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>

<?php

//public function Index()
//{
//    if (isset($this->view))
//        $this->view->render(SYS,1);
//}
//
//public function registarUtilizador()
//{
//    if (isset($this->view))
//        $this->view->render(SYS,'utilizador/registar');
//}
//
//public function visualizarUtilizador()
//{
//    if (isset($this->view))
//        $this->view->render(SYS,'utilizador/visualizar');
//}
//
//public function maisInfo()
//{
//    if (isset($this->view))
//        $this->view->render(SYS,'utilizador/perfil');
//}
//
//public function perfil()
//{
//    if (isset($this->view))
//        $this->view->render(SYS,'meu_perfil');
//}
//
//public function auditoria()
//{
//    if (isset($this->view))
//        $this->view->render(SYS,'auditoria');
//}
?>