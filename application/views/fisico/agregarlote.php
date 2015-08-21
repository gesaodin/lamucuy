<?php $this -> load -> view("fisico/incluir/cabecera"); ?>
<?php $this -> load -> view("fisico/incluir/cuerpo"); ?>
<div class="center_left">
  <div class="title">
    Bienvenido agregar producto por lote y/o caja
  </div>
  <td colspan="6" align="justify">
  <p>
    <div id='frmAlmacen'>
      <table border=0>

        <tr>
          <td valign="top">Productos:</td>
          <td colspan="5"><select id="producto" style="width: 590px; height: 22px" class="login_input" onchange="cargar();"></select></td>
        </tr>

        <tr>
          <td valign="top">Factura:</td>
          <td colspan="1" valign="bottom">
          <input type="text" id="factura" class="login_input" value='0' >&nbsp;
          </td>
          <td valign="top">Marca:</td>
          <td>
            <input type="text" id="marca" class="login_input" value='CHOCOLATES' placeholder="MARCA">
          </td>
        </tr>

        <tr>
          <td valign="top">Tipo:</td>
          <td>
            <input type="text" id="modelo" class="login_input" value='CHOCOLATES'>
          </td>
          <td valign="top">Proveedor:</td>
          <td colspan="3">
          <input type="text" id="proveedor" class="login_input" style="width: 358px" value='CHOCOLATES LA MUCUY'>
          </td>

        </tr>
        
        <tr>
          <td valign="top">Precio P.:</td>
          <td>
            <input type="text" id="compra" class="login_input" readonly="true">
          </td>
          <td valign="top">Descripción:</td>
          <td colspan="3">
          <input type="text" id="descripcion" class="login_input" style="width: 358px" readonly="true" placeholder="Descripcion">
          </td>

        </tr>

        <tr>
          <td valign="top">Cod. Lote:</td>
          <td>
            <input type="text" id="lote" class="login_input" placeholder="Codigo de lote">
          </td>
          <td valign="top">Detal:</td>
          <td>
          <input type="text" id="detal" class="login_input" readonly="true">
          </td>
          <td valign="top">Mayor:</td>
          <td>
          <input type="text" id="mayor" class="login_input" readonly="true">
          </td>
        </tr>

        <tr>
          <td valign="top">Cantidad:</td>
          <td>
            <input type="text" id="cantidad" class="login_input">
          </td>
          <td valign="top">Serial:</td>
          <td colspan="3">
            <input type="text" id="serial" class="login_input" style="width: 358px">
          </td>
        </tr>

        <!--<td valign="top">Observación:</td>
        <td colspan="3">
          <input type="text" id="observacion" class="login_input" style="width: 358px" >
        </td>-->


        <tr>
          <td valign="top">F. Entrada:</td>
          <td>
            <input type="date" id="fechaEntrada" class="login_input">
          </td>
          <td valign="top">Ubicación:</td>
          <td colspan="3">
            <select id="ubicacion" style="width: 358px; height: 22px"></select>
          </td>

        </tr>



        <tr>
          <td valign="top">Observación:</td>
          <td colspan="3">
            <textarea rows="5" cols="8" id="observacion" style="width: 390px"
                                    class="login_input" >

            </textarea></td>
        </tr>


        <tr>
          <td colspan="6" align="justify">
          <p>
            <a href="#" onclick="registrar()" class="read_more">Registrar</a>
          </p></td>
        </tr>
      </table>
    </div>
</div>

<br>
<br>

<div id='almacen' style='width: 100%'></div>

<?php $this -> load -> view("fisico/incluir/pie"); ?>