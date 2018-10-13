$(document).ready(function(){
    $('.chart').easyPieChart({
        size: 90,
        barColor: '#80ff80',
        scaleColor: false,
        lineWidth: 15,
        trackColor: '#373737',
        lineCap: 'circle',
        animate: 3500
    });
    actualizar();
    eliminar();
});

function actualizar(){
    $('#actualizar').click(function(){
        swal('Good job!', 'La  informacion se actualizo', 'success');
    });
}

function eliminar(){
    $('#eliminar').click(function(){
        swal('Good job!', 'La  informacion se elimino', 'success');
    });
}