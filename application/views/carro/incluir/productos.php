<style>
.ui-dialog-titlebar{
display:none;
}	
.letrascarro{
color:;
font-size: 9px;}
#valoresbolivares{

font-size: 12px;
}
#valoresbolivares2{
font-size:12px;
}	
</style>
    <div class="container">
        <div class="content-area">
    		<div class="content drag-desired">
                <?php
				//print("<pre>");
				//print_R($valor);
				foreach($lista[0]['rs'] as $cla => $valor){
					echo 
					'<div class="product" id="'. $valor->oidp . $valor->seri. $valor->lote . $valor->ubic .'" ><div class="row">' .
						 '<img src="'.__IMG__.'productos/medio/'.$valor->imag.'"
    					alt="'.htmlspecialchars($valor->observacion).'" class="product_img"  />
        				<div class ="product_det" id="det'. $valor->oidp . $valor->seri. $valor->lote . $valor->ubic .'" ></div>' .

						 '<div class="product_cant">
						    <input type="text" placeholder="0" id="cantidad'.$valor->oidp  . $valor->seri. $valor->lote . $valor->ubic . '"
						    onkeypress="return soloNumeros(event);"  class="obj_cant"></input>' .
						    '<a class="btn btn-default btn-sm obj_can" style="float:left;" href="#" >
						    <i class="fa fa-shopping-cart fa-4x" onclick="agregar('.$valor->oidp .',\'' . $valor->seri. '\',\'' . $valor->lote. '\',\'' . $valor->ubic. '\')" ></i>
                        </a></div>' .
						 '<textarea id="des'. $valor->oidp . $valor->seri. $valor->lote . $valor->ubic .'" style="display:none;">'.json_encode($valor).'</textarea>
						 </div></div>'
						 ;
				}
				?>
            </div>
            <div class="content drag-desired" >
            <br>
            <a class="btn btn-default btn-sm" href="#"><i class="fa fa-reply-all fa-2x" onclick="mostrarMenuCategoria();"></i></a>
            <br><br>
            </div>
        </div>
    </div>


