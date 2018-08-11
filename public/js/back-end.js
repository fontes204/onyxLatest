/**
 * Created by elviosadoc on 31/12/16.
 */
$(this).ready(function () {
    //$('.alert-error-verify').hide();
    URL = '/onyx/';
    _p_front = [];
    indices = 0;
    cont = 0;
    $('.div-provinvia').hide();
    var valorTec = '';

    $('.btn-add-tecnico').click(function () {
        var val = $('#tipo_tec').val();
        $('.tipo_tecnico').attr('value', val);
    });

    $('.link-add-doc').click(function () {
        registarDocumento();
    });

    $('.link-add-grupo-user').click(function () {
        registarGrupo();
    });

    $('.link-add-depa-user').click(function () {
        registarDepartamento();
    });

    $('body').on('change', '.grupo-change', function () {
        $.get(URL + 'grupo/listar1', {'id': $(this).val()}, function (a) {
            if (a[0]._perfil == "Tecnico") {
                $('#adicionar-tipo-tecnico').modal('show');
            }
        }, 'json');
    });

    addDocumentoProcesso();//funcao js que serve para adicionar os documentos pendentes

    //início área reservada para o upload de ficheiro
    formData = false; //global
    function mostrarImagemCarregada(src, i) {
        var span = document.getElementById('image-span' + i),
            img = document.createElement('img');
        img.src = src;
        img.setAttribute('class', 'img-rounded img-responsive tam-img titulo' + i + '');
        img.setAttribute('style', 'margin-top: 1.3%');
        span.appendChild(img);
    }//funcao responsável por readerizar a imagem carregada

    function progress(evt) {
        // var span=document.getElementById('image-span'+cont),
        //     img=document.createElement('img');
        //     img.src(evt);
        //     span.appendChild(img);
        // if(evt.lengthComputable)
        // {
        //     var ctrlPercent=Math.round((evt.loaded/evt.total)*100);
        //     if(ctrlPercent<100)
        //     {
        //         div2.style.width=ctrlPercent+' %';
        //     }
        // }
    }

    if (window.FormData) {
        formData = new FormData();
    }

    for (var i = 1; i <= 7; i++) {
        $('.agrega-input-file'+i).hide();
        $('.del-file' + i).hide();
    }
    indice = '';

    $('.btn-check').click(function (e) {
        indice = $(this).attr('indice');
        $('.agrega-input-file' + indice).show();
    });


    $('body').on('change', '#image', function (s) {
        cont = $(this).attr('cont');
        var tam = this.files.length, file, i = 0, reader;
        for (; i < tam; i++) {
            file = this.files[i];
            // if (!!file.type.match('/image.*/'))
            // {
            if (window.FileReader) {
                reader = new FileReader();
                // reader.onprogress=progress;
                reader.onloadend = function (e) {
                    mostrarImagemCarregada(e.target.result, cont, file.fileName);
                    $('.btn-upload' + cont).hide();
                    $('.del-file' + cont).show();
                    $('.add-doc-processo').attr('disabled', false);
                    $('.tam-img').css({width: '128px', height: '128px'});
                    $('.titulo1').attr('title', 'Requerimento');
                    $('.titulo2').attr('title', 'Croquís de Localização');
                    $('.titulo3').attr('title', 'Bilhete de Identidade');
                    $('.titulo4').attr('title', 'Fotografia');
                };
                reader.readAsDataURL(file);
            }

            if (formData) {
                formData.append('images[]', file);
            }
            // }

        }

    });

    $('body').on('change', '#images', function (s) {
        cont = $(this).attr('cont');
        var tam = this.files.length, file, i = 0, reader;
        for (; i < tam; i++) {
            file = this.files[i];
            // if (!!file.type.match('/image.*/'))
            // {
            if (window.FileReader) {
                reader = new FileReader();
                // reader.onprogress=progress;
                reader.onloadend = function (e) {
                    mostrarImagemCarregada(e.target.result, cont, file.fileName);
                    $('.btn-upload' + cont).hide();
                    $('.del-file' + cont).show();
                    $('.add-doc-processo').attr('disabled', false);
                    $('.tam-img').css({width: '128px', height: '128px'});
                    $('.titulo1').attr('title', 'Requerimento');
                    $('.titulo2').attr('title', 'Croquís de Localização');
                    $('.titulo3').attr('title', 'Bilhete de Identidade');
                    $('.titulo4').attr('title', 'Fotografia');
                };
                reader.readAsDataURL(file);
            }

            if (formData) {
                formData.append('image[]', file);
            }
            // }

        }

    });
    //fim do script para upload


    num_vert = 0;
    //getTitle();//funcao que adiciona o título a página
    ctrl_btn = 0;//variavel que controla os movimentos dos botoes do formulario wizard


    //alterar as cores dos botoes que mudam o genero do requerente
    $('.btn-male').click(function () {
        $('.btn-female').removeClass('btn-primary');
        $('.btn-female').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
    });

    $('.btn-female').click(function () {
        $('.btn-male').removeClass('btn-primary');
        $('.btn-male').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
    });

    $('.btn-geral').click(function () {
        $('.btn-urbano,.btn-projecto').removeClass('btn-primary');
        $('.btn-urbano,.btn-projecto').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
    });

    $('.btn-urbano').click(function () {
        $('.btn-geral,.btn-projecto').removeClass('btn-primary');
        $('.btn-geral,.btn-projecto').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
    });
    $('.btn-projecto').click(function () {
        $('.btn-geral,.btn-urbano').removeClass('btn-primary');
        $('.btn-geral,.btn-urbano').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
        $('#modal-tipo-de-processo').modal();
    });
    $('.btn-passaporte').click(function () {
        $('.btn-cartao_residente').removeClass('btn-primary');
        $('.btn-cartao_residente').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
    });
    $('.btn-cartao_residente').click(function () {
        $('.btn-passaporte').removeClass('btn-primary');
        $('.btn-passaporte').addClass('btn-default');
        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
    });

    $('.btn-sift-status').click(function () {
        if (document.getElementById('status').checked == true) {
            $.post(URL + 'conta/editar', {'id_utilizador': getParam(), 'status': 0}, function (x) {
                alert(x);
            });
        }
        else {
            $.post(URL + 'conta/editar', {'id_utilizador': getParam(), 'status': 1}, function (x) {
                alert(x);
            });
        }
    });

    $('.fechar-sucesso-processo,.btn-exit-modal-send-pro').click(function () {
        window.location = window.location = document.URL;
        // window.location=window.history.go(-1);
    });

    //pegando o id da provicia e populando a combo de municipio
    $('.select-prov').change(function () {
        $.get(URL + 'municipio/listar', {'id_prov': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-municipio').html(item);
        }, 'json');
    });

    //pegando o id da provicia e populando a combo de municipio
    $('.select-prov-1').change(function () {
        $.get(URL + 'municipio/listar', {'id_prov': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-municipio-1').html(item);
        }, 'json');
    });

    //pegando o id do municipio e populando a combo de comuna
    $('.select-municipio').change(function () {
        $.get(URL + 'comuna/listar', {'id_municipio': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }

            }
            $('.select-comuna').html(item);
        }, 'json');
    });

    //pegando o id do municipio e populando a combo de comuna
    $('.select-municipio-1').change(function () {
        $.get(URL + 'comuna/listar', {'id_municipio': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-comuna-1').html(item);
        }, 'json');
    });

    //pegando o id da comuna e populando a combo de bairro
    $('.select-comuna').change(function () {
        $.get(URL + 'bairro/listar', {'id_comuna': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-bairro').html(item);
        }, 'json');
    });

    //pegando o id da comuna e populando a combo de bairro
    $('.select-comuna-1').change(function () {
        $.get(URL + 'bairro/listar', {'id_comuna': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-bairro-1').html(item);
        }, 'json');
    });

    // Fazer update na prioridade do processo
    $('.prioridade').change(function (e) {
        e.preventDefault();
        var id_proc = $('#lbl-prioridade').attr('id_proc');

        $.post(URL + 'processo/actualizarPrioridade', {'estado': $(this).val(),'id_proc':id_proc}, function (x) {
            var item = '';
            if (x == 1) {
                $('.erro-prioridade').hide();
            } else {
                item = '<label class="danger">Erro ao alterar a prioridade.</label>';
                $('.erro-prioridade').show();
                $('.erro-prioridade').html(item);
            }
        },'json');
    });


    //pegando o id do bairro e populando a combo de rua
    $('.select-bairro').change(function () {
        $.get(URL + 'rua/listar', {'id_bairro': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-rua').html(item);
        }, 'json');
    });

    //pegando o id do bairro e populando a combo de rua
    $('.select-bairro-1').change(function () {
        $.get(URL + 'rua/listar', {'id_bairro': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._nome + '</option>';
                }
            }
            $('.select-rua-1').html(item);
        }, 'json');
    });


    $('btn-refresh').click(function () {
        window.locsation = document.URL;
    });


    $('.select-depa').change(function () {

        $.get(URL + 'grupo/listar', {'id_depa': $(this).val()}, function (x) {
            var item = '';
            if (x[0].erro) {
                item += '<option class="text-danger">' + x[0].erro + '</option>';
            } else {
                item += '<option></option>';
                for (i in x) {
                    item += '<option value="' + x[i]._id + '">' + x[i]._perfil + '</option>';
                }
            }
            $('.grupo-change').html(item);
        }, 'json');
    });
    $('.grupo-change').change(function () {

    });
    //enviar o proscesso do admin para o cga
    $('.btn-enviar-cga').click(function (e) {
        e.preventDefault();
        var destino = $('.destino').val();
        var desc = $('.desc').val();
        $.post($(this).attr('href'), {
            'id_user': $(this).attr('meu_id'),
            'id_proc': $(this).attr('id_proc'),
            'user': 'admin',
            'destino': destino,
            'desc': desc
        }, function (x) {
            alert(x);
            if (x == 1) {
                $('.txt-call-back').html('O processo foi enviado com sucesso');
                $('#modal-dialog').modal('show');
            }
        });
    });

    //accao que serve para enviar um processo ao administrador, mas penso que sofrerá uma ligeira modificacao
    $('.btn-enviar-admin').click(function (e) {
        e.preventDefault();
        var id_user = $('.id_user').attr('id_user');
        var id_proc = $(this).attr('id_proc');
        $.get(URL + 'departamento/listarDepa', {_perfil: "Administracao Municipal"}, function (k) {
            if (!isNaN(k))
                destino = k;
        });
        if (destino != 0) {
            $.post($(this).attr('href'), {
                'id_user': id_user,
                'id_proc': id_proc,
                'user': 'cga',
                'destino': destino
            }, function (x) {
                if (x == '1') {
                    $('.txt-call-back').html('O processo foi enviado com sucesso');
                    $('#modal-dialog').modal('show');
                }
            });
        } else {
            alert(0);
        }
    });

    //enviar o processo do cga para o dmguuc
    $('.btn-enviar-destino').click(function (e) {
        e.preventDefault();
        $.get(URL + 'departamento/listarDepa', {_perfil: "DMGUUC"}, function (k) {
            if (!isNaN(k))
                destino = k;
        });
        $.post($(this).attr('href'), {
            'id_user': $(this).attr('meu_id'),
            'id_proc': $(this).attr('id_proc'),
            'user': 'cga1',
            'destino': destino
        }, function (x) {
            alert(x);
            if (x == '1') {
                $('.txt-call-back').html('O processo foi enviado com sucesso');
                $('#modal-dialog').modal('show');
            }
        });
    });

    //enviar processo para o crguuc
    $('.btn-enviar-crguuc').click(function (e) {
        e.preventDefault();
        var destino = $('.destino').val();
        var desc = $('.desc').val();
        $.post($(this).attr('href'), {
            'id_user': $(this).attr('meu_id'),
            'id_proc': $(this).attr('id_proc'),
            'user': 'dmguuc',
            'destino': destino,
            'desc': desc
        }, function (x) {
            alert(x);
            if (x == '1') {
                $('.txt-call-back').html('O processo foi enviado com sucesso');
                $('#modal-dialog').modal('show');
            }
        });
    });

    //enviar processo para o tecnico
    $('.btn-viar-tecnico').click(function (e) {
        e.preventDefault();
        var destino = $('.destino').val();
        var desc = $('.desc').val();
        $.post($(this).attr('href'), {
            'id_user': $(this).attr('meu_id'),
            'id_proc': $(this).attr('id_proc'),
            'user': 'tecnico1',
            'destino': destino,
            'desc': desc
        }, function (x) {
            alert(x);
            if (x == '1') {
                $('.txt-call-back').html('O processo foi enviado com sucesso');
                $('#modal-dialog').modal('show');
            }
        });
    });

    //enviar processo para o tecnico para o crguuc
    $('.btn-enviar-tec-crguuc').click(function (e) {
        e.preventDefault();
        var destino = $('.destino').val();
        var desc = $('.desc').val();
        $.post($(this).attr('href'), {
            'id_user': $(this).attr('meu_id'),
            'id_proc': $(this).attr('id_proc'),
            'user': 'tecnico2',
            'destino': destino,
            'desc': desc
        }, function (x) {
            alert(x);
            if (x == '1') {
                $('.txt-call-back').html('O processo foi enviado com sucesso');
                $('#modal-dialog').modal('show');
            }
        });
    });


    //verificar o tipo de terreno a ser selecionado
    $('.select-num-vertice').change(function () {
        num_vert = $(this).val();
        if ($(this).val() != 4)
            $('.tipo_terreno').val('Irregular');
        else
            $('.tipo_terreno').val('Regular');
    });

    //criando os inputs para receber os valores de longitude e latitude usando a funcao geraInput(i)
    $('.select-num-vertice').change(function () {
        var i = 0, k = 1;
        for (; i < $(this).val(); i++) {
            $('.agregador-input').append(geraInput(i + 1));
        }
        for (; k <= $(this).val(); k++) {
            if (k == 1)
                $('.lat-ponto' + k + ',.btn-capturar-v' + k + ',.desc-ponto' + k + ',.log-ponto' + k).attr('disabled', false);
            else
                $('.lat-ponto' + k + ',.btn-capturar-v' + k + ',.desc-ponto' + k + ',.log-ponto' + k).attr('disabled', true);
        }
    });

    $('.agregador-input').on('click', '.btn-capturar-v1', function () {
        coordenadas('lat-ponto1', 'log-ponto1');
    });

    $('.agregador-input').on('click', '.btn-capturar-v2', function () {
        coordenadas('lat-ponto2', 'log-ponto2');
    });

    $('.agregador-input').on('click', '.btn-capturar-v3', function () {
        coordenadas('lat-ponto3', 'log-ponto3');
    });

    $('.agregador-input').on('click', '.btn-capturar-v4', function () {
        coordenadas('lat-ponto4', 'log-ponto4');
    });

    $('.agregador-input').on('click', '.btn-capturar-v5', function () {
        coordenadas('lat-ponto5', 'log-ponto5');
    });

    $('.agregador-input').on('click', '.btn-capturar-v6', function () {
        coordenadas('lat-ponto6', 'log-ponto6');
    });

    $('.agregador-input').on('click', '.btn-capturar-v7', function () {
        coordenadas('lat-ponto7', 'log-ponto7');
    });

    //area restrita para igualdade de pontos
    $('.btn-pig-front-s').click(function () {
        _p_front.push($(this).attr('valor'));
        alternador(indices);
    });

    $('.btn-pig-front-n').click(function () {
        $('#iguldade-pontos').modal('hide');
        /* _p_front.push($(this).attr('valor'));
         alternador(indices);*/
    });

    //area para gerar relatorio tecnico
    $('.btn-criar-relatorio-tec').click(function () {
        gerarRelatorioTec();
    });

    //verfificar senha
    $('.btn-verificar-senha').click(function () {
        var senha = $('.senha-req').val();
        var user = $('.id_user').attr('user');
        var html = '<div class="alert alert-danger fade in m-b-15"><strong>Erro:</strong> A senha que introduziu não confere. Certifica-se de que é o proprietário desta conta ou entre em contacto com o <b>administrador</b> do sistema.</div>';
        $.post(URL + 'authentication/verificarSenha', {'user': user, 'senha': senha}, function (x) {
            if (x == 0)
                $('.alert-error-verify').html(html);
            else
                window.location = URL + '' + controller() + '/alterarCredenciais_/' + btoa($('.id_usuario').val());
        });
    });
    $('.senha-req').keypress(function () {
        $('.alert-error-verify').html('');
    });
    $('.frm-verifcar-senha').submit(function (e) {
        e.preventDefault();
        var dados = $(this).attr('action');
        $.post(URL + 'authentication/verificarSenha', dados, function (x) {
            if (x == 0)
                $('.alert-error-verify').html(html);
            else
                window.location = URL + '' + controller() + '/alterarCredenciais_/' + btoa($('.id_usuario').val());
        });
    });

    $('.btn-salvar-alteracao').click(function () {

        var senhaP = $('.senhaP').val();
        var repSenha = $('.repSenha').val();
        var html = '<div class="alert alert-danger alert-sm fade in m-b-15"><strong>Erro:</strong> A senhas que foram  passadas não conferem, tente novamente.</div>';
        if (senhaP == repSenha) {
            var dados = $('.frm-editar-credenciais').serialize();
            $.post($('.frm-editar-credenciais').attr('action'), dados, function (x) {
                if (x == 1) {
                    $('.txt-call-back').text('Credênciais alterado com sucesso.');
                    $('#modal-alterar-creditos').modal('show');
                }
            });
        } else {
            $('.alert-senha-verify').fadeIn(1000).html(html);
        }
    });

    $('.btn-exit-alterar-creditos').click(function () {
        window.location = URL + '' + controller() + '/perfil/' + getParam();
    });

    $('.select-prov-mask').change(function () {
        $.get(URL+'provincia/listarById',{'param':$(this).val()},function (x) {
            $('.numbi-user').mask("999999999"+x+"999");
        });
    });

    $('.nacionalidade').change(function () {
        $.get(URL+'pais/listarById',{'param':$(this).val()},function (x) {
            if(x=='Angola')
            {
                $('.div-tipo-documento').hide();
                $('.div-provinvia').show();
                $('.lbl-num-documento').text('Número do Bilhete');
            }else {
                $('.div-provinvia').hide();
                $('.div-tipo-documento').show();
                $('.lbl-num-documento').text('Número do Documento');
            }
        });
    });


        $('.numTelefone').mask("+244 999 999 999");
    $('.data-prev,.data-next').focusout(function () {
        var data=$(this).val().split(" ");
        $(this).val(data[0]);
    });

    $('.data-pick').datepicker({
        autoclose:true,
        language:'pt-BR'
    });
});