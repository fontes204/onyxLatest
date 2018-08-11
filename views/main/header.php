<?php
$att=new Atributo();
$dao=new UtilizadorDao();
$valor=array(base64_decode($att->getParam()));

if(empty($valor[0]) || $valor[0] == '' || $valor[0] == null)
    $valor=array(Session::get('id_user'));

$campo=array('_utilizador');
$dadosC=$dao->buscaExaustiva($campo,'conta','_id_utilizador=?',$valor)->fetchObject();

$condicao = 'u._id=? AND u._id_grupo=g._id AND g._id_departamento=d._id';
$campos = array('d._perfil');
$tabelas = 'utilizador u, grupo g, departamento d';

$departamento = $dao->buscaExaustiva($campos,$tabelas,$condicao,$valor)->fetchObject();

$cont=0;
$field=array('*');
$params=array(Session::get('id_user'));
$ft=$dao->buscaExaustiva($field,'utilizador','_id=?',$params)->fetchObject();

$admin=$dao->listarPorId('administracao_municipal',@$ft->_id_administracao);
if($admin->rowCount()==0)
{
    $nome='Sistema de Gestão de Terras';
}else{
    $nome=$admin->fetchObject()->_nome;
}

if (!isset($_SESSION))
{
    Session::init();
}
if(isset($_SESSION['adiado']))
    $adiado=$_SESSION['adiado'];
else
    $adiado=0;

if(isset($_SESSION['alterado']))
    $alterado=$_SESSION['alterado'];
else
    $alterado=0;

    switch (Session::get('role'))
    {
        case 'sys':
                $redirect= $att->getController();
            break;
        case 'SSG':
            $redirect= $att->getController();
            break;
        case 'CAM':
            $redirect= $att->getController();
            break;
        case 'AAM':
            $redirect= $att->getController();
            break;
        case 'Tecnico':
            $redirect= $att->getController();
            break;
        case 'DDMGUUC':
            $redirect= $att->getController();
            break;
        case 'AT';
            $redirect= $att->getController();
            break;
    }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Onyx | <?php echo $GLOBALS['titulo']?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="<?php echo URL?>public/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
    <link href="<?php echo URL?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo URL?>public/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />


    <link href="<?php echo URL?>public/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
<!--    <link href="--><?php //echo URL?><!--public/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="<?php echo URL?>public/assets/plugins/select2.0/select2.min.css">
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <link href="<?php echo URL?>public/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />

    <link href="<?php echo URL?>public/assets/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />

    <link href="<?php echo URL?>public/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/powerange/powerange.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/isotope/isotope.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/background.css" rel="stylesheet" />

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo URL?>public/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <ul class="nav navbar-nav navbar-right">
                    <li style="left: 0" class="dropdown navbar-user">
                        <a href="<?php echo URL.$redirect?>" class="dropdown-toggle">
                            <img class="" src="<?php echo URL ?>public/insignia/insignia.png" alt="" />
                            <span class="f-s-13"><strong><?php echo strtoupper(html_entity_decode($nome))?></strong></span>
                            <span class="f-s-13"><?php echo ' | '.strtoupper(html_entity_decode($departamento->_perfil))?></span>
                        </a>
                    </li>
                </ul>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(Session::get('role')=='sys'){?>
                            <img class="txt-ij" src="<?php echo URL ?>public/assets/img/logo-onyx17.png" alt="" />
                        <?php }else{?>
                            <img class="txt-ij" src="<?php echo URL ?>resources/img_perfil/<?php echo $ft->_foto?>" alt="" />
                        <?php }?>
                        <span class="hidden-xs"><?php echo Session::get('user');?></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow id_user" alterado="<?php echo $alterado?>" adiado="<?php echo $adiado?>" id_user="<?php echo Session::get('id_user');?>" user="<?php echo $dadosC->_utilizador?>"></li>
                        <li><a href="<?php echo URL.$att->getController()?>/perfil/<?php echo base64_encode(Session::get('id_user'));?>"><i class="fa fa-user"></i> Perfil</a></li>
<!--                        <li><a href="javascript:;"><i class="fa fa-cog"></i> Defições</a></li>-->
                        <li class="divider"></li>
                        <li><a href="<?php echo URL?>logout/exit_"><i class="fa fa-sign-out"></i> Terminar a Sess&atilde;o</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->