<div class="container">
	<h1 class="text-center mt-4"><i class="fa-regular fa-hospital"></i>Clinicas</h1>
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Ver Marcadores
			</button>
			<a href="<?php echo site_url('clinicas/nuevo'); ?>" class="btn btn-dark"><i class="fa fa-plus-circle"></i> &nbsp; Agregar Clincia</a>
		</div>
	</div>
	<?php if ($listadoClinicas) : ?>
		<table class="table table-bordered m-2">

			<thead>
				<tr class="table-info">
					<th class="text-center">ID</th>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">RUC</th>
					<th class="text-center">PROPIETARIO</th>
					<th class="text-center">FECHA DE FUNDACION</th>
					<th class="text-center">FOTOGRAFIA</th>
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
						<td class="text-center">
							<?php if ($clinica->fotografia != "") : ?>
								<img src="<?php echo base_url('uploads/clinicas/') . $clinica->fotografia; ?>" height="100px" width="100px" alt="">
							<?php else : ?>
								N/A
							<?php endif; ?>
						</td>
						<td class="text-center"><?php echo $clinica->latitud_aj; ?></td>
						<td class="text-center"><?php echo $clinica->longitud_aj; ?></td>
						<td class="text-center">
							<a href="<?php echo site_url('clinicas/borrar/') . $clinica->id_aj; ?>" class=" btn btn-outline-danger delete-btn" title="Eliminar">
								<i class="fa-solid fa-trash"></i>
							</a>
							<a href="<?php echo site_url('clinicas/editar/') . $clinica->id_aj; ?>" class="btn btn-outline-warning" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Clinicas</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div id='clinicas' style="width: 100%; height:300px"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<div class="alert alert-danger">
			No se encontro clinicas registradas
		</div>
	<?php endif; ?>
	<script>
		function initMap() {
			var coordenadaCentral = new google.maps.LatLng(-0.9171755208692692, -78.6328634793978);
			var miMapa = new google.maps.Map(document.getElementById('clinicas'), {
				center: coordenadaCentral,
				zoom: 13,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			<?php foreach ($listadoClinicas as $clinica) : ?>
				var coordenadaTemporal = new google.maps.LatLng(
					<?php echo $clinica->latitud_aj; ?>,
					<?php echo $clinica->longitud_aj; ?>
				);
				var marcador = new google.maps.Marker({
					position: coordenadaTemporal,
					map: miMapa,
					title: '<?php echo $clinica->nombre_aj; ?>',
				});
			<?php endforeach; ?>
		}
	</script>
</div>
