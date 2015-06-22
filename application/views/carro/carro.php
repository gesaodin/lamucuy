<style>
	@charset "UTF-8";
/* CSS Document */
.tabla{
	width:auto;
	}
td, th, .tabla{
	border-width:0.5px;
	border-color:#ccc;
	border-style:solid;
	}

</style>
<div class="container" id='lista_carrito'>
<span class="top-label">	
</span> 
<div class="content-area" id="estcorp-contenedor-medio-productos">	
	
	<div class="companyinfo">
							<h2><span></span>&nbsp;Comandas</h2>
							<p>
					</div>
	<div class="content drag-desired"><br>   
		<div id="item-list">
			<form method="post" id="frmModifica">
			<table cellpadding="6" cellspacing="1" border="0" class="tabla">
				<thead style="background: #ccc;">
				<tr>
					<th>Cant.</th>
					<th>Prod.</th>
					<!--<th style="text-align: right">Precio</th>
					<th style="text-align: right">Sub-Total</th>
					<th>#</th>-->
				</tr>
				 </thead>
				 <tbody>
<?php
$i = 1;
foreach ($carro->contents() as $items){?>
	<input type="hidden" name="<?php echo $i;?>mod_id" id="<?php echo $i?>mod_id" value="<?php echo $items['rowid'];?>" />
				<tr>
					<td width="5%">
						<input type="text" name="<?php echo $i;?>mod_cant" id="<?php echo $i;?>mod_cant" value="<?php echo $items['qty']?>" size="2" maxlength="2" onkeypress = "return soloNumeros(event);"/>
					</td>
					<td width="50%"><?php echo $items['name'];?></td>		
					<!--<td style="text-align: right" width="15%"><?php echo $carro->format_number($items['price']); ?></td>
					<td style="text-align: right" width="20%">Bs. <?php echo $carro->format_number($items['subtotal']); ?></td>
					<td width="10%"><a href="#"  class="remove" onClick="quitar_carrito('<?php echo $items['rowid'];?>');">Eliminar</a></td>-->
				</tr>
<?php		
	$i++;	
}
?>
				<!--<tr>
					<td colspan="2"></td>
					<td class="right" style="text-align: right"><strong>Total</strong></td>
					<td class="right" style="text-align: right">Bs. <?php echo $carro->format_number($carro->total()); ?></td>
				</tr>-->
				</tbody>
			</table>
			</form>
			<p>
				<input type="button" onclick="modificar();" id='btn_mod' name="btn_mod" value="Modificar" style="background:#594839 ;color:#fff;padding: 10px 8px 8px 4px;" />

				<input type="button" onclick="realizar_pedido();" id='btn_ped' name="btn_ped" value="Realizar Pedido" style="background: #594839;color:#fff;padding: 10px 8px 8px 4px;"/>
			</p>                
    	</div>
	</div>
</div>
</div>