$(function () {
    var ubica = $("#ubicacion").val();
    var datos = {
        'tipoOrigen': 'php',
        'rutaObjeto': sUrlP + 'listarExistenciaSucursal',
        'parametro': 'ubicacion=' + ubica,
    };
    var datos2 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP + 'listarExistenciaSucursalDetalle'};
    $("#reporte").dtgrid(datos, {
        'oculto': [1, 2, 3, 6],
        'titulo': 'Existencia En Sucursal',
        'clase': "white-text brown darken-2",
        'detalle': {
            'tipo': 'dtgrid',
            "origen": datos2,
            'config': {
                "titulo": "Detalle",
                'oculto': [4],
                "accion": [{
                    "ejecuta": sUrlP + 'consolidarProducto',
                    "tipo": "php",
                    "clase": "mdi-navigation-check",
                    "ocultar": true,
                    "parametro":[4]
                }]
            },
            'parametro': [3, 6]
        }
    });
});

function consolidar(){
    $.ajax({
        url: sUrlP + "historialconsolidarProducto",
        success: function (respuesta) {
            alert(respuesta);
        }
    });
}