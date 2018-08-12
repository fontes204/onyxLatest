/**
 * Created by elviosadoc on 29/01/17.
 */


// function coordenadas(lat,lng) {
//     if (window.navigator && window.navigator.geolocation) {
//         var geolocation = window.navigator.geolocation;
//         geolocation.getCurrentPosition(sucesso, erro);
//     } else {
//         alert('Geolocalização não suportada em seu navegador.')
//     }
//     function sucesso(posicao) {
//         $('.'+lat).val();
//         $('.'+lng).val();
//         // $('.'+lat).val(posicao.coords.latitude);
//         // $('.'+lng).val(posicao.coords.longitude);
//         alert(1);
//         $.get(URL+'terreno/retornaIgualdadePontos',{'lat':posicao.coords.latitude,'lng':posicao.coords.longitude},function (x) {
//             alert(x);
//             if (x!='0')
//             {
//
//             }
//         });
//     }
// }

function tiraNumString(valor)
{
    var rx='';
    for (var i=0;i<valor.length;i++)
    {
        rx=valor[i];
    }
    return rx;
}
function alternador(t)
{
    var inct=+t+1;
    var t=+t;
    setTimeout(function () {
        $('.lat-ponto'+inct+',.log-ponto'+inct+',.desc-ponto'+inct+',.btn-capturar-v'+inct+'').attr('disabled',false),
            $('.lat-ponto'+t+',.log-ponto'+t+',.desc-ponto'+t+',.btn-capturar-v'+t+'').attr('disabled',true)
    },1000);
}
function coordenadas(lat,lng) {

    var t=lat.split("-")[1];
    var lat=$('.'+lat).val();
    var lng=$('.'+lng).val();
    var id_zona=$('.id_zona').val();
        $.get(URL+'terreno/verificacao',{'lat':lat,'lng':lng,'id_zona':id_zona},function (x) {
             // alert(x);
            // alert(x[0].nome+' '+x[0].id+' '+x[0].sobre);
            if(x[0].nome!=null && x[0].id!=0 && x[0].tipo=="igual")
            {
                $('.nomeRequerenteIgu').text(x[0].nome);
                $('#iguldade-pontos').modal('show');
                indices=tiraNumString(t);
            }else if(x[0].sobre!=null && x[0].tipo=="sobre")
            {
                $('.nomeRequerenteIgu').text(x[0].nome);
                $('#sobreposicao-terreno').modal('show');
            }else if (x[0].nome==null && x[0].id==null && x[0].sobre==null && x[0].tipo==null){
                _p_front.push('n');
                alternador(tiraNumString(t));
            }
        },'json');
}

function gerarVertices(num) {
    var i=0,k=1;
    for ( ;i<num;i++)
    {
        $('.agregador-input').append(geraInput(i+1));
    }
    for ( ;k<=num;k++)
    {
        if(k==1)
            $('.lat-ponto'+k+',.btn-capturar-v'+k+',.desc-ponto'+k+',.log-ponto'+k).attr('disabled',false);
        else
            $('.lat-ponto'+k+',.btn-capturar-v'+k+',.desc-ponto'+k+',.log-ponto'+k).attr('disabled',true);
    }
}

function removerVertice() {
    $('.agregador-input').html('');
}