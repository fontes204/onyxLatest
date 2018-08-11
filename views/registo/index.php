<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Onyx | Registro</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

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
    <link href="<?php echo URL?>public/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <link href="<?php echo URL?>public/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
    <link href="<?php echo URL?>public/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />

    <link href="<?php echo URL?>public/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo URL?>public/assets/plugins/powerange/powerange.min.css" rel="stylesheet" />
</head>
<body class="pace-top bg-white">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin register -->
    <div class="register register-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image">
                <img src="<?php echo URL?>public/assets/img/login-bg/bg-8.jpg" alt="" />
            </div>
            <div class="news-caption">
                <h4 class="caption-title"><i class="fa fa-edit text-success"></i> ONYX</h4>
                <p>SISTEMA DE GESTÃO DE TERRAS</p>
            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin register-content -->
            <div class="register-content">
                <form action="<?php echo URL?>utilizador/registoFrontEnd" method="POST" data-parsley-validate="true" id="frm_front" class="margin-bottom-0 frm-registo-front-end">
                    <label class="control-label">Nome Completo</label>
                    <div class="row row-space-10">
                        <div class="col-md-12 m-b-15">
                            <input type="text" class="form-control" name="nomecompleto" placeholder="João Filomeno" data-parsley-required="true" />
                        </div>
                    </div>
                    <label class="control-label">Data de Nascimento</label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="text" id="datepicker-autoClose" class="form-control" data-parsley-required="true" name="datanascimento" placeholder="30-10-1988" />
                        </div>
                    </div>
                    <label class="control-label">Telefone</label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="text" class="form-control" data-parsley-required="true" name="telefone" placeholder="900 00 11 22" />
                        </div>
                    </div>
                    <label class="control-label">Departamento</label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <select name="depa" class="departamento-select default-select2 form-control" required></select>
                        </div>
                    </div>
                    <label class="control-label">Função</label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <select name="funcao" class="funcao-select default-select2 form-control txt" required></select>
                            <div class="esconder-radio">
                                <input type="radio" value="admin" name="tipo_tec" checked>Administrativo
                                <input type="radio" value="tec" name="tipo_tec">Técnico
                            </div>
                        </div>
                    </div>
                    <label class="control-label">Utilizador</label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="text" maxlength="35" data-parsley-required="true" name="username" class="form-control" placeholder="João" />
                        </div>
                    </div>
                    <label class="control-label">Senha</label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="password" name="senha" data-parsley-required="true" class="form-control" placeholder="********" />
                        </div>
                    </div>
                    <div class="register-buttons">
                        <button type="submit" name="btn_registar" class="btn btn-primary btn-block btn-lg btn_registar">Registar-se</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-center">
                        <b>Já estás registado? Click <a href="<?php echo URL?>">aqui</a> para efectuar o login.</b>
                    </div>
                    <hr />
                    <p class="text-center text-inverse">
                        <b>&copy; Onyx Todos direitos reservados <?php echo date('Y');?></b>
                    </p>
                </form>
            </div>
            <!-- end register-content -->
        </div>
        <!-- end right-content -->
    </div>
    <!-- end register -->
</div>
<!-- end page container -->


<!-- #modal-dialog -->
<div class="modal fade calback-registo-front-end" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Onyx informa</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info fade in m-b-15 text-center">
                    <strong>O seu registo foi efectuado com sucesso. Aguarde a activação da sua conta.</strong>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo URL?>public/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo URL?>public/assets/crossbrowserjs/html5shiv.js"></script>
<script src="<?php echo URL?>public/assets/crossbrowserjs/respond.min.js"></script>
<script src="<?php echo URL?>public/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo URL?>public/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->
<script src="<?php echo URL?>public/assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="<?php echo URL?>public/assets/js/form-wizards-validation.demo.min.js"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo URL?>public/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo URL?>public/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo URL?>public/assets/js/dashboard.min.js"></script>


<script src="<?php echo URL?>public/assets/plugins/switchery/switchery.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/powerange/powerange.min.js"></script>
<script src="<?php echo URL?>public/assets/js/form-slider-switcher.demo.min.js"></script>

<script src="<?php echo URL?>public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo URL?>public/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/masked-input/masked-input.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="<?php echo URL?>public/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo URL?>public/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo URL?>public/assets/js/form-plugins.demo.min.js"></script>

<!---============================INICIO DAS NOSSAS FUNCOES ====================================--->

<script src="<?php echo URL?>public/js/front-end.js"></script>

<!---============================FIM DAS NOSSAS FUNCOES ====================================--->

<script src="<?php echo URL?>public/assets/js/apps.min.js"></script>

<script>
    $(document).ready(function() {
        App.init();
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
