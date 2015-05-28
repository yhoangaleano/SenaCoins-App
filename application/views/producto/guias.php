<div class="alert alert-info" role="alert" id="productoAdvertencia">
	<p>Solo se puede asociar archivos con extencion .PDF .DOC</p>
</div>

<div class="alert alert-warning" role="alert" id="productoError" style="display:none">
	<p>El equipo no cuenta con un producto registrao</p>
</div>

<div class="alert alert-info" role="alert" id="productoInfo" style="display:none">
	<p>Ya cuentas con una guia registrada, ahora podras realizar las siguientes acciones</p>
</div>

 <section id="opciones" style="display:none">
            <div class="row">

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-info panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-eye"></i>
                            <h3>Opción 1</h3>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-info" href="#" id="verGuia">Ver guia</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-info panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-download"></i>
                            <h3>Opción 2</h3>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-info" href="#" id="downloadGuia">Descargar Guia</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-danger panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-trash-o"></i>
                            <h3>Opción 3</h3>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-danger" href="#" id="eliminarGuia">Eliminar</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->
        </div>
    </section>


<div class="modal fade bs-example-modal-lg" id="modalGuia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" id="guiaiframe"></iframe>
		</div>
    </div>
  </div>
</div>


<form action="/target" class="dropzone" id="my-dropzone">

</form>
<br>
<button class="btn btn-primary pull-right" id="submit-all">Guardar</button>


<style type="text/css">
	
	.panel-pricing {
  -moz-transition: all .3s ease;
  -o-transition: all .3s ease;
  -webkit-transition: all .3s ease;
}
.panel-pricing:hover {
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
}
.panel-pricing .panel-heading {
  padding: 20px 10px;
}
.panel-pricing .panel-heading .fa {
  margin-top: 10px;
  font-size: 58px;
}
.panel-pricing .list-group-item {
  color: #777777;
  border-bottom: 1px solid rgba(250, 250, 250, 0.5);
}
.panel-pricing .list-group-item:last-child {
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px;
}
.panel-pricing .list-group-item:first-child {
  border-top-right-radius: 0px;
  border-top-left-radius: 0px;
}
.panel-pricing .panel-body {
  background-color: #f0f0f0;
  font-size: 40px;
  color: #777777;
  padding: 20px;
  margin: 0px;
}


</style>

<?php
$js = '<script src="'.URL.'js/application-selects.js" type="text/javascript"></script>';
$js .= '<script src="'.URL.'js/application-producto.js" type="text/javascript"></script>';
$js .= '<script>producto.validarGuia();</script>';

?>