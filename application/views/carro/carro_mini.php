
<table style="width: 250px;" class="tabla">
		<thead>
			<tr style="margin:30px;border-bottom: 1px solid #ccc;">
					<th style="border-right: 1px solid #ccc;">
						Cant
					</th>
					<th style="text-align: center;">
						Producto
					</th>
					<!--<th>
						Total
					</th>-->
				</tr>
		</thead>
		<tbody>
			<?php
$i = 1;
foreach ($carro->contents() as $items){?>
	<input type="hidden" name="<?php echo $i;?>mod_id" id="<?php echo $i?>mod_id" value="<?php echo $items['rowid'];?>" />
				<tr>
					<td style="border-right: 1px solid #ccc;" id="cantidad_actual">
						<?php echo $items['qty']?>
					</td>
					<td><?php echo $items['name'];?></td>		
					<!--<td>Bs. <?php echo $carro->format_number($items['subtotal']); ?></td>-->
				</tr>
<?php		
	$i++;	
}
?>
		</tbody>
		<tfoot>
		<!--<tr>
				<td colspan="4" style="text-align: center;border-top: 1px solid #ccc;">
					Total Compra: <?php echo $carro->format_number($carro->total()); ?> Bs.
				</td>
		</tr>-->
			<tr>
				<td colspan="4" style="border-top: 1px solid #ccc">
<?php
 echo '				
				<a href="'.__LOCALWWW__.'/index.php/carro/carro/ver_carro">
				';
?>	
				<img src='<?php echo __IMG__.'carro1.png';?>' alt="" width=40 />Procesar</a>
				</td>
			</tr>
		</tfoot>
	</table>