$.validator.addMethod(
	"lettersonly",
	function (value, element) {
		return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
	},
	"Solo se permiten letras en este campo"
);
// Validacion del formulario de registro de clinicas
$(document).ready(function () {
	$("#formClinicas").validate({
		rules: {
			nombre_aj: {
				required: true,
				lettersonly: true,
				minlength: 5,
				maxlength: 50,
			},
			ruc_aj: {
				required: true,
				number: true,
				minlength: 13,
				maxlength: 13,
			},
			propietario_aj: {
				required: true,
				lettersonly: true,
				minlength: 3,
				maxlength: 50,
			},
			fechafundacion_aj: {
				required: true,
				date: true,
			},
			fotografia: {
				required: true,
				extension: "jpg|png|jpeg",
			},
			latitud_aj: {
				required: true,
				number: true,
			},
			longitud_aj: {
				required: true,
				number: true,
			},
		},
		messages: {
			nombre_aj: {
				required: "El nombre de la clinica es obligatorio",
				lettersonly: "Solo se permiten letras en este campo",
				minlength: "El nombre de la clinica debe tener al menos 5 caracteres",
				maxlength:
					"El nombre de la clinica debe tener como máximo 50 caracteres",
			},
			ruc_aj: {
				required: "El ruc de la clinica es obligatorio",
				number: "Solo se permiten numeros en este campo",
				minlength: "El ruc de la clinica debe tener 13 caracteres",
				maxlength: "El ruc de la clinica debe tener 13 caracteres",
			},
			propietario_aj: {
				required: "El propietario de la clinica es obligatorio",
				lettersonly: "Solo se permiten letras en este campo",
				minlength:
					"El propietario de la clinica debe tener al menos 3 caracteres",
				maxlength:
					"El propietario de la clinica debe tener como máximo 50 caracteres",
			},
			fechafundacion_aj: {
				required: "La fecha de fundacion de la clinica es obligatoria",
				date: "La fecha de fundacion de la clinica debe ser una fecha valida",
			},
			fotografia: {
				required: "La fotografia de la clinica es obligatoria",
				extension: "Solo se permiten archivos jpg, png o jpeg",
			},
			latitud_aj: {
				required: "La latitud de la clinica es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
			longitud_aj: {
				required: "La longitud de la clinica es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
		},
	});
});

// Validacion del formulario de registro de doctores
$(document).ready(function () {
	$("#formDoctores").validate({
		rules: {
			primer_apellidoWATT: {
				required: true,
				lettersonly: true,
				minlength: 5,
				maxlength: 50,
			},
			segundo_apellidoWATT: {
				required: true,
				lettersonly: true,
				minlength: 5,
				maxlength: 50,
			},
			nombreWATT: {
				required: true,
				lettersonly: true,
				minlength: 5,
				maxlength: 50,
			},
			fecha_nacimientoWATT: {
				required: true,
				date: true,
			},
			identificacionWATT: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			nacionalidadWATT: {
				required: true,
				lettersonly: true,
				minlength: 5,
				maxlength: 50,
			},
			latitudWATT: {
				required: true,
				number: true,
			},
			longitudWATT: {
				required: true,
				number: true,
			},
			carnetWATT: {
				required: true,
				extension: "jpg|png|jpeg",
			},
		},
		messages: {
			primer_apellidoWATT: {
				required: "El nombre de la clinica es obligatorio",
				lettersonly: "Solo se permiten letras en este campo",
				minlength: "El nombre de la clinica debe tener al menos 5 caracteres",
				maxlength:
					"El nombre de la clinica debe tener como máximo 50 caracteres",
			},
			segundo_apellidoWATT: {
				required: "El ruc de la clinica es obligatorio",
				lettersonly: "Solo se permiten letras en este campo",
				minlength: "El ruc de la clinica debe tener 13 caracteres",
				maxlength: "El ruc de la clinica debe tener 13 caracteres",
			},
			nombreWATT: {
				required: "El propietario de la clinica es obligatorio",
				lettersonly: "Solo se permiten letras en este campo",
				minlength:
					"El propietario de la clinica debe tener al menos 3 caracteres",
				maxlength:
					"El propietario de la clinica debe tener como máximo 50 caracteres",
			},
			fecha_nacimientoWATT: {
				required: "La fecha de fundacion de la clinica es obligatoria",
				date: "La fecha de fundacion de la clinica debe ser una fecha valida",
			},
			identificacionWATT: {
				required: "La fotografia de la clinica es obligatoria",
				extension: "Solo se permiten archivos jpg, png o jpeg",
			},
			nacionalidadWATT: {
				required: "La latitud de la clinica es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
			latitudWATT: {
				required: "La latitud de la clinica es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
			longitudWATT: {
				required: "La longitud de la clinica es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
			carnetWATT: {
				required: "La fotografia de la clinica es obligatoria",
				extension: "Solo se permiten archivos jpg, png o jpeg",
			},
		},
	});
});

// Validacion del formulario de registro de hospitales
$(document).ready(function () {
	$("#formHospitales").validate({
		rules: {
			nombre_hos: {
				required: true,
				lettersonly: true,
				minlength: 5,
				maxlength: 50,
			},
			direccion_hos: {
				required: true,
				minlength: 5,
				maxlength: 50,
			},
			telefono_hos: {
				required: true,
				number: true,
				minlength: 7,
				maxlength: 10,
			},
			foto_hos: {
				required: true,
				extension: "jpg|png|jpeg",
			},
			latitud_hos: {
				required: true,
				number: true,
			},
			longitud_hos: {
				required: true,
				number: true,
			},
		},
		messages: {
			nombre_hos: {
				required: "El nombre del hospital es obligatorio",
				lettersonly: "Solo se permiten letras en este campo",
				minlength: "El nombre del hospital debe tener al menos 5 caracteres",
				maxlength:
					"El nombre del hospital debe tener como máximo 50 caracteres",
			},
			direccion_hos: {
				required: "La direccion del hospital es obligatoria",
				minlength: "La direccion del hospital debe tener al menos 5 caracteres",
				maxlength:
					"La direccion del hospital debe tener como máximo 50 caracteres",
			},
			telefono_hos: {
				required: "El telefono del hospital es obligatorio",
				number: "Solo se permiten numeros en este campo",
				minlength: "El telefono del hospital debe tener al menos 7 caracteres",
				maxlength:
					"El telefono del hospital debe tener como máximo 10 caracteres",
			},
			foto_hos: {
				required: "La fotografia del hospital es obligatoria",
				extension: "Solo se permiten archivos jpg, png o jpeg",
			},
			latitud_hos: {
				required: "La latitud del hospital es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
			longitud_hos: {
				required: "La longitud del hospital es obligatoria",
				number: "Solo se permiten numeros en este campo",
			},
		},
	});
});
