
<!-- ================== BEGIN BASE JS ================== -->
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
<script src="<?php echo URL?>public/assets/js/ui-modal-notification.demo.min.js"></script>
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

<script src="<?php echo URL?>public/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo URL?>public/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/DataTables/extensions/AutoFill/js/autoFill.bootstrap.min.js"></script>
<script src="<?php echo URL?>public/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL?>public/assets/js/table-manage-autofill.demo.min.js"></script>

<script src="<?php echo URL?>public/assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<!-- ================== INICIO DE ARQUIVOS JS-ONYX ================== -->
<script src="<?php echo URL?>public/js/admin.js"></script>
<!-- ================== FIM DE ARQUIVOS JS-ONYX ================== -->
<script>
    $(document).ready(function() {
        App.init();
        Dashboard.init();
        FormWizardValidation.init();
        FormPlugins.init();
        FormSliderSwitcher.init();
        TableManageAutofill.init();
        Notification.init();
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>