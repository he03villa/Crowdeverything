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
                            swal("Error", "La donación se excede la solicitada", "error");
                        } else {
                            if (res == 4) {
                                swal("Good job!", "La donacion ya fue regitrada con exito", "success");
                            }
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
                            swal("Error", "La donación se excede la solicitada", "error");
                        } else {
                            if (res == 4) {
                                swal("Good job!", "La donacion ya fue regitrada con exito", "success");
                            }
                        }
                    }
                }
            }
        });
    });

    $('#aceptar_recur').click(function(){
        var data = $('#recur').serialize();
        var url = $('#recur').attr('action');
        var post = $('#recur').attr('method');
        $.ajax({
            type: post,
            url: url,
            data: data,
            dataTy: 'json',
            success: function(res){
                if (res == 1) {
                    swal("Error", "Escoja el tipo de recurso", "error");
                } else {
                    if (res == 2) {
                        swal("Error", "Ingrese el costo", "error");
                    } else {
                        if (res == 3) {
                            swal("Error", "Ingrese el nombre del recurso", "error");
                        } else {
                            if (res == 4) {
                                swal("Error", "Ingrese el costo", "error");
                            } else {
                                if (res == 5) {
                                    swal("Good job!", "El recurso se ingreso exitosamente", "success");
                                } else {
                                    if (res == 6) {
                                        swal("Good job!", "El recurso se ingreso exitosamente", "success");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
    });
});