<body>
<?php $this->load->view("carro/incluir/cabezera"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<!--/head-->
<body>
<div id="carro_mini" style="display: none;"></div>
<div id="agregar_producto" title="Comanda"></div>
<div id="galeria"></div>
<!--<ul id="myGallery"></ul><div id='des_galeria'></div></div>-->
<div id="soloDet"></div>
<?php $this->load->view("carro/incluir/menu"); ?>
<section>
    <br>

    <div class="" style="">
        <div class="row">

            <div id="">
                <?php
                if (isset($cuerpo)) $this->load->view($cuerpo);
                else {
                    ?>
                    <div id="ver_categorias">
                        <div class="">
    	                            <span class="top-label">
                                        </span>

                            <div class="content-area">
                                <div class="content">
                                    <center>
                                        <div class="panel-title" id='cssmenu'></div>
                                        <div class="clear"></div>
                                        <div id="main-container"></div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!--features_items-->
        </div>
    </div>
</section>
<?php //$this -> load -> view("principal/incluir/pie"); ?>

</body>
</html>
