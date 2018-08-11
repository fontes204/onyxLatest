/**
 * Created by elviosadoc on 29/12/16.
 */
$(this).ready(function () {
    $('.esconder-radio').hide();
    URL='/onyx/';
    idDepa=0;

    //efectuar login
    $('.frm-login').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            switch (x)
            {
                case "Chefe do Gabinete":
                    window.location=URL+'chefeGabAdmin';
                    break;
                case 'Secretario':
                    window.location=URL+'secretariaGeral';
                    break;
                case 'SDMGUUC':
                    window.location=URL+'sdmguuc';
                    break;
                case 'Director':
                    window.location=URL+'dmguuc';
                    break;
                case 'Administrador':
                    window.location=URL+'administrador';
                    break;
                case 'Chefe':
                    window.location=URL+'crguuc';
                    break;
                case 'Tecnico':
                    window.location=URL+'tecnico';
                    break;
                case '1975':
                    window.location=URL+'sysadmin';
                    break;
                case 'Reparticao de Urbanismo, Urbanistica e Cadastro':
                    window.location=URL+'crguuc';
                    break;
                case 'Admin TI':
                    window.location.href=URL+'super';
                    break;
                case '0':
                        $('.erro-login').html('Utilizador ou senha estão incorrectos');
                    break;
                case '-1':
                        $('.calback-login-front-end').modal('show');
                    break;
            }
        });
    });

    //limpar os campos do formulário de login
    $('.txt-clear').keypress(function () {
        $('.erro-login').html('&nbsp;');
    });
});