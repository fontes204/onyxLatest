/**
 * Created by elviosadoc on 17/06/17.
 */
$(this).ready(function () {

    //inicio do crud para a entidade documeto
    $('.nome_documento').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'documento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_documento').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
                $.get(URL + 'documento/consultarNome', {'param': $(this).val()}, function (x) {
                    if (x == "1") {
                        $('.nome_documento').addClass('parsley-error');
                        $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Este nome já existe no banco de dados</li></ul>');
                        boolean=1;
                    } else {
                        boolean=0;
                    }
                });
            }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nome_documento').removeClass('parsley-error');
        }
        });

    $('.nome_docume').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'documento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_documento').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nome_documento').removeClass('parsley-error');
        }
    });

    $('.ctrlNum').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'documento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.ctrlNum').addClass('parsley-error');
                    $('.error-desc').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.ctrlNum').removeClass('parsley-error');
        }
    });

    $('.form-add-documento').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            if(x==1){
                $('.txt-call-back').html('Documento adicionado com sucesso');
                $('#modal-callback').modal('show');
            }else if(x==2)
            {
                $('.txt-call-back').html('Documento alterado com sucesso');
                $('#modal-callback').modal('show');
            }
        });
    });

    $('body').on('click','.btn-eliminar-doc',function () {
        var html='<p class="text-center f-s-14">Desejas realmente elimimar este documento?</p> <p class="text-center"> <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 btn-confimar-delete" idDoc="">Confirmar</a> <a href="javascript:;" class="btn btn-white btn-xs" data-dismiss="modal">Cancelar</a> </p>';
        $('.agrupador-txt').html(html);
        $('.btn-confimar-delete').attr('idDoc',$(this).attr('idDocumento'));
    });

    $('#modal-confirm-eliminar').on('click','.btn-confimar-delete',function () {
        $.post(URL+'documento/eliminarDoc',{'param':$(this).attr('idDoc')},function (x) {
            if(x==1)
            {
                var html = '<div class="alert alert-danger alert-sm fade in m-b-15"><strong>Erro:</strong> O documento que pretendes eliminar está associado a processos e neste caso será impossível concluir esta operação.</div>';
                $('.agrupador-txt').html(html);
            }else if(x==2){
                var html = '<div class="alert alert-success text-center alert-sm fade in m-b-15"><strong><i class="fa fa-check"></i></strong> Documento eliminado com sucesso.</div>';
                $('.agrupador-txt').html(html);
                listarDocumento();
            }
        });
    });
    listarDocumento();
