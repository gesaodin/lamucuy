$(function() {
    resumen();
});

function resumen(){
    var oid = $("#oid").val();

    if(oid == 0){
        alert("No existe resumen de venta");
        return false;
    }
    var datos4 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'resumenPedido','parametro':'oid='+oid};

    $("#reporte").dtgrid(datos4, {
        'titulo': "Resumen de Venta",
        'clase':"white-text brown darken-2"
    });
}