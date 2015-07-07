<!DOCTYPE html>
<html >

  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ACCESO DE ADMINISTRADOR</title>
      <link href="<?php echo __CSS__ ?>login/style.css" rel="stylesheet"  type="text/css">
      <script type="text/javascript" src="<?php echo __JSVIEW__ ?>jquery/jquery-1.10.2.js"></script>
      <script type="text/javascript" src="<?php echo __JSVIEW__ ?>login/modernizr.custom.63321.js"></script>

  </head>
<body>
<div class="container">
    <header>

        <h1>
            <strong>Control De Acceso</strong>
        </h1>
        <h2>Bienvenido</h2>
        <div class="support-note">
            <span class="note-ie">Ingrese usuario y clave</span>
        </div>

    </header>

    <section class="main">
        <form class="form-1" action='<?php echo base_url()?>index.php/principal/validarUsuario'  method='POST'>
            <p class="field">
                <input type="text" name="txtUsuario" id="txtUsuario" placeholder="USUARIO"> <i
                    class="icon-user icon-large"></i>
            </p>
            <p class="field">
                <input type="password" name="txtClave" id="txtClave" placeholder="CLAVE"> <i
                    class="icon-lock icon-large"></i>
            </p>
            <p class="submit">
                <button type="submit" name="submit">
                    <i class="icon-arrow-right icon-large"></i>
                </button>
            </p>
        </form>
    </section>
</div>
</BODY>