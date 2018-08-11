/**
 * Created by elviosadoc on 20/12/16.
 */
$(this).ready(function () {

    $('.btn-ativar-btn-foto').click(function (e) {
        e.preventDefault();
        $('.image-perfil-usr').css({
            'opacity': 0.2
        });
    })
    path_img_perfil = [];
    $('.control-buttons').on('click', '.btn-negar', function () {
        var btns = '<span title="Carregar uma foto apartir do Computador" class="btn btn-primary btn-sm m-r-5 fileinput-button btn-upload"> <i class="fa fa-upload"></i> <input type="file" accept="image/*" name="image" id="image" class="input-xs form-control"> </span> <a href="javascript:;"  style="border-radius: 4px" class="btn btn-white btn-sm" title="Usar a Camera"><i class="fa fa-camera"></i></a>';
        $('.image-perfil-usr').css({'opacity': 0.2}).fadeIn(1000).attr('src', path_img_perfil[0]);
        $('.control-buttons').fadeIn(1000).html(btns)
    });

    $('.control-buttons').on('click', '.btn-aceitar', function () {
        if(formData)
        {
            $.ajax({
                url:URL+'utilizador/actualizarFoto',
                type:'POST',
                data:formData,
                processData:false,
                contentType:false,
                success:function (x) {
                    if(x==1)
                    {
                        $('#modal-captura-imagem-perfil').modal('hide');
                        $('.txt-ij').fadeIn(1000).attr('src',path_img_perfil[1]);
                    }
                }
            });
        }
    });

    function previsualizarImagemCarregada(src) {
        path_img_perfil[0] = $('.image-perfil-usr').attr('src');
        var btns = '<span class="btn btn-success btn-sm m-r-5 btn-aceitar"  title="Confirmar"><i class="fa fa-check"></i></span> <a href="javascript:;"  style="border-radius: 4px" class="btn btn-danger btn-sm btn-negar" title="Cancelar"><i class="fa fa-times"></i></a>';
        var span = document.getElementById('image-span'),
            img = document.createElement('img');
        img.src = src;
        img.setAttribute('class', 'img-thumbnail image-perfil-usr');
        img.setAttribute('style', 'width: 206px');
        img.setAttribute('style', 'height: 206px');

        $('.image-perfil-usr').css({
            'opacity': 1
        });
        $('.image-perfil-usr').fadeIn(1000).attr('src', src);
        path_img_perfil[1]=$('.image-perfil-usr').attr('src');
        $('.control-buttons').fadeIn(1000).html(btns);
    }//funcao responsável por readerizar a imagem carregada

    $('body').on('change', '#image', function (s) {
        var tam = this.files.length, file, i = 0, reader;
        for (; i < tam; i++) {
            file = this.files[i];
            if (window.FileReader) {
                reader = new FileReader();
                reader.onloadend = function (e) {
                    previsualizarImagemCarregada(e.target.result, file.fileName);
                };
                reader.readAsDataURL(file);
            }

            if (formData) {
                formData.append('img_perfil', file);
            }

        }

    });
    //fim do script para upload


    //area definida para utilizacao da web cam
    $('.btn-web-cam').click(function () {
        var btns = '<a href="javascript:;" class="btn btn-primary btn-sm m-r-5"  title="Capturar" onClick="webcam.freeze()"><i class="fa fa-camera-retro"></i></a> <a href="javascript:;"  style="border-radius: 4px" class="btn btn-success btn-sm m-r-5" title="Salvar"><i class="fa fa-save"></i></a>  <a href="javascript:;"  style="border-radius: 4px" class="btn btn-default btn-sm m-r-5" title="Reset"><i class="fa fa-refresh" onClick="webcam.reset()"></i></a> <a href="javascript:;"  style="border-radius: 4px" class="btn btn-danger btn-sm btn-negar" title="Cancelar"><i class="fa fa-times"></i></a>';
        $('.image-perfil-usr').remove();
        webcam.set_hook( 'onComplete', 'my_completion_handler' );
        $('#image-span').html(webcam.get_html(206, 206));
        webcam.set_api_url( URL+'views/fotos/upload.php' );
        webcam.set_quality( 90 ); // JPEG quality (1 - 100)
        webcam.set_shutter_sound( true ); // play shutter click sound
        $('.control-buttons').fadeIn(1000).html(btns);
    });

    function my_completion_handler(msg) {
        // extract URL out of PHP output
        if (msg.match(/(http\:\/\/\S+)/)) {
            var image_url = RegExp.$1;
            // show JPEG image in page
            document.getElementById('upload_results').innerHTML =
                '<h1>Upload Successful!</h1>' +
                '<h3>JPEG URL: ' + image_url + '</h3>' +
                '<img src="' + image_url + '">';

            // reset camera for another shot
            webcam.reset();
        }
        else alert("PHP Error: " + msg);
    }
});