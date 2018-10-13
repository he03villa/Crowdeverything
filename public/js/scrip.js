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
            "<input type='text' class='form-control' name='nombre[]' id='re' placeholder='Nombre "+ x +"'>"+
            "<input type='number' class='form-control' name='recurso[]' id='re' placeholder='Recurso "+ x +"'>"+
            "<select class='form-control' name='tipo[]'>"+
                "<option>Seleccione el tipo de recurso</option>"+
                contenido+
            "</select>"+
        "</div>"
    );
    x++;
}

function fotos(){
    $('#res-foto').append(
        "<div class='form-group'>"+
            "<label for='im'>Imagen "+ y +"</label>"+
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
            "<input type='text' class='form-control' id='re' name='url[]' placeholder='Url "+ z     +"'>"+
            "<select class='form-control' name='redes[]'>"+
                "<option>Seleccione la red social</option>"+
                contenido+
            "</select>"+
        "</div>"
    );
    z++;
}