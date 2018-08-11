<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>ONYX | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?php echo URL?>public/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo URL?>public/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image">
                <img src="<?php echo URL?>public/assets/img/login-bg/bg-9.jpg" data-id="login-cover-image" alt="" />
            </div>
<!--            <div class="news-caption">-->
<!--                <h4 class="caption-title">&nbsp;</h4>-->
<!--                <p>&nbsp;</p>-->
<!--            </div>-->
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand">
                    <span class="logos"><img src="<?php echo URL?>public/assets/img/logotipo.png"></span>
                    <small>Sistema de Gestão de Terras</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                <form action="<?php echo URL?>authentication/logon" data-parsley-validate="true" method="POST" class="margin-bottom-0 frm-login">
                    <div class="form-group m-b-20">
                        <input type="text" autofocus class="form-control input-lg txt-clear" name="user" data-parsley-required="true" placeholder="Utilizador"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg txt-clear" name="senha" data-parsley-required="true" placeholder="Palavra  - Passe "/>
                    </div>
                    <div class="text-center">
                        <label class="text-center erro-login text-danger">&nbsp;</label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
                    </div>
                    <div class="m-t-20 text-center">
                        <!--                    <b>Ainda não estás registado? Click <a href="--><?php //echo URL?><!--index/registro">aqui</a> para se registar.</b>-->
                    </div>
                </form>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->
</div>
<!-- end page container -->
<div class="modal fade calback-login-front-end" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h6 class="modal-title"><span class="text-info">On</span>yx informa</h6>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger fade in m-b-15 text-center">
                    <i class="fa fa-lock m-t-5" style="font-size: large"></i> A sua conta foi desactivada entre em contacto com o Administrador do Sistema.
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>
<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo URL?>public/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo URL?>public/assets/crossbrowserjs/html5shiv.js"></script>
<script src="<?php echo URL?>public/assets/crossbrowserjs/respond.min.js"></script>
<script src="<?php echo URL?>public/assets/crossbrowserjs/excanvas.min.js"></script>

<script src="<?php echo URL?>public/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->
<script src="<?php echo URL?>public/assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="<?php echo URL?>public/assets/js/form-wizards-validation.demo.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/switchery/switchery.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/powerange/powerange.min.js"></script>
<script src="<?php echo URL?>public/assets/js/form-slider-switcher.demo.min.js"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<!---============================INICIO DAS NOSSAS FUNCOES ====================================--->

<script src="<?php echo URL?>public/js/front-end.js"></script>

<!---============================FIM DAS NOSSAS FUNCOES ====================================--->
<script src="<?php echo URL?>public/assets/js/login-v2.demo.min.js"></script>
<script src="<?php echo URL?>public/assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
        FormPlugins.init();
    });
</script>
<script>
    //    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    //            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    //        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    //    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    //
    //    ga('create', 'UA-53034621-1', 'auto');
    //    ga('send', 'pageview');

</script>
</body>
</html>
