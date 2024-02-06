<div class="container">
	<form action="<?php echo site_url('clinicas/actualizarClinica'); ?>" class="m-4" method="post" enctype="multipart/form-data">
		<h3 class="text-center">Editar Clinica</h3>
		<div class="row">
			<input type="hidden" name="id_aj" id="id_aj" value="<?php echo $clinicaEditar->id_aj ?>">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Nombre</label>
				<input type="text" class="form-control" id="nombre_aj" name="nombre_aj" placeholder="SANTA CECILIA" value="<?php echo $clinicaEditar->nombre_aj ?>">
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Ruc</label>
				<input type="text" class="form-control" id="ruc_aj" name="ruc_aj" placeholder="0000000000000" value="<?php echo $clinicaEditar->ruc_aj ?>">
			</div>
		</div>
		<div class="row">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Propietario</label>
				<input type="text" class="form-control" id="propietario_aj" name="propietario_aj" placeholder="ALGUIEN GENIAL" value="<?php echo $clinicaEditar->propietario_aj ?>">
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Fecha de Fundacion</label>
				<input type="date" class="form-control" id="fechafundacion_aj" name="fechafundacion_aj" value="<?php echo $clinicaEditar->fechafundacion_aj ?>">
			</div>
		</div>
		<div class="col-md-12">
			<div class="mb-3">
				<label for="" class="form-label">Actualizar Fotografia (Opcional)</label>
				<input type="file" class="form-control" id="nueva_foto_cli" name="nueva_foto_cli">
				<input type="hidden" name="foto_cli_actual" value="<?php echo $clinicaEditar->fotografia; ?>">
			</div>
		</div>
		<div class="row">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Latitud</label>
				<input type="text" class="form-control" id="latitud_aj" name="latitud_aj" placeholder="000000000000000" readonly value="<?php echo $clinicaEditar->latitud_aj ?>">
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">longitud</label>
				<input type="text" class="form-control" id="longitud_aj" name="longitud_aj" placeholder="000000000000000" readonly value="<?php echo $clinicaEditar->longitud_aj ?>">
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
			<a type="" href="<?php echo site_url('clinicas/index'); ?>" class="btn btn-outline-warning">Cancelar <i class="fa-regular fa-circle-xmark"></i></a>
		</center>
	</form>
</div>
<script>
	function initMap() {
		var coordenadaCentral = new google.maps.LatLng(<?php echo $clinicaEditar->latitud_aj; ?>, <?php echo $clinicaEditar->longitud_aj; ?>);
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
			document.getElementById('latitud_aj').value = latitud;
			document.getElementById('longitud_aj').value = longitud;
		});
	}
</script>
