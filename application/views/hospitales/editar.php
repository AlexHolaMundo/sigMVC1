<div class="container">
	<form action="<?php echo site_url('hospitales/actualizarHospital'); ?>" class="m-4" method="post" enctype="multipart/form-data">
		<h3 class="text-center">Editar Hospital</h3>
		<input type="hidden" name="id_hos" id="id_hos" value="<?php echo $hospitalEditar->id_hos ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label for="" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre_hos" name="nombre_hos" placeholder="IESS" value="<?php echo $hospitalEditar->nombre_hos ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<div class="mb-3">
						<label for="" class="form-label">Direccion</label>
						<input type="text" class="form-control" id="direccion_hos" name="direccion_hos" placeholder="Av. Example" value="<?php echo $hospitalEditar->direccion_hos ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label for="" class="form-label">Telefono</label>
					<input type="text" class="form-control" id="telefono_hos" name="telefono_hos" placeholder="000 0000 0000" value="<?php echo $hospitalEditar->telefono_hos ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label for="" class="form-label">Actualizar Fotografia (Opcional)</label>
					<input type="file" class="form-control" id="nueva_foto_hos" name="nueva_foto_hos">
					<input type="hidden" name="foto_hos_actual" value="<?php echo $hospitalEditar->foto_hos; ?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Latitud</label>
				<input type="text" class="form-control" id="latitud_hos" name="latitud_hos" placeholder="000000000000000" readonly value="<?php echo $hospitalEditar->latitud_hos ?>">
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">longitud</label>
				<input type="text" class="form-control" id="longitud_hos" name="longitud_hos" placeholder="000000000000000" readonly value="<?php echo $hospitalEditar->longitud_hos ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 m-2">
				<legend class="text-center">Arrastra el marcador hacia la ubicacion</legend>
				<div id="mapa" style="width: 100%; height:310px; border: 1px solid gray; border-radius:1rem;"></div>
			</div>
		</div>
		<center>
			<button type="submit" class="btn btn-outline-primary">Actualizar <i class="fa-regular fa-floppy-disk"></i></button>&nbsp;&nbsp;
			<a type="" href="<?php echo site_url('hospitales/index'); ?>" class="btn btn-outline-warning">Cancelar <i class="fa-regular fa-circle-xmark"></i></a>
		</center>
	</form>
</div>
<script>
	function initMap() {
		var coordenadaCentral = new google.maps.LatLng(<?php echo $hospitalEditar->latitud_hos; ?>, <?php echo $hospitalEditar->longitud_hos; ?>);
		var miMapa = new google.maps.Map(document.getElementById('mapa'), {
			center: coordenadaCentral,
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marcador = new google.maps.Marker({
			position: coordenadaCentral,
			map: miMapa,
			title: 'Seleccione la ubicación del hospital',
			draggable: true
		});
		google.maps.event.addListener(marcador, 'dragend', function(event) {
			var latitud = this.getPosition().lat();
			var longitud = this.getPosition().lng();
			document.getElementById('latitud_hos').value = latitud;
			document.getElementById('longitud_hos').value = longitud;
		});
	}
</script>
