<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo __TITLE__ ?></title>

    <link href="<?php echo __CSS__ ?>administracion/estilo.css" rel="stylesheet" type="text/css" />

  </head>
  <body>

    <div id="main_container">
      <br><br>
      <div class="menu">
        <ul>
          <li class="selected">
            <a href="#">Inicio</a>
          </li>
        </ul>

      </div>

      <div class="center_content">

        <div class="center_left">

          <div class="features">
            <div class="title">
              Bienvenido, Panel de Control
            </div>
            <div class="news_box">
              <div class="news_icon"></div>
              <div class="news_content">
                
              </div>
            </div>

            <div class="news_box">
              <div class="news_icon"></div>
              <div class="news_content">
                Control General :
                <br>
                <br>
                - Usuarios.
                <br>
                - Galeria de Productos.
                <br>
                - Actualizaciones Varias.
                <br>
                <br>
                ma informático de tipo SGA.

              </div>
            </div>

            <div class="news_box">

            </div>

          </div>

        </div>

        <div class="center_right">

          <div class="text_box">
            <div class="title">
              Acceso de Clientes
            </div>
            <form name='frm' action='<?php echo base_url()?>index.php/panel/principal/validarUsuario'  method="post">
              <div class="login_form_row">

                <label class="login_label">Usuario:</label>
                <input type="text" name="txtUsuario" class="login_input" style="width: 110px" />
              </div>

              <div class="login_form_row">
                <label class="login_label">Contrase&ntilde;a:</label>
                <input type="password" name="txtClave" class="login_input" style="width: 110px" />
              </div>
              <a href="#" onclick="document.frm.submit();" class="read_more">Iniciar</a>
            </form>
            <br>
            <br>
            <br>
            <br>
          </div>

          <div class="clear"></div>

        </div>

        <div id="footer">
          <div class="footer"></div>

        </div>

      </div>

  </body>
</html>