
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image img-responsive">
                    <?php if(Session::get('role')=='sys'){?>
                    <a href="javascript:;"><img class="txt-ij" src="<?php echo URL ?>public/assets/img/logo-onyx17.png" alt="" /></a>
                    <?php }else{?>
                    <a href="javascript:;"><img class="txt-ij" src="<?php echo URL ?>resources/img_perfil/<?php echo $ft->_foto?>" alt="" /></a>
                    <?php }?>
                </div>
                <div class="info">
                    <?php echo Session::get('user');?>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
            <?php
                switch (Session::get('type'))
                {
                    case 'sys':
                        include_once ('op/sys-menu.php');
                        break;
                    case 'Secretario':
                        include_once ('op/op1.php');
                        break;
                    case 'Chefe do Gabinete':
                        include_once ('op/op2.php');
                        break;
                    case 'Administrador':
                        include_once ('op/op3.php');
                        break;
                    case 'Tecnico':
                        $id=Session::get('id_user');
                        $dao=new TecnicoDao();
                        $vl=array($id);
                        $campos=array('_tipo');
                        $tipo_tec=$dao->buscaExaustiva($campos,'tecnico','_id_utilizador=?',$vl)->fetchObject();
                        if ($tipo_tec->_tipo=="tect_campo")
                            include_once ('op/op5.php');
                        elseif ($tipo_tec->_tipo=="tect_admin")
                            include_once ('op/op8.php');
                        break;
                    case 'Director':
                        include_once ('op/op6.php');
                        break;
                    case 'Chefe':
                        include_once ('op/op7.php');
                        break;
                    case 'Admin TI':
                        include_once ('op/super.php');
                        break;
                }
            ?>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->