/**
 * Created by elviosadoc on 01/01/17.
 */
function getParam() {
    var txt=document.URL.split("//");
    var url=txt[1].split("/");
    var res='';
    for (var i=0;i<url.length;i++)
    {
        res=url[i];
    }
    return res;
}

function retornaMetodos() {
    var txt=document.URL.split("//");
    var path=txt[1].split("/");
    return path[3];
}
function controller() {
    var txt=document.URL.split("//");
    var path=txt[1].split("/");
    return path[2];
}

function getTitle() {
    if(retornaMetodos()!=undefined)
    document.title='ONYX | '+retornaMetodos().toLocaleLowerCase();
}

function geraInput(i) {
    var html='<div class="col-md-3"> <span>'+i+'º Vértice</span><div class="form-group block3"> <div class="form-group   has-feedback"> <label class="col-md-1 control-label">Longitude</label> <input type="text" class="form-control log-ponto'+i+'" name="log-ponto'+i+'"/> </div> </div> <div class="form-group block3"> <div class="form-group   has-feedback"> <label class="col-md-1 control-label">Latitude</label> <input type="text" class="form-control lat-ponto'+i+'" name="lat-ponto'+i+'"/> </div> </div><div class="form-group"> <label class="col-md-1 control-label"></label> <button type="button" class="btn btn-sm  btn-primary btn-capturar-v'+i+'">Capturar</button> </div> </div>';
    return html;
}

function attrDesabilitado() {
    $('.lat-ponto1,.log-ponto1,.desc-ponto1,.btn-capturar-ponto1').attr('disabled',false);
    $('.lat-ponto2,.log-ponto2,.desc-ponto2,.btn-capturar-ponto2,.lat-ponto3,.log-ponto3,.desc-ponto3,.btn-capturar-ponto3,.lat-ponto4,.log-ponto4,.desc-ponto4,.btn-capturar-ponto4').attr('disabled',true);
}

function numeros(e){
    var tecla = (window.event)?event.keyCode:e.which;
    if((tecla > 47 && tecla <58)) return true;
    else{
        if(tecla == 8 || tecla == 0) return true;
        else return false;
    }
}

function numEntradaAdmin() {
    $.get(URL+'processo/numEntradaAdmin',{'id':$('.id_user').attr('id_user')},function (x) {
        $('.numEntAdmin').text(x);
    });
}

function numEntradaSec() {
    $.get(URL+'processo/numEntradaSec',{'id':$('.id_user').attr('id_user')},function (x) {
        $('.numEntSec').text(x);
    });
}

function listarDocumento() {
    $.get(URL+'documento/listar',function (x) {
        var html='';
        var cont=0;
        for (i in x)
        {
            cont+=1;
            html+='<tr class="odd gradeX">';
            html+='<td>'+cont+'</td>';
            html+='<td>'+x[i]._nome+'</td>';
            html+='<td>'+x[i]._descricao+'</td>';
            html+='<td class="text-center">';
            html+='<p>';
            html+='<a title="Eliminar" href="#modal-confirm-eliminar" data-toggle="modal" idDocumento="'+x[i]._id+'" class="btn-eliminar-doc btn-danger btn-icon btn-sm"><i class="fa fa-trash"></i></a>';
            html+='<a title="Editar" href="'+URL+controller()+'/editarDocumento/'+btoa(x[i]._id)+'" class="btn-primary btn-icon btn-sm m-l-2"><i class="fa fa-edit"></i></a>';
            html+='</p></td></tr>';
        }
        $('.tboby-documento').html(html);
    },'json');
}

function listarDepartamento() {
    $.get(URL+'departamento/listar',function (x) {
        var html='';
        var cont=0;
        for (i in x)
        {
            cont+=1;
            html+='<tr class="odd gradeX">';
            html+='<td>'+cont+'</td>';
            html+='<td>'+x[i]._perfil+'</td>';
            html+='<td>'+x[i]._descricao+'</td>';
            html+='<td class="text-center">';
            html+='<p>';
            html+='<a title="Eliminar" href="#modal-confirm-eliminar" data-toggle="modal" idDepartamento="'+x[i]._id+'" class="btn-eliminar-depa btn-danger btn-icon btn-sm"><i class="fa fa-trash"></i></a>';
            html+='<a title="Editar" href="'+URL+controller()+'/editarDepartamento/'+btoa(x[i]._id)+'" class="btn-primary btn-icon btn-sm m-l-2"><i class="fa fa-edit"></i></a>';
            html+='</p></td></tr>';
        }
        $('.tboby-departamento').html(html);
    },'json');
}

function listarGrupo(id) {
    $.get(URL+'grupo/listarTodosGrupos',function (x) {
        var html='';
        var cont=0;
        for (i in x)
        {
            cont+=1;
            if(x[i].id==id)
                html+='<tr class="odd gradeX" id="tr'+id+'">';
            else
                html+='<tr class="odd gradeX" id="">';
            html+='<td>'+cont+'</td>';
            html+='<td>'+x[i].grupo+'</td>';
            html+='<td>'+x[i].departamento+'</td>';
            html+='<td>'+x[i].sigla+'</td>';
            html+='<td class="text-center">';
            html+='<p>';
            html+='<a title="Eliminar" href="#modal-confirm-eliminar" data-toggle="modal" idGrupo="'+x[i].id+'" class="btn-eliminar-grupo btn-danger btn-icon btn-sm"><i class="fa fa-trash"></i></a>';
            html+='<a title="Editar" href="'+URL+controller()+'/editarGrupo/'+btoa(x[i].id)+'" class="btn-primary btn-icon btn-sm m-l-3"><i class="fa fa-edit"></i></a>';
            html+='</p></td></tr>';
        }
        $('.tboby-grupo').html(html);
    },'json');
}

// function elvio() {
//     var data=$('.data-prev,.data-next').val().split(" ");
//     $('.data-prev,.data-next').val(data[0]);
// }
