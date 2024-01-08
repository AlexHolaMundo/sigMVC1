<div class="container">
	<h1 class="text-center mt-4"><i class="fa-regular fa-hospital"></i> Hospitales</h1>
	<div class="row">
		<div class="col-md-11 	m-4 text-end">
			<a href="<?php echo site_url('hospitales/nuevo'); ?>" class="btn btn-dark"><i class="fa fa-plus-circle"></i> &nbsp; Agregar Hospital</a>
		</div>
	</div>
	<?php if ($listadoHospitales) : ?>
		<table class="table table-bordered">

			<thead>
				<tr class="table-info">
					<th class="text-center">ID</th>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">DIRECCION</th>
					<th class="text-center">TELEFONO</th>
					<th class="text-center">LATITUD</th>
					<th class="text-center">LONGITUD</th>
					<th class="text-center">ACCIONES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listadoHospitales as $hospital) : ?>
					<tr>
						<td class="text-center"><?php echo $hospital->id_hos; ?></td>
						<td class="text-center"><?php echo $hospital->nombre_hos; ?></td>
						<td class="text-center"><?php echo $hospital->direccion_hos; ?></td>
						<td class="text-center"><?php echo $hospital->telefono_hos; ?></td>
						<td class="text-center"><?php echo $hospital->latitud_hos; ?></td>
						<td class="text-center"><?php echo $hospital->longitud_hos; ?></td>
						<td class="text-center">
							<a href="<?php echo site_url('hospitales/borrar/') . $hospital->id_hos; ?>" class=" btn btn-outline-danger">
								<i class="fa-solid fa-trash"></i>
								Eliminar
							</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<div class="alert alert-danger">
			No se encontro hospitales registrados
		</div>
	<?php endif; ?>
</div>
