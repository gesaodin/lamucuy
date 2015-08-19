<?php $this -> load -> view("fisico/incluir/cabecera"); ?>
<?php $this -> load -> view("fisico/incluir/cuerpo"); ?>
<div class="center_left">
  <div class="title">
    Bienvenido Al Control de Producto
  </div>
  <td colspan="6" align="justify">
  <p>
    <div id='frmAlmacen'>
      <table border=0>

        <tr>
          <td>Código:</td>
          <td>
          <input type="text" id="codigo" class="login_input">
          </td>
          <td >Método:</td>
          <td>
            <select id="metodo" style="width: 155px; height: 22px">
              <option value="0">P.E.P.S</option>  
              <option value="1">U.E.P.S</option>
            </select>
          </td>

        </tr>

        <tr>
          <td >Nombre:</td>
          <td>
          <input type="text" id="nombre" class="login_input">
          </td>
          <td >Descripción General:</td>
          <td>
          <input type="text" id="descripcion" class="login_input">
          </td>
        </tr>
		
        <tr>
          <td>Tipo:</td>
          <td><select id="unidad" style="height: 22px"></select></td>
          <td >Costo x Produccion:</td>
          <td  align="right" >
          <input type="text" id="costoProducto" class="login_input" value='0'>
          </td>
        </tr>

        <tr>
          <td>Categoría:</td>
          <td colspan="5"><select id="categoria" style="width: 440px; height: 22px"></select></td>
        </tr>
        <tr>
          <td>Minimo:</td>
          <td>
          <input type="text" id="minimo" class="login_input">
          </td>
          <td>Máximo:</td>
          <td>
          <input type="text" id="maximo" class="login_input">
          </td>
        </tr>
        <tr>
          <td>Imagen: </td>
          <td colspan="5">
          <input type="file" size=60 id="imagen" style="width: 400px ">
          <br>
          <br>
          </td>
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
<div class="center_right">
  <center>

    <div class="text_box">
      <div class="title">
        Fotos del Producto
      </div>

    </div>

    <div class="clear"></div>
  </center>
</div>

<br>
<br>

<div id='almacen' style='width: 100%'></div>

<?php $this -> load -> view("fisico/incluir/pie"); ?>