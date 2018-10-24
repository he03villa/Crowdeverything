$(document).ready(function(){
    $('#aceptar_fin').click(function(){
        var data = $('#financiero').serialize();
        var url = $('#financiero').attr('action');
        var post = $('#financiero').attr('method');
        $.ajax({
            type: post,
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res){
                if (res == 1) {
                    swal("Error", "Escoja la donacion", "error");
                } else {
                    if (res == 2) {
                        swal("Error", "Ingrese la cantidad", "error");
                    } else {
                        if (res == 3) {
                            swal("Error", "La donación se excede la solicitada", "error");
                        } else{
                            if (res == 4) {
                                swal("Good job!", "La donacion ya fue regitrada con exito", "success");
                            }
                        }
                    }
                }
            }
        });
    });

    $('#aceptar_ma').click(function(){
        var data = $('#materia').serialize();
        var url = $('#materia').attr('action');
        var post = $('#materia').attr('method');
        $.ajax({
            type: post,
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res){
                if (res == 1) {
                    swal("Error", "Escoja la donacion", "error");
                } else {
                    if (res == 2) {
                        swal("Error", "Ingrese la cantidad", "error");
                    } else {
                        if (res == 3) {
                            swal("Good job!", "La donacion ya fue regitrada con exito", "success");
                        }
                    }
                }
            }
        });
    });

    $('#aceptar_tale').click(function(){
        var data = $('#talento').serialize();
        var url = $('#talento').attr('action');
        var post = $('#talento').attr('method');
        $.ajax({
            type: post,
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res){
                if (res == 1) {
                    swal("Error", "Escoja la donacion", "error");
                } else {
                    if (res == 2) {
                        swal("Error", "Ingrese la cantidad", "error");
                    } else {
                        if (res == 3) {
                            swal("Good job!", "La donacion ya fue regitrada con exito", "success");
                        }
                    }
                }
            }
        });
    });
});