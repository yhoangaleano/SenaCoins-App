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
<table>
	<thead>
		<tr>
			<th>Nombre del equipo</th>
			<th>Nombre del Producto</th>
			<th>Inversión</th>
			<th>Imagen</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($listaProductos as $producto):?>
			<tr>
				<td><?= $producto->nombre_equipo ?></td>
				<td><?= $producto->nombre_producto ?></td>
				<td><?= $producto->inversion ?></td>
				<td><?= $producto->imagen ?></td>
			</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<p><?= $lista_json ?></p>

