<?php $this -> load -> view("incluir/cabezera"); ?>
<?php $this -> load -> view("principal/incluir/cab"); ?>
	<section id="slider"><!--slider-->
			<div class="row">
		</div>
	</section>
	<section id="form" style="position:relative;top:-175px;height:auto;"><!--form-->
		<div class="container">
			<div class="row">  	
	    		<div class="col-sm-8">
	    			<fieldset id="contact_form">
	    			<div class="signup-form">
	    				<h2 class="title text-left">Ense&ntilde;anos como encontrarte.</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form method="post" class="contacto" action="<?php echo base_url() . 'index.php/principal/enviog' ?>">
 	    <fieldset>
			<div><input type="text" class="nombre" name="nombre" placeholder="Nombre" /></div>
			<div><input type="text" class="email" name="email" placeholder="Email" /></div>
			<div><input type="text" class="telefono" name="telefono" placeholder="Telefono"/></div>
			<div><textarea cols="30" rows="5" class="mensaje" name="mensaje" placeholder="Mensaje"></textarea></div>
 	        <div class="ultimo">
				<img src="<?php echo __IMG__ ?>ajax.gif" width="20px" alt="solicita" class="ajaxgif hide"/>
				<div class="msg"></div>
				<button class="boton_envio">Enviar Mensaje</button>
			</div>
 	    </fieldset>
 	 </form>
	    			</div>
	    			</fieldset>
	    		</div>
	    		<div class="col-sm-4">
	    	
	    			<div class="signup-form">
	    				<h2 class="title text-center">Nuestros Contactos</h2>
	    				<address>
	    					<p>Insumos la Candelaria</p>
							<p>Edif. Guillen Piso 1 ofi. 6</p>
							<p>Merida - Venezula</p>
							<p>Telefono: +58 0424-7570208/ 0426-2110722</p>
							<p>Email: ventas@insumoslacandelaria.com.ve</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Nuestras Redes Sociales</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
		</div>
	</section><!--/form-->
<?php $this -> load -> view("principal/incluir/pie"); ?>