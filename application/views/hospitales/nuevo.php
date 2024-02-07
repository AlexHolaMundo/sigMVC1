<div class="container">
	<form action="<?php echo site_url('hospitales/guardar'); ?>" class="m-4" method="post" enctype="multipart/form-data" id="formHospitales">
		<h3 class="text-center">Registrar Hospital</h3>
		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label for="" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre_hos" name="nombre_hos" placeholder="IESS">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label for="" class="form-label">Direccion</label>
					<input type="text" class="form-control" id="direccion_hos" name="direccion_hos" placeholder="Av. Example">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-3">
					<label for="" class="form-label">Telefono</label>
					<input type="text" class="form-control" id="telefono_hos" name="telefono_hos" placeholder="000 0000 0000" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-3">
					<label for="" class="form-label">Fotografia</label>
					<input type="file" class="form-control" id="foto_hos" name="foto_hos" accept="image/*" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Latitud</label>
				<input type="text" class="form-control" id="latitud_hos" name="latitud_hos" placeholder="000000000000000" readonly>
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">longitud</label>
				<input type="text" class="form-control" id="longitud_hos" name="longitud_hos" placeholder="000000000000000" readonly>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 m-2">
				<legend class="text-center">Arrastra el marcador hacia la ubicacion</legend>
				<div id="mapa" style="width: 100%; height:310px; border: 1px solid gray; border-radius:1rem;"></div>
			</div>
		</div>
		<center>
			<button type="submit" class="btn btn-outline-primary">Guardar <i class="fa-regular fa-floppy-disk"></i></button>&nbsp;&nbsp;
			<a type="" href="<?php echo site_url('hospitales/index'); ?>" class="btn btn-outline-warning">Cancelar <i class="fa-regular fa-circle-xmark"></i></a>
		</center>
	</form>
</div>
<script>
	function initMap() {
		var coordenadaCentral = new google.maps.LatLng(-0.9171755208692692, -78.6328634793978);
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
<script>
	$(document).ready(function () {
  $('#foto_hos').fileinput({
    //showUpload: false,
    //showRemove: false,
    language: 'es',
  })
})
</script>
