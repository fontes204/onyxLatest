/**
 * Created by elviosadoc on 20/06/17.
 */
$(this).ready(function () {

    $('.form-add-administracao').submit(function (e) {
        e.preventDefault();
        //
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            alert(x);
        });
    });
});