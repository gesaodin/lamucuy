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

    <div class="container" style="position: relative;float: left;width: 75%;">    
    	<span class="top-label">
        </span>
        <div class="content-area">
    		<div class="content drag-desired">
                <?php
				//print("<pre>");
				//print_R($valor);
				foreach($lista[0]['rs'] as $cla => $valor){
					echo 
					'<div class="product" id="'. $valor->oidp . $valor->seri. $valor->lote . $valor->ubic .'" >' .
						 '<img src="'.__IMG__.'productos/'.$valor->imag.'"
    					alt="'.htmlspecialchars($valor->observacion).'" width="80" height="60" class="pngfix"style="margin-left: 0px;margin-bottom:2px;float:left;"  />
        				<div style="background:trasparent;padding:0px 10px 0px 10px;float:left;width:90px;" id="det'. $valor->oidp . $valor->seri. $valor->lote . $valor->ubic .'" ></div>' .
						 '<div style="background:transparent;float:left">
						<input type="text" placeholder="0" id="cantidad'.$valor->oidp  . $valor->seri. $valor->lote . $valor->ubic . '"
						 onkeypress="return soloNumeros(event);" style="background:#fff; width:80px;height:60px;border:1px solid #e8e8e8;font-size:45px;"><br></input></div>' .
						 '<div style="float:left;"><a class="btn btn-default btn-sm" href="#" style="float:left;"><i class="fa fa-shopping-cart fa-4x" onclick="agregar('.$valor->oidp .',\'' . $valor->seri. '\',\'' . $valor->lote. '\',\'' . $valor->ubic. '\')" ></i></a></div>' .
						 '<textarea id="des'. $valor->oidp . $valor->seri. $valor->lote . $valor->ubic .'" style="display:none;">'.json_encode($valor).'</textarea></div>
						 <div class="row"></div>'
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


