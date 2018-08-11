/**
 * Created by elviosadoc on 08/01/17.
 */
function registo() {
    switch (retornaMetodos())
    {
        case 'criarProcessoIndividual':
            var ol=$('.frm-cad-proc-ind li[class="active"]').text().split(" ")[0];
            if(ol==4)
            {
                var documento=[];
                $('.documento').attr('name','documento[]');
                $("input[name='documento[]']:checked").each(function(){
                    documento.push($(this).val());
                });

                var id_sga=$('.id_user').attr('id_user');
                var dados=$('#form_criar_processo').serialize();
                var url=$('#form_criar_processo').attr('action');
                var opcao='segundo';
                if(formData)
                {
                    $.ajax({
                        url:url,
                        type:'POST',
                        data:formData,
                        processData:false,
                        contentType:false,
                        dataType:'json',
                        success:function (x) {
                            var fotos=[];
                            for (i in x)
                            {
                                fotos.push(x[i].nomes);
                            }
                            if (x!='')
                            {
                                $.post(url,dados+'&id_sga='+id_sga+'&documento='+documento+'&opcao='+opcao+'&foto='+fotos,function (x) {
                                    // alert(x);
                                    if(x=='1')
                                    {

                                        $('.calback-sucesso-prcesso').modal('show');
                                    }
                                });
                            }
                        }
                    });
                }

            }
            break;
        case 'criarProcessoOrganizacao':
            var ol=$('.frm-cad-proc-org li[class="active"]').text().split(" ")[0];
            if (ol==4)
            {
                var documento=[];
                $('.documento').attr('name','documento[]');
                $("input[name='documento[]']:checked").each(function(){
                    documento.push($(this).val());
                });

                var dados=$('#form_criar_processo_organizacao').serialize();
                var id_sga=$('.id_user').attr('id_user');
                var url=$('#form_criar_processo_organizacao').attr('action');
                var opcao='segundo';
                if(formData)
                {
                    $.ajax({
                        url:url,
                        type:'POST',
                        data:formData,
                        processData:false,
                        contentType:false,
                        dataType:'json',
                        success:function (x) {
                            var fotos=[];
                            for (i in x)
                            {
                                fotos.push(x[i].nomes);
                            }
                            if (x!='')
                            {
                                $.post(url,dados+'&id_sga='+id_sga+'&documento='+documento+'&opcao='+opcao+'&foto='+fotos,function (x) {
                                    alert(x);
                                    if(x=='1')
                                    {
                                        $('.calback-sucesso-prcesso').modal('show');
                                    }
                                });
                            }
                        }
                    });
                }
            }
            break;
        case 'adicionarUtilizador':
            var ol=$('.frm-reg-user li[class="active"]').text().split(" ")[0];

            if(ol==4)
            {
                var dados=$('.form-registo-user-back-end').serialize();
                var url=$('.form-registo-user-back-end').attr('action');
                $.post(url,dados,function (x) {
                    if(x=='1')
                    {
                        $('.txt-call-back1').html('Utilizador criado com sucesso.');
                        $('.calback-sucesso1').modal('show');
                    }
                });
            }
            break;
        case 'capturar_coordenadas':
            var ol=$('.frm-captura-coords li[class="active"]').text().split(" ")[0];
            if(ol==2)
            {
                //arrays
                var lat=[];
                var lng=[];

                var id_zona=$('.id_zona').val();
                var quarteirao=$('.quarteirao').val();
                var bloco=$('.bloco').val();
                var lote=$('.lote').val();
                var largura=$('.largura').val();
                var comprimento=$('.comprimento').val();
                var numVertice=$('.numVertice').val();
                var id_requerente=$('.dados_tereno').attr('id_requerente');

                //populando os vectores
                for (var i=1;i<=numVertice;i++)
                {
                    lat.push($('.lat-ponto'+i).val());
                    lng.push($('.log-ponto'+i).val());
                }

                $.post(URL+'terreno/registar',{'lat':lat,'lng':lng,'id_zona':id_zona,'_p_front':_p_front,'quarteirao':quarteirao,'bloco':bloco,'lote':lote,'largura':largura,'comprimento':comprimento,'numVertice':numVertice,'id_requerente':id_requerente},function (x) {
                    if(x!=0)
                    {
                        $('.txt-call-back').html('Pontos guardados com sucesso');
                        $('#modal-dialog').modal('show');
                    }
                });

            }
            break;
    }
}
    function registarDocumento() {
        var nome=$('.nomedoc').val();
        $.post(URL+'documento/salvar',{'nome':nome},function (x) {
            alert(x);
        });
    }

    function registarGrupo() {
        var nome=$('.nomeGrupo').val();
        var depa=$('.select_id_depa').val();
        $.post(URL+'grupo/salvar',{'perfil':nome,'depa':depa},function (x) {
            switch (x)
            {
                case '23000':
                    $('.sms-callback').addClass('text-center');
                    $('.sms-callback').addClass('text-danger').html('Este nome já existe');
                    break;
                default:
                    alert(x);
                    break;
            }
        });
    }

