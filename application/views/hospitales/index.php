<div class="container">
	<h1 class="text-center mt-4"><i class="fa-regular fa-hospital"></i> Hospitales</h1>
	<div class="row">
		<div class="col-md-11 text-end m-4">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				<i class="fa fa-eye"></i> Mostrar Mapa
			</button>
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
		<script>
			function initMap() {
				var coordenadaCentral = new google.maps.LatLng(-0.9171755208692692, -78.6328634793978);
				var miMapa = new google.maps.Map(document.getElementById('reporteMapa'), {
					center: coordenadaCentral,
					zoom: 13,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				<?php foreach ($listadoHospitales as $hospital) : ?>
					var coordenadaTemporal = new google.maps.LatLng(
						<?php echo $hospital->latitud_hos; ?>,
						<?php echo $hospital->longitud_hos; ?>);
					var marcador = new google.maps.Marker({
						position: coordenadaTemporal,
						map: miMapa,
						title: "<?php echo $hospital->nombre_hos; ?>",
					});
				<?php endforeach; ?>
			}
		</script>
	<?php else : ?>
		<div class="alert alert-danger">
			No se encontro hospitales registrados
		</div>
	<?php endif; ?>
</div>
