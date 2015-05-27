
<form action="/target" class="dropzone" id="my-dropzone">
		<div class="form-group">
			<label for="">Equipo</label>
			<select class="form-control" id="txtIdEquipo" name="txtIdEquipo">
			</select>
		</div>
</form>
<br>
<button class="btn btn-primary pull-right" id="submit-all">Guardar</button>


<?php
$js = '<script src="'.URL.'js/application-selects.js" type="text/javascript"></script>';
$js .= '<script>select_equipo.ListarEP(); producto.subirGaleria();</script>';

?>