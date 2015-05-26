<div class="row">
	<div class="col-md-8 col-md-offset-2">

		<div class="panel panel-orange">
			<div class="panel-heading">Crear producto</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="">Equipo</label>
						<select class="form-control" id="txtIdEquipo" name="txtIdEquipo">
						</select>
					</div>
					<div class="form-group">
						<label for="">Nombre del producto</label>
						<input type="text" class="form-control" id="txtNombreProducto" name="txtNombreProducto" />
					</div>
					<div class="form-group">
						<label for="">Descripción</label>
						<textarea name="descripcion" id="txtdescripcion" name="txtdescripcion" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group">
						<label for="">Imagen principal</label>
						<input type="file" class="form-control" id="mainimage" name="mainimage" >
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary pull-right" id="btnGuardar">Guardar</button>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-block btn-primary" id="btnModificar" style="display:none">Modificar</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>	

<?php   

$js = '<script src="'.URL.'js/application-selects.js" type="text/javascript"></script>';
$js .= '<script>select_equipo.Listar();</script>';
?>