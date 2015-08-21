<?php $this->load->view("panel2/incluir/cabecera"); ?>
<div class="container">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s5">
                    <select class="browser-default" id="ubic" name="ubic">
                    </select>

                </div>
                <div class="input-field col s5">
                    <input type="date" class="datepicker" id="fech" name="fech">
                    <label for="fech">Fecha</label>
                </div>
                <div class="input-field col s2">
                    <a class="btn-floating btn-large waves-effect waves-light brown" onclick="resumen();"><i class="mdi-action-search"></i></a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col s12" id="reporte">

        </div>
    </div>
</div>
<?php $this->load->view("panel2/incluir/pie"); ?>
</body>