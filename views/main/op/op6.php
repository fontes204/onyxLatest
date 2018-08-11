<ul class="nav">
    <li class="nav-header text-center">Menu de Navega&ccedil;&atilde;o</li>
    <li class="has-sub active">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-globe"></i>
            <span>Legalização de Terreno</span>
        </a>
        <ul class="sub-menu">

            <li class="active"><a href="<?php echo URL?>dmguuc/entrada"><i class="fa fa-arrow-circle-down"></i> Entrada</a></li>
            <li><a href="<?php echo URL?>dmguuc/saida"><i class="fa fa-arrow-circle-up"></i> Sa&iacute;da</a></li>
        </ul>
    </li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-exchange"></i>
            <span>Trespasse de Terreno</span>
        </a>
        <ul class="sub-menu">
            <li><a href="#"><i class="fa fa-lock"></i> Entradas</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-up"></i> Sa&iacute;das</a></li>
            <li><a href="#"><i class="fa fa-file-archive-o"></i> Todos</a></li>
        </ul>
    </li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-building"></i>
            <span>Projecto</span>
        </a>
        <ul class="sub-menu">
            <li><a href="<?php echo URL.$att->getController()?>/criarProjecto"><i class="fa fa-edit"></i> Criar</a></li>
            <li><a href="#"><i class="fa fa-eye"></i> Visualizar</a></li>
            <li><a href="#"><i class="fa fa-line-chart"></i> Estátistica</a></li>
        </ul>
    </li>
    <!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>