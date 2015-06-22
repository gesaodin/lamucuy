<?php $this -> load -> view("fisico/incluir/cabecera"); ?>
<?php $this -> load -> view("fisico/incluir/cuerpo"); ?>
<div class="center_left">
  <div class="title">
    Bienvenido al sistema de Almacén
  </div>
  <br>
  <a href='#' onclick='listarOrdenDespacho()'>Ordenes de Despacho</a> | <a href='#' onclick='listarOrdenEntrega()'>Órdenes de Entrega</a>
   | <a href='#' onclick='listarValuacion()'>Valuación de Productos</a>
  <br>
  <br>
  <table border=0 style="width: 600px">
    <tr id="tablaProductos" style="display: none">
      <td valign="top">Productos:</td>
      <td ><select id="producto" style="width: 400px; height: 22px"></select></td>
      <td><a href="#" onclick="listarPorProducto()" >Consultar Producto </a></td>
    </tr>
  </table>
  <br>
  <div id='reporte' style='width: 800px'></div>
</div>

<?php $this -> load -> view("fisico/incluir/pie"); ?>