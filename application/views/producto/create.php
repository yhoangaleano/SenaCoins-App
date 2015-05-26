<div class="row">
	<div class="col-md-6">

		<div class="panel panel-orange">
			<div class="panel-heading">Crear producto</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="">Equipo</label>
						<input type="text" class="form-control" id="txtIdEquipo" placeholder="Ejm: Multimedia"  />
					</div>
					<div class="form-group">
						<label for="">Nombre del producto</label>
						<input type="text" class="form-control" id="txtNombreProducto" placeholder="Ejm: Botellatrón"  />
					</div>
					<div class="form-group">
						<label for="">Descripción</label>
						<textarea name="descripcion" id="txtdescripcion" class="form-control" rows="5"></textarea>
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