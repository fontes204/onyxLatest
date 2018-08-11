/**
 * Created by elviosadoc on 12/10/16.
 */
$(this).ready(function () {
    ROOT='/GESTERRA/';
    $('.btn-voltar').click(function (e) {
        e.preventDefault();
        window.location=history.go(true);
    });
});