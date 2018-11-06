$(document).ready(function(){
    $('#aceptar_publicar').click(function(){
        var data = $('#publica').serialize();
        var url = $('#publica').attr('action');
        var put = $('#publica').attr('method');
        swal(url);
    });
});