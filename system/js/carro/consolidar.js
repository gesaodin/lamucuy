$(function() {
    var ubica= $("#ubicacion").val();
    var datos = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'listarExistenciaSucursal','parametro':'ubicacion='+ubica};
    var datos2 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'listarExistenciaSucursalDetalle'};
    $("#reporte").dtgrid(datos,{
        'oculto':[1,2,3,6],
        'titulo':'Existencia En Sucursal',
        'clase':"white-text brown darken-2",
        'detalle':{'tipo':'dtgrid', "origen": datos2, 'config': {"titulo":"Detalle",'oculto':[1,3,4]}, 'parametro': [3,6]}
    });

    /*var datos4 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'listar_pedidos_pendientes2','parametro':'estatus=0&panel=1'};
    var datos5 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'Detalle_Orden2'};
    $("#reporte").dtgrid(datos4, {
        'titulo': "Ventas Realizadas",
        'clase':"white-text brown darken-2",
        'oculto':[5],
        'detalle': {'tipo': 'dtgrid', "origen": datos5, 'config': {"titulo":"Detalle"}, 'parametro': [1]},
        'accion':[{'ejecuta':sUrlP+"Aceptar_Deposito2",'parametro':[1],"texto":"Procesar",'tipo':"php","ocultar":true,"clase":"mdi-content-mail"}]
    });*/

});