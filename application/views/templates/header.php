<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- jQuery Validate -->
	<script src="<?= base_url('libraries/jquery-validate/jquery.validate.js') ?>"></script>
	<!-- jQuery Validate Addition Schemas -->
	<script src="<?= base_url('js/formSchemas.js') ?>"></script>
	<!-- Bootstrap Select CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
	<!-- FileInput CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css" />

	<!-- Google Maps API -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgdxqXqRLT18YOGSHvB39ReaAOydX_Ztc&libraries=places&callback=initMap"></script>
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css">
	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
</head>

<body>
	<style>
		label.error {
			color: red;
			font-size: 12px;
			font-weight: semibold;
			padding-left: 5px;
		}

		input.error,
		select.error,
		textarea.error {
			border: 1px solid red;
		}
	</style>
	<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?php echo site_url(); ?>">MVC</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo site_url(); ?>">Inicio </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('hospitales/index'); ?>">Hospitales</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('clinicas/index'); ?>">Clinicas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('doctores/index'); ?>">Doctores</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<?php if ($this->session->flashdata('alerta')) : ?>
			<script>
				Swal.fire({
					title: "Exito!",
					text: "<?php echo $this->session->flashdata('alerta') ?>",
					icon: "success",
				});
			</script>
			<?php $this->session->set_flashdata('alerta', '') ?>
		<?php endif ?>
		<!-- Bootstrap Fileinput JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
		<!-- español fileinput -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/locales/es.min.js"></script>
		<script src="<?= base_url('js/fileInput.js') ?>"></script>
