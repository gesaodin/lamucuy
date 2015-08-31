$(function() {
    listarAlmacen();
    $('select').material_select();
    $('.parallax').parallax();
    $('.datepicker').pickadate({
        labelMonthNext: 'Sig. Mes',
        labelMonthPrev: 'Ant. Mes',
        labelMonthSelect: 'Seleccione un mes',
        labelYearSelect: 'Select a year',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        selectYears:20,
        selectMonths:true,
        format:'yyyy-mm-dd'
    });

});

function listarAlmacen() {
    var sUrlA = sUrl + '/index.php/fisico/almacen/';
    $.ajax({
        url : sUrlA + 'listarComboAlmacen',
        dataType : 'JSON',
        success : function(json) {
            $.each(json, function(item, valor) {
                $("#ubic").append(new Option(valor, item, false, true));
            });
        }
    });
}

function resumen(){
    var ubic = $("#ubic").val();
    var fech = $("#fech").val();
    if(fech == ''){
        alert("Debe ingresar la Fecha del resumen diario");
        return false;
    }
    var datos4 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'dtgridresumenDiario','parametro':'ubic='+ubic+'&fech='+fech};
    var datos5 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'DetalleResumenDiario'};
    var datos6 = {'tipoOrigen': 'php', 'rutaObjeto': sUrlP+'Detalle2ResumenDiario'};
    $("#reporte").dtgrid(datos4, {
        'titulo': "Resumen de movimientos diarios",
        'clase':"white-text brown darken-2",
        'oculto':[8,9],
        "enlace":[{"columna":"1","url":sUrlP+'pedidoID',"target":"_blank","codeigniter":true}],
        'detalle': {
            'tipo': 'dtgrid',
            "origen": datos5,
            'config': {
                "titulo":"",
                'clase':"white-text brown",
                'oculto':[1,2,3,6,7,8],
                'detalle': {
                    'tipo': 'dtgrid',
                    "origen": datos6,
                    'config': {
                        "titulo":"Detalle",
                        'clase':"white-text brown lighten-3"
                    },
                    'parametro': [3,6,7,8]
                }

            },
            'parametro': [7,8,9]}
        //'accion':[{'ejecuta':sUrlP+"Aceptar_Deposito2",'parametro':[1],"texto":"Procesar",'tipo':"php","ocultar":true,"clase":"mdi-content-mail"}]
    });
}
