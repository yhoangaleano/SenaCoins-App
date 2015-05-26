

<div class="row">
	<div class="col-md-6">

	<div class="panel panel-orange">
			<div class="panel-heading">Equipo</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="txtNombreEquipo" placeholder="Nombre Equipo"  />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txtNombreUsuario" placeholder="Nombre Usuario"  />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txtContrasena" placeholder="Contraseña"  />
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary btn-block" id="btnGuardar">Guardar</button>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-block btn-primary" id="btnModificar" style="display:none">Modificar</button>
					</div>
				</form>
			</div>
		</div>

	</div>
	<div class="col-md-6">
		<div class="form-group">

			<table id="tblEquipo" class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="active">Nombre del equipo</th>
						<th class="active">Nombre de usuario</th>
						<th class="active">Contraseña</th>
						<th class="active">Cantidad de monedas</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>

		</div>
	</div>
</div>	


