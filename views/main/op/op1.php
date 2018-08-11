<ul class="nav">
    <li class="nav-header text-center">Menu de Navega&ccedil;&atilde;o</li>
    <li class="has-sub active">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-globe"></i>
            <span>Legalizar Terreno</span>
        </a>
        <ul class="sub-menu">
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-file-archive-o"></i>
                    <span>Criar Processo</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo URL?>secretariaGeral/criarProcessoIndividual">Individual</a></li>
                    <li class=""><a href="<?php echo URL?>secretariaGeral/criarProcessoOrganizacao">Organaização</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-arrow-circle-up"></i>
                    <span>Saida</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo URL?>secretariaGeral/saidaCidadao">Individual</a></li>
                    <li class=""><a href="<?php echo URL?>secretariaGeral/saidaOrganizacao">Organaização</a></li>
                </ul>
            </li>
            <li><a href="<?php echo URL?>secretariaGeral/pendente"><i class="fa fa-lock"></i> Pendentes</a></li>
            <!--<li><a href="<?php /*echo URL*/?>secretariaGeral/todos"><i class="fa fa-file-archive-o"></i> Todos</a></li>-->
        </ul>
    </li>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-inbox"></i>
            <span>Traspasse</span>
        </a>
        <ul class="sub-menu">
            <li class="active"><a href="#"><i class="fa fa-file-archive-o"></i> Criar Processo</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-up"></i> Sa&iacute;das</a></li>
            <li><a href="#"><i class="fa fa-lock"></i> Pendentes</a></li>
            <li><a href="#"><i class="fa fa-file-archive-o"></i> Todos</a></li>
        </ul>
    </li>
    <!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>