var productos = new Array();
$(document).ready(function () {
    $("#carro_mini").load(sUrlC + "ver_carro_mini");
    menuLateral();
    $("#agregar_producto").dialog({
        modal: true,
        autoOpen: false,
        hide: 'explode',
        show: 'slide',
        position: {my: "center top", at: "center top+10%", of: top},
        buttons: {
            "Cerrar": function () {
                $(this).dialog("close");
            }
        }
    });
    $("#galeria").dialog({
        modal: true,
        autoOpen: false,
        hide: 'explode',
        show: 'slide',
        width: 600,
        height: 400,
        buttons: {
            "Cerrar": function () {
                $(this).html('');
                $(this).dialog("close");
            }
        }
    });
    $("#soloDet").dialog({
        modal: true,
        autoOpen: false,
        hide: 'explode',
        show: 'slide',
        width: 600,
        height: 400,
        buttons: {
            "Cerrar": function () {
                $(this).dialog("close");
            }
        }
    });
});

function agregar(id, seri, lote, ubic) {


    var ident = id + '_' + seri + '_' + lote + '_' + ubic;

    var ident_a = id + seri + lote + ubic;
    var cantidad_actual = $("#cantidad_actual").html();

    if (cantidad_actual == undefined) cantidad_actual = 0;


    var cant = parseInt($("#cantidad" + ident_a).val()); //+ parseInt(cantidad_actual);
    //$("#cantidad" + id).val('');
    if (cant == '' || cant < 1) {
        alert("Debe ingresar la cantidad de su pedido");
        return false;
    }
    var datos = new FormData();

    datos.append('id', ident);
    datos.append('cantidad', cant);
    //alert(id);
    datos.append('precio', productos[ident_a].cdet);
    datos.append('nombre', productos[ident_a].nomb);
    //alert(1);
    $.ajax({
        url: sUrlC + "agregar",
        type: "POST",
        data: datos,
        contentType: false,
        processData: false,
        cache: false,
        success: function (respuesta) {

            $("#carro_mini").load(sUrlC + "ver_carro_mini");
            $("#agregar_producto").html(respuesta);
            //$("#agregar_producto").load(sUrlC + "listar");
            $("#agregar_producto").dialog("open");

        }

    });
}

function modificar() {
    $.post(sUrlC + "actualizar", $("#frmModifica").serialize(), function (res) {
        $("#carro_mini").load(sUrlC + "ver_carro_mini");
        $("#estcorp-contenedor-medio-productos").load(sUrlC + "listar");
        alert("Se modifico con exito");
    });

}

function quitar_carrito(id) {
    $.post(sUrlC + "quitar", "id=" + id, function (res) {
        $("#carro_mini").load(sUrlC + "ver_carro_mini");
        $("#estcorp-contenedor-medio-productos").load(sUrlC + "listar");
    });


}

function menuLateral() {
    var div_menu = document.getElementById("cssmenu");
    var ul = document.createElement("ul");
    div_menu.appendChild(ul);
    var li = document.createElement("li");
    ul.appendChild(li);
    var span = document.createElement("span");
    span.innerHTML = "Categorias";
    span.className = "categorias";
    //li.appendChild(span);
    for (var i = 0; i < Esq_menu.length; i++) {
        var img = document.createElement("img");
        img.src = sImg + "/categoria/medio/" + Esq_menu[i].imag;
        img.className = "img-responsive";

        img.style.cssText = "padding:10px;";
        //alert('Oid: ' + Esq_menu[i].oid + ' cat: ' + Esq_menu[i].nomb);
        var sli = document.createElement("li");
        ul.appendChild(sli);
        var senlace = document.createElement("a");
        senlace.id = Esq_menu[i].oid;
        //senlace.href=sUrlC + "galeriaProductos/"+Esq_menu[i].oid;
        senlace.href = "#";
        senlace.onclick = function () {
            mostrarCategoria(this.id);
        };
        sli.appendChild(senlace);
        var sspan = document.createElement("span");
        sspan.innerHTML = Esq_menu[i].nomb;
        senlace.appendChild(img);
        //senlace.appendChild(sspan);
    }
}

function mostrarCategoria(id) {
    //alert(sUrlC + "galeriaProductoAjax/");
    //$("#cssmenu").hide();
    options = {};
    $("#cssmenu").effect('drop', options, 500);
    $("#main-container").show();
    $("#main-container").load(sUrlC + "galeriaProductoAjax/" + id, function () {
        $(".product").each(
            function (i) {
                var cadena = $("#des" + this.id).text();
                valores = JSON.parse(cadena);
                productos[this.id] = valores;
                var Descripcion = valores.nomb
                    + "<br><span>Bs:" + valores.cdet + "</span>"
                    + "<br><b id='total"+this.id+"'>" + valores.disp + "</b>";
                $("#det" + this.id).html(Descripcion);
                //alert(Descripcion);
            });
    });
}

function mostrarMenuCategoria() {
    $("#main-container").hide();
    $("#cssmenu").removeAttr("style").hide().fadeIn();
}

function realizar_pedido() {
    /*$.post(sUrlC + "realizarPedido", "", function (res) {
        alert(res);
        $("#estcorp-contenedor-medio-productos").load(sUrlC + "listar");
    });*/
    var debito =$("#tot_debito").val();
    var efectivo =$("#tot_efectivo").val();
    var sistema =$("#tot_sistema").val();
    if(debito == '' || efectivo == '' || sistema == '' ){
        alert("Debe ingresar todos los totales.");
        return false;
    }
    var datos = new FormData();

    datos.append('debito', debito);
    datos.append('efectivo', efectivo);
    datos.append('sistema', sistema);
    $.ajax({
        url: sUrlC + "realizarPedido",
        type: "POST",
        data: datos,
        contentType: false,
        processData: false,
        cache: false,
        success: function (res) {
            alert(res);
            $("#estcorp-contenedor-medio-productos").load(sUrlC + "listar");

        }

    });
    $.ajax({
        url: sUrlC + "LimpiarCarrito",
        success: function (respuesta) {
            $("#carro_mini").load(sUrlC + "ver_carro_mini");
        }
    });

}

function carga_galeria(oidp) {
    alert(oidp);
    $("#agregar_producto").html("");

    $("#agregar_producto").load(sUrlC + "galeria/" + oidp);
    $("#agregar_producto").dialog("open");
}

/*
funcion para calcular la cantidad vendida ingresando la cantidad que queda en el inventario
 */
function calcularCantidad(id){
    var element = id.split('_');
    $("#cantidad"+element[1]).val($("#total"+element[1]).text() - $("#"+id).val());
}