//fim do crud da entidade documento

    //inicio do cruo para o departamento
    $('.nome_departamento').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'departamento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_departamento').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
            $.get(URL + 'departamento/consultarNome', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_departamento').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Este nome já existe no banco de dados</li></ul>');
                    boolean=1;
                } else {
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nome_departamento').removeClass('parsley-error');
        }
    });

    $('.ctrlNumDescDepa').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'departamento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.ctrlNumDescDepa').addClass('parsley-error');
                    $('.error-desc').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.ctrlNumDescDepa').removeClass('parsley-error');
        }
    });

    $('.nome_departa,.nome-completo').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'departamento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_departa,.nome-completo').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nome_departa,.nome-completo').removeClass('parsley-error');
        }
    });

    $('.form-add-departamento').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            if(x==1){
                $('.txt-call-back').html('Departamento adicionado com sucesso');
                $('#modal-callback').modal('show');
            }else if(x==2)
            {
                $('.txt-call-back').html('Departamento alterado com sucesso');
                $('#modal-callback').modal('show');
            }
        });
    });

    //consultando os departamentos
    listarDepartamento();

    $('body').on('click','.btn-eliminar-depa',function () {
        var html='<p class="text-center f-s-14">Desejas realmente elimimar este departamento?</p> <p class="text-center"> <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 btn-confimar-delete-depa" idDepa="">Confirmar</a> <a href="javascript:;" class="btn btn-white btn-xs" data-dismiss="modal">Cancelar</a> </p>';
        $('.agrupador-txt').html(html);
        $('.btn-confimar-delete-depa').attr('idDepa',$(this).attr('idDepartamento'));
    });

    $('#modal-confirm-eliminar').on('click','.btn-confimar-delete-depa',function () {
        $.post(URL+'departamento/eliminarDepartamento',{'param':$(this).attr('idDepa')},function (x) {
            if(x==1)
            {
                var html = '<div class="alert alert-danger alert-sm fade in m-b-15"><strong>Erro:</strong> O departamento que pretendes eliminar está associado a um ou vários utilizadores e neste caso será impossível concluir esta operação.</div>';
                $('.agrupador-txt').html(html);
            }else if(x==2){
                var html = '<div class="alert alert-success text-center alert-sm fade in m-b-15"><strong><i class="fa fa-check"></i></strong> Departamento eliminado com sucesso.</div>';
                $('.agrupador-txt').html(html);
                listarDepartamento();
            }
        });
    });

    //fim do crud para o departamento

    //inicio do crud para o grupo
    $('.nome_grupoD').keyup(function () {
        var boolean=0;
        if($(this).val().length>2)
        {
            $.get(URL + 'grupo/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_grupoD').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
            $.get(URL + 'grupo/consultarNome', {'param': $(this).val()}, function (x) {
                if (x >= 1) {
                    $('.nome_grupoD').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Este nome já existe no banco de dados</li></ul>');
                    boolean=1;
                } else {
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nome_grupoD').removeClass('parsley-error');
        }
    });

    $('.nome_grupo').keyup(function () {
        var boolean=0;
        if($(this).val().length>3)
        {
            $.get(URL + 'departamento/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nome_grupo').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nome_grupo').removeClass('parsley-error');
        }
    });

    //adicionando e actualizando grupo de utilizador
    $('.form-add-grupo').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            if(x==1){
                $('.txt-call-back').html('Grupo de Utilizador adicionado com sucesso');
                $('#modal-callback').modal('show');
            }else if(x==2)
            {
                $('.txt-call-back').html('Grupo de Utilizador alterado com sucesso');
                $('#modal-callback').modal('show');
            }
        });
    });
    $('body').on('click','.btn-eliminar-grupo',function () {
        var html='<p class="text-center f-s-14">Desejas realmente elimimar este grupo?</p> <p class="text-center"> <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 btn-confimar-delete-grupo" idGrupo="">Confirmar</a> <a href="javascript:;" class="btn btn-white btn-xs" data-dismiss="modal">Cancelar</a> </p>';
        $('.agrupador-txt').html(html);
        $('.btn-confimar-delete-grupo').attr('idGrupo',$(this).attr('idGrupo'));
    });

    $('#modal-confirm-eliminar').on('click','.btn-confimar-delete-grupo',function () {
        var id=$(this).attr('idGrupo');
        $.post(URL+'grupo/eliminarGrupo',{'param':$(this).attr('idGrupo')},function (x) {
            if(x==1)
            {
                var html = '<div class="alert alert-danger alert-sm fade in m-b-15"><strong>Erro:</strong> O grupo que pretendes eliminar está associado a um ou vários utilizadores e neste caso será impossível concluir esta operação.</div>';
                $('.agrupador-txt').html(html);
            }else if(x==2){
                var html = '<div class="alert alert-success text-center alert-sm fade in m-b-15"><strong><i class="fa fa-check"></i></strong> Grupo eliminado com sucesso.</div>';
                $('.agrupador-txt').html(html);
                listarGrupo(id);
                if(id!=0)
                {
                    $('#tr'+id).css({
                        color:'#F09',
                        'text-decoration':'underline'
                    });
                }
            }
        });
    });
    listarGrupo(0);


    //area reservada para o crud do Utilizador
    $('.nomeUtilizador').keyup(function () {
        var boolean=0;
        if($(this).val().length>2)
        {
            $.get(URL + 'utilizador/verNumero', {'param': $(this).val()}, function (x) {
                if (x == "1") {
                    $('.nomeUtilizador').addClass('parsley-error');
                    //$('.txt-div').append('<ul id="parsley-id" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    $('.error-nome').html('<ul id="parsley-id" style="position: absolute; margin-top: -12px" class="parsley-errors-list filled"><li class="parsley-required">Não pode conter números</li></ul>');
                    boolean=1;
                } else{
                    boolean=0;
                }
            });
            $.get(URL + 'utilizador/nomeIgual', {'param': $(this).val()}, function (x) {
                if (x >= 1) {
                    $('.nomeUtilizador').addClass('parsley-error');
                    $('.error-nome').html('<ul id="parsley-id" style="position: absolute; margin-top: -0.2%" class="parsley-errors-list filled"><li class="parsley-required">Este nome já existe no banco de dados</li></ul>');
                    boolean=1;
                } else {
                    boolean=0;
                }
            });
        }
        if(boolean==0)
        {
            $('#parsley-id').remove();
            $('.nomeUtilizador').removeClass('parsley-error');
        }
    });

    //adicionar conta de utilizador
    $('.btn-add-conta').click(function () {

        var senhaP = $('.senhaP').val();
        var repSenha = $('.repSenha').val();
        if (senhaP == repSenha) {
            var dados = $('.frm-add-conta').serialize();
            $.post($('.frm-add-conta').attr('action'), dados, function (x) {
                alert(x);
                if (x == 1) {
                    $('.txt-call-back1').text('Conta adicionada com sucesso.');
                    $('#modal-conta-criada').modal('show');
                }
            });
        } else {
            $('.repSenha').addClass('parsley-error');
            $('.alert-senha-verify').html('<span id="parsley-id"><ul style="position: absolute; margin-top: -0.2%" class="parsley-errors-list filled"><li class="parsley-required">As senhas que foram  passadas não conferem, tente novamente.</li></ul><p>&nbsp;</p></span>');
        }
    });

    $('.repSenha').keypress(function () {
        $('#parsley-id').remove();
        $('.repSenha').removeClass('parsley-error');
    });

    $('.frm-add-conta').submit(function (e) {
        e.preventDefault();
        var senhaP = $('.senhaP').val();
        var repSenha = $('.repSenha').val();
        if (senhaP == repSenha) {
            $.post($(this).attr('action'), $(this).serialize(), function (x) {
                alert(x);
                if (x == 1) {
                    $('.txt-call-back1').text('Conta adicionada com sucesso.');
                    $('#modal-conta-criada').modal('show');
                }
            });
        } else {
            $('.repSenha').addClass('parsley-error');
            $('.alert-senha-verify').html('<span id="parsley-id"><ul style="position: absolute; margin-top: -0.2%" class="parsley-errors-list filled"><li class="parsley-required">As senhas que foram  passadas não conferem, tente novamente.</li></ul><p>&nbsp;</p></span>');
        }
    });

    $('.email-dominio').blur(function () {
        $.get(URL+'utilizador/verficarDominio',{'param':$(this).val()},function (x) {
            if(x==0)
            {
                $('.email-dominio').addClass('parsley-error');
                $('.error-email').html('<span id="parsley-id"><ul style="position: absolute; margin-top: -0.2%" class="parsley-errors-list filled"><li class="parsley-required">E-mail inválido.</li></ul><p>&nbsp;</p></span>');
            }
        });
    });
    $('.email-dominio').focus(function () {
        $('#parsley-id').remove();
        $('.email-dominio').removeClass('parsley-error');
    });
    //inicio activar & desactivar conta
    $('body').on('click','.btn-desactivar-conta',function () {
        var html='<p class="text-center f-s-14">Desejas realmente desactivar esta conta?</p> <p class="text-center"> <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 btn-confimar-desactivar" id="">Confirmar</a> <a href="javascript:;" class="btn btn-white btn-xs" data-dismiss="modal">Cancelar</a> </p>';
        $('.agrupador-txt').html(html);
    });

    $('body').on('click','.btn-activar-conta',function () {
        var idUser=0;

        if($('.group-btn-activar').attr('idUser')!=null || $('.group-btn-activar').attr('idUser')!=undefined)
            idUser=$('.group-btn-activar').attr('idUser');
        else
            idUser=$('.group-btn-desactivar').attr('idUser');

        var param=[1,idUser];
        $.post(URL+'conta/actualizarEstado',{'param':param},function (x) {
           if(x!=null)
           {
               $('.txt-call-back').text('Conta activada com sucesso.');
               $('#modal-mostrar-sms-conta').modal('show');
               $('.group-btn-activar').html('<a href="#modal-confirm-desctivar-conta" data-toggle="modal" idUser="" class="btn btn-sm btn-danger btn-block btn-desactivar-conta" style="text-align: left"><i class="fa fa-lock"></i> Desactivar Conta</a>');
           }
        });
    });

    $('body').on('click','.btn-confimar-desactivar',function () {
        var idUser=0;

        if($('.group-btn-desactivar').attr('idUser')!=null || $('.group-btn-desactivar').attr('idUser')!=undefined)
            idUser=$('.group-btn-desactivar').attr('idUser');
        else
            idUser=$('.group-btn-activar').attr('idUser');

        var param=[0,idUser];
        $.post(URL+'conta/actualizarEstado',{'param':param},function (x) {
            if(x==1)
            {
                var html='<div class="alert alert-success fade in m-b-15 text-center"><p class="text-center f-s-14">Conta desactivada com sucesso.</p></div>';
                $('.agrupador-txt').html(html);
                $('.group-btn-activar').html('<a href="javascript:;" class="btn btn-sm btn-success btn-block btn-activar-conta" idUser="" style="text-align: left"><i class="fa fa-check"></i> Activar Conta</a>');
            }
        });
    });

    //fim activar & desactivar conta
});