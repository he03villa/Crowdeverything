$(document).ready(function(){
    $('#aceptar_publicar').click(function(){
        var data = $('#publica').serialize();
        var url = $('#publica').attr('action');
        $.ajax({
            type: 'put',
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res) {
                if (res == 1) {
                    swal("Error", "Ingrese la fechas", "error");
                } else {
                    if (res == 2) {
                        swal("Error", "La fecha final es menor que la fecha inicial", "error");
                    } else {
                        if (res == 3) {
                            swal("Good job!", "El proyecto se publico correctamente", "success");
                        }
                    }
                }
            }
        });
    });
});