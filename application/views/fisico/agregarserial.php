<?php $this -> load -> view("fisico/incluir/cabecera"); ?>
<?php $this -> load -> view("fisico/incluir/cuerpo"); ?>
<div class="center_left">
  <div class="title">
    Bienvenido al modulo de agregar productos por unidad
  </div>
  <td colspan="6" align="justify">
  <p>
    <div id='frmAlmacen'>
      <table border=0>

        <tr>
          <td valign="top">Productos:</td>
          <td colspan="5"><select id="producto" style="width: 590px; height: 22px"></select></td>
        </tr>

        <tr>
          <td valign="top">Factura:</td>
          <td colspan="5" valign="bottom">
          <input type="text" id="factura" class="login_input">&nbsp;Observación: número control del proveedor
          </td>
        </tr>


        <tr>
          <td valign="top">Marca:</td>
          <td>
          <input type="text" id="marca" class="login_input" value='CHOCOLATES'>
          </td>
          <td valign="top">Proveedor:</td>
          <td colspan="3">
          <input type="text" id="proveedor" class="login_input" style="width: 358px" VALUES='CHOCOLATES LA MUCUY'>
          </td>

        </tr>



        <tr>
          <td valign="top">Tipo:</td>
          <td>
          <input type="text" id="modelo" class="login_input" values='CHOCOLATES'>
          </td>
          <td valign="top">Descripción:</td>
          <td colspan="3">
          <input type="text" id="descripcion" class="login_input" style="width: 358px">
          </td>

        </tr>

        <tr>
          <td valign="top">Compra:</td>
          <td>
          <input type="text" id="compra" class="login_input">
          </td>
          <td valign="top">Contado:</td>
          <td>
          <input type="text" id="detal" class="login_input">
          </td>
          <td valign="top">Crédito:</td>
          <td>
          <input type="text" id="mayor" class="login_input">
          </td>
        </tr>

        <tr>
          <td valign="top">Serial:</td>
          <td colspan="5" align="left" valign="bottom">
          <input type="text" id="serial" class="login_input" style="width: 300px">
          &nbsp;&nbsp;+ <a href="#" onclick="agregarSerial()" >Agregar Serial </a></td>
        </tr>

        <tr id='lista'>
          <td valign="top">Lista:</td>
          <td colspan="5" align="left" valign="bottom"><select id="listaSerial" style="width: 580;height: 100px;" multiple="multiple" ondblclick="quitarSerial();">

          </select></td>
        </tr>

        <tr id='almacen'>
          <td valign="top">F. Entrada:</td>
          <td>
          <input type="text" id="fechaEntrada" class="login_input">
          </td>
          <td valign="top">Ubicación:</td>
          <td colspan="3"><select id="ubicacion" style="width: 358px; height: 22px"></select></td>
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