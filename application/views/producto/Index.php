<?php 

if (!isset($_SESSION['ID'])) {
	header("Location:".URL."home/Index");
}

if (isset($_POST['btnCerrar'])) {
	session_unset();
	session_destroy();
	header("Location:".URL."home/Index");
}

?>
<!--  <form method="post">
	<input type="submit" name="btnCerrar" value="Cerrar Sesión">
</form> -->

<div class="row">
	<div class="col-md-12">
		<div class="form-group"><a href="<?php echo URL ?>producto/create" class="btn btn-primary">Crear producto</a></div>
	</div>
</div>

<table id="tblProducto" class="table table-hover table-bordered">
	<thead>
		<tr>
			<th class="active">Código del producto</th>
			<th class="active">Nombre del Producto</th>
			<th class="active">Imagen</th>
			<th class="active">Monedas</th>
			<th class="active">Pertenece al equipo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($listaProductos as $producto):?>
			<tr>
				<td style="vertical-align: middle;"><?= $producto->idProducto ?></td>
				<td style="vertical-align: middle;"><?= $producto->nombre_producto ?></td>
				<td style="vertical-align: middle;"><img class="img img-circle" style="width: 100px;height: 100px;" src="<?= URL.'upload/artefactos/'.$producto->equipo_idEquipo.'/'.$producto->imagen ?>" alt=""></td>
				<td style="vertical-align: middle;"><?= $producto->inversion == "" ? 0 : $producto->inversion ?></td>
				<td style="vertical-align: middle;"><?= $producto->nombre_equipo ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php 

$js = '<script>$("#tblProducto").dataTable({"language": {"url": "'.URL.'plugins/DataTables/js/Spanish.json"}});</script>';

?>

