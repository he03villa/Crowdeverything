var x = 1
var y = 1
var z = 1

function ShowImagePreview(imageUplodear, previewimage) {
    if (imageUplodear.files && imageUplodear.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(previewimage).attr('src', e.target.result);
        }
        reader.readAsDataURL(imageUplodear.files[0]);
    }
}

function recursos(recur){
    var contenido = "";

    for(var i = 0; i < recur.length; i++){
        contenido += '<option>'+ recur[i]["nombre"] +'</option>';
    }

    $('#res-recurso').append(
        "<div class='form-group'>"+
            "<label for='re'>Recurso "+ x +"</label>"+
            "<select class='form-control' name='tipo[]' id='opcion"+x+"' onchange='cambioOpciones("+x+")'>"+
                "<option>Seleccione el tipo de recurso</option>"+
                contenido+
            "</select>"+
            "<input type='hidden' name='id[]' value=0>"+
            "<div id='op"+x+"'></div>"+
        "</div>"
    );
    x++;
}

function fotos(){
    $('#res-foto').append(
        "<div class='form-group'>"+
            "<label for='im'>Imagen "+ y +"</label>"+
            "<input type='hidden' name='foto_id[]' value=0>"+
            "<input type='file' class='form-control' id='im' name='foto[]'>"+
        "</div>"
    );
    y++;
}

function rede(rede){
    var contenido = "";

    for(var i = 0; i < rede.length; i++){
        contenido += '<option>'+ rede[i]["nombre"] +'</option>';
    }

    $('#res-redes').append(
        "<div class='form-group'>"+
            "<label for='re'>Redes social "+ z +"</label>"+
            "<select class='form-control' name='redes[]'>"+
                "<option>Seleccione la red social</option>"+
                contenido+
            "</select>"+
            "<input type='hidden' name='redes1[]' value=0>"+
            "<input type='text' class='form-control' id='re' name='url[]' placeholder='Url "+ z     +"'>"+            
        "</div>"
    );
    z++;
}

function cambioOpciones(x){
    var cambiar = document.getElementById('opcion'+x);
    var opcion = cambiar.value;
    if (opcion == 'Financiero') {
        $('#op'+x).empty();
        $('#op'+x).append(
            "<input type='number' class='form-control' name='recurso[]' id='re' placeholder='Cantidad "+ x +"'>"
        );
    } else {
        if (opcion == 'Materia prima') {
            $('#op'+x).empty();
            $('#op'+x).append(
                "<input type='text' class='form-control' name='nombre[]' id='re' placeholder='Nombre "+ x +"'>"+
                "<input type='number' class='form-control' name='recurso[]' id='re' placeholder='Cantidad "+ x +"'>"
            );
        } else {
            if (opcion == 'Talento humano') {
                $('#op'+x).empty();
                $('#op'+x).append(
                    "<input type='text' class='form-control' name='nombre[]' id='re' placeholder='Nombre "+ x +"'>"+
                    "<input type='number' class='form-control' name='recurso[]' id='re' placeholder='Talento humano "+ x +"'>"
                );
            } else {
                if (opcion == 'Seleccione el tipo de recurso') {
                    $('#op'+x).empty();
                }
            }
        }
    }
}

function cambioOpcion(){
    var cambiar = document.getElementById('opcion');
    var opcion = cambiar.value;
    if (opcion == 'Financiero') {
        $('#op').empty();
        $('#op').append(
            "<input type='number' class='form-control' name='recurso' id='re' placeholder='Cantidad "+ x +"'>"
        );
    } else {
        if (opcion == 'Materia prima') {
            $('#op').empty();
            $('#op').append(
                "<input type='text' class='form-control' name='nombre' id='re' placeholder='Nombre "+ x +"'>"+
                "<input type='number' class='form-control' name='recurso' id='re' placeholder='Cantidad "+ x +"'>"
            );
        } else {
            if (opcion == 'Talento humano') {
                $('#op').empty();
                $('#op').append(
                    "<input type='text' class='form-control' name='nombre' id='re' placeholder='Nombre "+ x +"'>"+
                    "<input type='number' class='form-control' name='recurso' id='re' placeholder='Talento humano "+ x +"'>"
                );
            } else {
                if (opcion == 'Seleccione el tipo de recurso') {
                    $('#op').empty();
                }
            }
        }
    }
}