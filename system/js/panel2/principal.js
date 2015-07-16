$(function() {
    var datos4 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'listar_pedidos_pendientes2','parametro':'estatus=0&panel=1'};
    var datos5 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'Detalle_Orden2'};
    $("#reporte").dtgrid(datos4, {
        'titulo': "Ventas Realizadas",
        'clase':"white-text brown darken-2",
        'oculto':[5],
        'detalle': {'tipo': 'dtgrid', "origen": datos5, 'config': {"titulo":"Detalle"}, 'parametro': [1]},
        'accion':[{'ejecuta':sUrlP+"Aceptar_Deposito2",'parametro':[1],"texto":"Procesar",'tipo':"php","ocultar":true,"clase":"mdi-content-mail"}]
    });

});

function listar_pendientes(){
    var datos = "estatus=0&panel=1";
    $("#resp1").html('');

    $.ajax({
        url : sUrlP + "listar_pedidos_pendientes",
        data: datos,
        type : "POST",
        dataType : "json",
        success : function(json) {//alert(json);
            if(json['resp']==1){
                var Grid1 = new TGrid(json, 'resp1','Pedidos Pendientes por Depositar');
                Grid1.SetNumeracion(true);
                Grid1.SetName("PDepositar");
                Grid1.SetDetalle();
                Grid1.Generar();
            }else $("#resp1").html("No posee Pedidos Pendientes por Depositar");
        }
    });
}