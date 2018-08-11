<?php
    $userDao= new UtilizadorDao();
    $user=new Utilizador();
    $hlp=new Helper();
    $contaDao=new ContaDao();
    $k=$userDao->listarTodos($user->pegarClasse(),"order by _nome asc");
    $i=0;

    $field=array('_id');
    $param=array(1);
    $actv=$dao->buscaExaustiva($field,'conta','_estado=?',$param)->rowCount();

    $field1=array('_id');
    $param1=array(0);
    $desactv=$dao->buscaExaustiva($field1,'conta','_estado=?',$param1)->rowCount();

    $porCriar=0;
    foreach ($k as $rs)
    {
        if($dao->listarPorId('conta',$rs->_id)->rowCount()==0) {
            $porCriar+=1;
        }
    }
?>
<!-- begin #content -->
<div id="content" class="content">

    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>Utilizadores</h4>
                    <p><?php echo $k->rowCount()?></p>
                </div>
                <div class="stats-link">
                    <a href="<?php echo URL.$att->getController()?>/listarUtilizador">Ver Detalhes <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-check-circle"></i></div>
                <div class="stats-info">
                    <h4>Contas Activas</h4>
                    <p><?php echo $actv?></p>
                </div>
                <div class="stats-link">
                    <a href="<?php echo URL.$att->getController()?>/contaActiva">Ver Detalhes <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-lock"></i></div>
                <div class="stats-info">
                    <h4>Contas Inactivas</h4>
                    <p><?php echo $desactv?></p>
                </div>
                <div class="stats-link">
                    <a href="<?php echo URL.$att->getController()?>/contaInactiva">Ver Detalhes <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <h4>Contas Por Criar</h4>
                    <p><?php echo $porCriar?></p>
                </div>
                <div class="stats-link">
                    <a href="<?php echo URL.$att->getController()?>/porCriar">Ver Detalhes <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->

    <div class="palco"></div>
    <!-- begin row -->

    <!-- end row -->
</div>
<!-- end #content -->
<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->
