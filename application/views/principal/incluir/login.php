<?php

/*
 * Created on 24/02/2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<H2>Bienvenido</H2>
<br />
<br />
<form name='frm' action='<?php echo base_url()?>index.php/principal/validarUsuario'  method='POST'>
	<div id="estcorp-login-prin-formulario-name" style="margin-top:20px;">
		Usuario:
	</div>
	<div id="estcorp-login-prin-formulario-campos" style="margin-top:20px;">
		<input name="txtUsuario" class="estcorp-login-prin-formulario-cajas" title="Username" value="" size="30" maxlength="2048" />
	</div>
	<div id="estcorp-login-prin-formulario-name">
		Contrase&ntilde;a:
	</div>
	<div id="estcorp-login-prin-formulario-campos">
		<input name="txtClave" type="password" class="estcorp-login-prin-formulario-cajas" title="Password" value="" size="30" maxlength="2048" />
	</div>
	<br />
	<span>&nbsp;</span>
	<br />
	<br />
	<a href='#' onclick="document.frm.submit();"><img src="<?php echo __IMG__ ?>icon-boton.png" width="103" height="42" style="margin-left:90px;" /></a>
</form>