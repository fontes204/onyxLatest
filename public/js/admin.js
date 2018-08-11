/**
 * Created by elviosadoc on 26/12/16.
 */
$(this).ready(function () {

    $('.add-zona').click(function () {
        salvarZona();
    });

    //alert-actualizar-credencias
    $.get(URL+'Control_Cred/rastreio',{'param':$('.id_user').attr('id_user')},function (x) {
        if(x>=1 && $('.id_user').attr('adiado')==0 && $('.id_user').attr('alterado')==0)
        {
            $('#alert-actualizar-credencias').modal('show');
        }
    });

    $('.btn-adiar-cred').click(function () {
        if($('.id_user').attr('adiado')==0)
        {
         $.get(URL+'Control_Cred/adiar');
        }
    });

    $('.btn-alterar-cred').click(function () {
        if($('.id_user').attr('alterado')==0)
        {
         $.get(URL+'Control_Cred/alterar');
        }
    });
    // $.get(URL+controller()+'/notificacoes',function (x) {
    //     alert(x);
    // });

});