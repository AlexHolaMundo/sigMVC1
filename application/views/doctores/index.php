<div class="container">
	<h1 class="text-center mt-4"><i class="fa-regular fa-hospital"></i>Doctores</h1>
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Ver Marcadores
			</button>
			<a href="<?php echo site_url('doctores/nuevo'); ?>" class="btn btn-dark"><i class="fa fa-plus-circle"></i> &nbsp; Agregar Doctor</a>
		</div>
	</div>
	<?php if ($listadoDoctores) : ?>
		<table class="table table-bordered m-2">
			<thead>
				<tr class="table-info">
					<th class="text-center">ID</th>
					<th class="text-center">Primer Apellido</th>
					<th class="text-center">Segndo Apellido</th>
					<th class="text-center">Nombres</th>
					<th class="text-center">Fecha de Nacimiento</th>
					<th class="text-center">Identificacion</th>
					<th class="text-center">Nacionalidad</th>
					<th class="text-center">Latitud</th>
					<th class="text-center">Longitud</th>
					<th class="text-center">Carnet</th>
					<th class="text-center">ACIONES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listadoDoctores as $doctor) : ?>
					<tr>
						<td class="text-center"><?php echo $doctor->id_WATT; ?></td>
						<td class="text-center"><?php echo $doctor->primer_apellidoWATT; ?></td>
						<td class="text-center"><?php echo $doctor->segundo_apellidoWATT; ?></td>
						<td class="text-center"><?php echo $doctor->nombreWATT; ?></td>
						<td class="text-center"><?php echo $doctor->fecha_nacimientoWATT; ?></td>
						<td class="text-center"><?php echo $doctor->identificacionWATT; ?></td>
						<td class="text-center"><?php echo $doctor->nacionalidadWATT; ?></td>
						<td class="text-center"><?php echo $doctor->latitudWATT; ?></td>
						<td class="text-center"><?php echo $doctor->longitudWATT; ?></td>
						<td class="text-center">
							<?php if ($doctor->carnetWATT != "") : ?>
								<img src="<?php echo base_url('uploads/doctores/') . $doctor->carnetWATT; ?>" height="100px" width="100px" alt="">
							<?php else : ?>
								N/A
							<?php endif; ?>
						</td>
						<td class="text-center">
							<a href="<?php echo site_url('doctores/borrar/') . $doctor->id_WATT; ?>" class=" btn btn-outline-danger" title="Eliminar">
								<i class="fa-solid fa-trash"></i>
							</a>
							<a href="<?php echo site_url('doctores/editar/') . $doctor->id_WATT; ?>" class="btn btn-outline-warning" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div id="reporteMapa" style="width: 100%; height:300px; border: 2px solid black;">

						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<div class="alert alert-danger">
			No se encontro doctores registrados
		</div>
	<?php endif; ?>
	<script>
		function initMap() {
			var coordenadaCentral = new google.maps.LatLng(-0.9171755208692692, -78.6328634793978);
			var miMapa = new google.maps.Map(document.getElementById('reporteMapa'), {
				center: coordenadaCentral,
				zoom: 13,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			<?php foreach ($listadoDoctores as $doctor) : ?>
				var coordenadaTemporal = new google.maps.LatLng(
					<?php echo $doctor->latitudWATT; ?>,
					<?php echo $doctor->longitudWATT; ?>);
				var marcador = new google.maps.Marker({
					position: coordenadaTemporal,
					map: miMapa,
					title: "<?php echo $doctor->nombreWATT; ?>",
				});
			<?php endforeach; ?>
		}
	</script>
</div>
