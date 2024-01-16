<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!--IMPORTACION DE BOOTSTRAP-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<!--IMPORTACION DE API GOOGLE MAPS-->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgdxqXqRLT18YOGSHvB39ReaAOydX_Ztc&libraries=places&callback=initMap">
	</script>
	<!--IMPORTACION DE FONT AWESOME-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css">
</head>

<body>
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
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<?php if ($this->session->flashdata('alerta')) : ?>
			<script>
				Swal.fire({
					title: "Exito!",
					text: "<?php echo $this->session->flashdata('alerta')?>",
					icon: "success",
				});
			</script>
			<?php $this ->session->set_flashdata('alerta', '')?>
		<?php endif ?>
