<div class="container">
	<h1 class="text-center mt-4"><i class="fa-regular fa-hospital"></i>Clinicas</h1>
	<div class="row">
		<div class="col-md-11 	m-4 text-end">
			<a href="<?php echo site_url('clinicas/nuevo'); ?>" class="btn btn-dark"><i class="fa fa-plus-circle"></i> &nbsp; Agregar Clincia</a>
		</div>
	</div>
	<?php if ($listadoClinicas) : ?>
		<table class="table table-bordered">

			<thead>
				<tr class="table-info">
					<th class="text-center">ID</th>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">RUC</th>
					<th class="text-center">PROPIETARIO</th>
					<th class="text-center">FECHA DE FUNDACION</th>
					<th class="text-center">LATITUD</th>
					<th class="text-center">LONGITUD</th>
					<th class="text-center">ACIONES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listadoClinicas as $clinica) : ?>
					<tr>
						<td class="text-center"><?php echo $clinica->id_aj; ?></td>
						<td class="text-center"><?php echo $clinica->nombre_aj; ?></td>
						<td class="text-center"><?php echo $clinica->ruc_aj; ?></td>
						<td class="text-center"><?php echo $clinica->propietario_aj; ?></td>
						<td class="text-center"><?php echo $clinica->fechafundacion_aj; ?></td>
						<td class="text-center"><?php echo $clinica->latitud_aj; ?></td>
						<td class="text-center"><?php echo $clinica->longitud_aj; ?></td>
						<td class="text-center">
							<a href="<?php echo site_url('clinicas/borrar/') . $clinica->id_aj; ?>" class=" btn btn-outline-danger">
								<i class="fa-solid fa-trash"></i>
								Eliminar
							</a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<div class="alert alert-danger">
			No se encontro clinicas registradas
		</div>
	<?php endif; ?>
</div>