function registarDepartamento() {
    var nome=$('.nomeDepa').val();
    $.post(URL+'departamento/salvar',{'perfil':nome},function (x) {
        switch (x)
        {
            case '23000':
                $('.sms-callback').addClass('text-center');
                $('.sms-callback').addClass('text-danger').html('Este nome já existe');
                break;
            default:
                alert(x);
                break;
        }
    });
}

    //indice
    function addDocumentoProcesso() {
    $('.add-doc-processo').click(function () {
        var id_documento=[];
        $('.documento').attr('name','documento[]');
        var id_sga=$('.id_user').attr('id_user');
        var id_proc=$('.id_proc').val();
        var opcao='segundo';
        $("input[name='documento[]']:checked").each(function(){
            id_documento.push($(this).val());
        });

        if(formData)
        {
            $.ajax({
                url: URL + 'processo/addDocumento',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (x) {
                    var fotos = [];
                    for (i in x) {
                        fotos.push(x[i].nomes);
                    }
                    if (x != '') {
                        $.post(URL + 'processo/addDocumento', {
                            'documento': id_documento,
                            'id_proc': id_proc,
                            'id_sga': id_sga,
                            'foto': fotos,
                            'opcao': opcao
                        }, function (x) {
                            if (x == '1')
                            {
                                $('.txt-call-back').html('Documento adicionado com sucesso');
                                $('#modal-dialog').modal('show');
                            }
                        });
                    }
                }
            });
        }//fim da verifcacao
            });

    }

    //salvar zona
    function salvarZona() {
        var dados=$('.frm-salvar-zona').serialize();
        var url=$('.frm-salvar-zona').attr('action');
        $.post(url,dados,function (x) {
            if(x==1)
            {
                $('.div-alert').addClass('alert-success');
                $('.text-strong').text('Sucesso!');
                $('.text-calback').text('Zona criada com sucesso.');
                $('.modal-zona').modal('show');
            }else if(x==0)
            {
                $('.div-alert').addClass('alert-danger');
                $('.text-strong').text('Erro!');
                $('.text-calback').text('Falha ao criar zona, já existe uma zona com estas características.');
                $('.modal-zona').modal('show');
            }
        });

    }

    //gerar relatorio tecnico

    function gerarRelatorioTec()
    {
        var dados=$('.frm-confrotacao').serialize();
        var id_processo=$('.id_processo').val();
        $.post(URL+'relatorio/criarRelatorioTec',dados,function (x) {
            if(x==1)
            {

                 $.get(URL+'tecnico/relatorioTecnico',{'id_processo':$('.id_processo').attr('valor')},function (x) {
                     $('.txt-call-back').html('Relatório criado com sucesso');
                     $('#modal-dialog').modal('show');
                 });
                $.post(URL+'processo/movimento',{'id_user':$('.id_user').attr('id_user'),'id_proc':id_processo  ,'user':'tecnico2','destino':'default','desc':'default'},function (x) {
                    alert(x);
                });
            }
        });
    }