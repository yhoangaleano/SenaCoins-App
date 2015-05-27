<div class="row">
	<div class="col-md-8 col-md-offset-2">

		<div class="panel panel-orange">
			<div class="panel-heading">Crear artefacto</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="<?php echo URL ?>producto/create">
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
						<textarea  id="txtDescripcion" name="txtDescripcion" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group">
						<label for="">Imagen principal</label>
						<input type="file" class="form-control" id="file" name="file" >
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary pull-right" id="btnGuardar">Guardar</button>
						<a class="btn btn-primary" href="<?php echo URL ?>producto/asociar">Subir Galeria</a>
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

if($mensaje == '1'){ 
	echo 'alert("Se guardo correctamente")'; 
}else if($mensaje == '2'){ 
	echo 'alert("No se guardo")'; 
}else if($mensaje == '3'){ 
	echo 'alert("Se guardo el artefacto, pero no fue posible subir la imagen")'; 
}else if($mensaje == '4'){ 
	echo 'alert("El equipo ya tiene un artefacto asociado")'; 
}

$js = '<script src="'.URL.'js/application-selects.js" type="text/javascript"></script>';
$js .= '<script>select_equipo.Listar();</script>';
$js .= '<script>
	'.$mensaje.'
</script>';
?>