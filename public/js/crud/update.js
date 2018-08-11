/**
 * Created by elviosadoc on 23/04/17.
 */
$(this).ready(function () {

    $('.lnk-edit-nome').click(function () {
        $('.nomeRequerente').val($(this).attr('nome'));
    });
    $('.lnk-edit-data').click(function () {
        var data=$(this).attr('data').split('-').reverse().join('/');
        $('.idadeRequerente').val(data);
    });
});