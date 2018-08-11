<ul class="nav">
    <li class="nav-header text-center">Menu de Navega&ccedil;&atilde;o</li>
    <li><a href="<?php echo URL.$att->getController()?>/auditoria"><i class="fa fa-list"></i> Auditoria</a></li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <!--                    <i class="fa fa-cogs"></i>-->
            <span><i class="fa fa-edit"></i>Cadastrar</span>
        </a>
        <ul class="sub-menu">
            <li><a href="<?php echo URL.$att->getController()?>/addAdministracao"><i class="fa fa-home"></i> Administração</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/addProvincia"><i class="fa fa-location-arrow"></i> Província</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/adcionarDocumento" data-toggle="modal"><i class="fa fa-file"></i> Documento</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/adcionarDepartamento" data-toggle="modal"><i class="fa fa-users"></i> Departamento</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/adcionarGrupo" data-toggle="modal"><i class="fa fa-users"></i> Grupo</a></li>
        </ul>
    </li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <!--                    <i class="fa fa-cogs"></i>-->
            <span><i class="fa fa-eye"></i>Listar</span>
        </a>
        <ul class="sub-menu">
            <li><a href="<?php echo URL.$att->getController()?>/listarAdministracao" data-toggle="modal"><i class="fa fa-home"></i> Administração</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/listarDocumento" data-toggle="modal"><i class="fa fa-file"></i> Documento</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/listarDepartamento" data-toggle="modal"><i class="fa fa-folder"></i> Departamento</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/listarGrupo" data-toggle="modal"><i class="fa fa-users"></i> Grupo</a></li>
            <li><a href="<?php echo URL.$att->getController()?>/listarUtilizador" data-toggle="modal"><i class="fa fa-user"></i> Utilizador</a></li>
        </ul>
    </li>
    <!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>