<div class="container">
	<form action="<?php echo site_url('doctores/guardar'); ?> " class="m-4" method="post" enctype="multipart/form-data">
		<h3 class="text-center">Registrar Doctor</h3>
		<div class="row">
			<div class="mb-3 col-md-3">
				<label for="" class="form-label">Primer Apellido</label>
				<input type="text" class="form-control" id="primer_apellidoWATT" name="primer_apellidoWATT" placeholder="Sanchez">
			</div>
			<div class="mb-3 col-md-3">
				<label for="" class="form-label">Segundo Apellido</label>
				<input type="text" class="form-control" id="segundo_apellidoWATT" name="segundo_apellidoWATT" placeholder="Mena">
			</div>
			<div class="mb-3 col-md-6">
			<label for="" class="form-label">Nombres</label>
			<input type="text" class="form-control" id="nombreWATT" name="nombreWATT" placeholder="ALGUIEN GENIAL">
		</div>
		</div>
		<div class="row">
		<div class="mb-3 col-md-4">
			<label for="" class="form-label">Fecha de Nacimiento</label>
			<input type="date" class="form-control" id="fecha_nacimientoWATT" name="fecha_nacimientoWATT"  >
		</div>
		<div class="mb-3 col-md-4">
			<label for="" class="form-label">Identificacion</label>
			<input type="text" class="form-control" id="identificacionWATT" name="identificacionWATT"  >
		</div>
		<div class="mb-3 col-md-4">
			<label for="" class="form-label">Nacionalidad</label>
			<input type="text" class="form-control" id="nacionalidadWATT" name="nacionalidadWATT"  >
		</div>
		</div>
		<div class="row">
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">Latitud</label>
				<input type="text" class="form-control" id="latitudWATT" name="latitudWATT" placeholder="000000000000000" readonly>
			</div>
			<div class="mb-3 col-md-6">
				<label for="" class="form-label">longitud</label>
				<input type="text" class="form-control" id="longitudWATT" name="longitudWATT" placeholder="000000000000000" readonly>
			</div>
		</div>
		<div class="mb-3 col-md-12">
			<label for="" class="form-label">Carnet</label>
			<input type="file" accept="image/*" class="form-control" id="carnetWATT" name="carnetWATT"  >
		</div>
		<div class="row">
			<div class="col-md-12 m-2">
				<legend class="text-center">Arrastra el marcador hacia la ubicacion</legend>
				<div id="mapa" style="width: 100%; height:310px; border: 1px solid gray; border-radius:1rem;"></div>
			</div>
		</div>
		<center>
			<button type="submit" class="btn btn-outline-primary">Guardar <i class="fa-regular fa-floppy-disk"></i></button>&nbsp;&nbsp;
			<a type="" href="<?php echo site_url('doctores/index'); ?>" class="btn btn-outline-warning">Cancelar <i class="fa-regular fa-circle-xmark"></i></a>
		</center>
	</form>
</div>
<script>
	function initMap(){
		var coordenadaCentral= new google.maps.LatLng(-0.9171755208692692, -78.6328634793978);
		var miMapa= new google.maps.Map(document.getElementById('mapa'),{
			center: coordenadaCentral,
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marcador= new google.maps.Marker({
			position: coordenadaCentral,
			map: miMapa,
			title:'Seleccione la ubicación del doctor',
			draggable: true
		});
		google.maps.event.addListener(marcador, 'dragend', function(event){
			var latitud = this.getPosition().lat() ;
			var longitud = this.getPosition().lng();
			document.getElementById('latitudWATT').value=latitud;
			document.getElementById('longitudWATT').value=longitud;
		});
	}
</script>
