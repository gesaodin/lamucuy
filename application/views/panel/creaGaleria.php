<?php $this -> load -> view("panel/incluir/cabecera"); ?>
<?php $this -> load -> view("panel/incluir/cuerpo"); ?>
<div class="center_left">
  <div class="title">
    Bienvenido al modulo de agregar galeria de producto
  </div>
  <td colspan="6" align="justify">
  <p>
    <div id='frmGaleria'>
      <table border=0>
        <tr>
          <td valign="top">Productos:</td>
          <td colspan="5"><select id="producto" style="width: 590px; height: 22px" onchange="consultar();"></select></td>
        </tr>
        <tr>
          <td valign="top">Imagen:</td>
          <td colspan="5" valign="bottom">
          <input type="file" size=60 id="imagen" style="width: 400px ">
          </td>
        </tr>
         <tr>
          <td colspan="6" align="justify">
          <p>
            <a href="#" onclick="registrar()" class="read_more">Registrar</a>

          </p></td>
        </tr>
        <tr><td colspan="6" align="justify"><div id='imagenes' style='width: 100%'></div></td></tr>
       </table>
    </div>
</div>

<br>
<br>



<?php $this -> load -> view("panel/incluir/pie"); ?>