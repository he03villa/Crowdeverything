$(document).ready(function(){
    $('#aceptar_publicar').click(function(e){
        e.preventDefault();
        var data = $('#publica').serialize();
        var url = $('#publica').attr('action');
        $.ajax({
            type: 'put',
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res) {
                if (res == 1) {
                 swal("Good job!", "El proyecto se publico correctamente", "success");   
                }
            }
        });
    });

    $('#activar').click(function(){
        var data = $('#publi').serialize();
        var url = $('#publi').attr('action');
        $.ajax({
            type: 'put',
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res){
                if (res == 1) {
                    swal("Good job!", "El usuario se activo con exito", "success");
                }
            }
        });
    });

    $('#desactivar').click(function(){
        var data = $('#publi').serialize();
        var url = $('#publi').attr('action');
        $.ajax({
            type: 'put',
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res){
                if (res == 1) {
                    swal("Good job!", "El usuario se desactivo con exito", "success");
                }
            }
        });
    });

    $('#table').DataTable();
});