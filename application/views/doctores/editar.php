<div class="container">
	<form action="<?php echo site_url('doctores/actualizarDoctor'); ?>" class="m-4" method="post" enctype="multipart/form-data" id="formDoctores">
		<h3 class="text-center">Editar Doctor</h3>
		<input type="hidden" name="id_WATT" id="id_WATT" value="<?php echo $doctorEditar->id_WATT ?>">
		<div class="row">
			<div class="mb-3 col-md-3">
				<label for="" class="form-label">Primer Apellido</label>
				<input type="text" class="form-control" id="primer_apellidoWATT" name="primer_apellidoWATT" placeholder="Sanchez" value="<?php echo $doctorEditar->primer_apellidoWATT ?>">
			</div>
			<div class="mb-3 col-md-3">
				<label for="" class="form-label">Segundo Apellido</label>
				<input type="text" class="form-control" id="segundo_apellidoWATT" name="segundo_apellidoWATT" placeholder="Mena" value="<?php echo $doctorEditar->segundo_apellidoWATT ?>">
			</div>
			<div class="mb-3 col-md-6">
			<label for="" class="form-label">Nombres</label>
			<input type="text" class="form-control" id="nombreWATT" name="nombreWATT" placeholder="ALGUIEN GENIAL" value=" <?php echo $doctorEditar->nombreWATT ?>">
		</div>
		</div>
		<div class="row">
		<div class="mb-3 col-md-4">
			<label for="" class="form-label">Fecha de Nacimiento</label>
			<input type="date" class="form-control" id="fecha_nacimientoWATT" name="fecha_nacimientoWATT"
			value="<?php echo $doctorEditar->fecha_nacimientoWATT ?>">
		</div>
		<div class="mb-3 col-md-4">
			<label for="" class="form-label">Identificacion</label>
			<input type="text" class="form-control" id="identificacionWATT" name="identificacionWATT" value="<?php echo $doctorEditar->identificacionWATT ?>" >
		</div>
		<div class="mb-3 col-md-4">
			<label for="" class="form-label">Nacionalidad</label>
			<input type="text" class="form-control" id="nacionalidadWATT" name="nacionalidadWATT" value="<?php echo $doctorEditar->nacionalidadWATT ?>" >
		</div>
		</div>
		<div class="row">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Latitud</label>
				<input type="text" class="form-control" id="latitudWATT" name="latitudWATT" placeholder="000000000000000" readonly value="<?php echo $doctorEditar->latitudWATT ?>">
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">longitud</label>
				<input type="text" class="form-control" id="longitudWATT" name="longitudWATT" placeholder="000000000000000" readonly value="<?php echo $doctorEditar->longitudWATT ?>">
			</div>
		</div>
		<div class="col-md-12">
				<div class="mb-3">
					<label for="" class="form-label">Actualizar Carnet (Opcional)</label>
					<input type="file" class="form-control" id="nueva_foto_doc" name="nueva_foto_doc">
					<input type="hidden" class="form-control" name="foto_doc_actual" value="<?php echo $doctorEditar->carnetWATT; ?>">
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
		var coordenadaCentral = new google.maps.LatLng(<?php echo $doctorEditar->latitudWATT; ?>, <?php echo $doctorEditar->longitudWATT; ?>);
		var miMapa = new google.maps.Map(document.getElementById('mapa'), {
			center: coordenadaCentral,
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marcador = new google.maps.Marker({
			position: coordenadaCentral,
			map: miMapa,
			title: 'Seleccione la ubicación del doctor',
			draggable: true
		});
		google.maps.event.addListener(marcador, 'dragend', function(event) {
			var latitud = this.getPosition().lat();
			var longitud = this.getPosition().lng();
			document.getElementById('latitudWATT').value = latitud;
			document.getElementById('longitudWATT').value = longitud;
		});
	}
</script>
