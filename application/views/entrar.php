<?php $this -> load -> view("incluir/cabezera"); ?>
<body>
<div id="estcorp">
	<div id="estcorp-menu">
		<div id="estcorp-menu-navigation">
			<div id="estcorp-menu-navigation-items">
				<ul>
					<li><a rel="leanModal" href="#estcorp-registrarme">REGISTRARME</a></li>
					<li><a rel="leanModal" href="#estcorp-contactenos">CONT&Aacute;CTENOS</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="headerimgs"> 
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	</div>
	<div id="headernav">
		<div id="back" class="btn"></div>
		<div id="next" class="btn"></div>
	</div>
	<br>
	<div id="estcorp-ingreso">
		<div id="estcorp-login-prin">
			<div id="estcorp-login-prin-formulario">
				<?php $this-> load -> view("entrada/login"); ?>
			</div>
		</div>
		<div id="headertxt">
			<p class="caption">
				<span id="firstline"></span>
				<a href="#" id="secondline"></a>
			</p>
		</div>
	</div>
	<div id="estcorp-contactenos" style="display: none">
		<?php $this-> load -> view("entrada/contacto"); ?>
	</div>
	<div id="estcorp-registrarme" style="display: none">
		<?php $this-> load -> view("entrada/registrar"); ?>
	</div>
</div>
</BODY>
</HTML>