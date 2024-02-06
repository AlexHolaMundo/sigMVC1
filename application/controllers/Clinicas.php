<?php
class Clinicas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Clinica");
	}
	//Renderizacion de la vista index de clinicas
	public function index()
	{
		$data["listadoClinicas"] = $this->Clinica->consultarTodos();
		$this->load->view("../views/templates/header");
		$this->load->view("clinicas/index", $data);
		$this->load->view("../views/templates/footer");
	}
	//Eliminando una clinica por su id por GET
	public function borrar($id_aj)
	{
		$this->Clinica->eliminar($id_aj);
		$this->session->set_flashdata('alerta', 'Clinica eliminada exitosamente');
		redirect("clinicas/index");
	}
	//Renderizacion de la vista nuevo de clinicas
	public function nuevo()
	{
		$this->load->view("../views/templates/header");
		$this->load->view("clinicas/nuevo");
		$this->load->view("../views/templates/footer");
	}
	//Insertar datos en la tabla clinica
	public function guardar()
	{
		/* INICIO PROCESO DE SUBIDA DE ARCHIVO */
		$config['upload_path'] = APPPATH . '../uploads/clinicas/'; //ruta de subida de archivos
		$config['allowed_types'] = 'jpeg|jpg|png'; //tipo de archivos permitidos
		$config['max_size'] = 6 * 1024; //definir el peso maximo de subida (5MB)
		$nombre_aleatorio = "clinica_" . time() * rand(100, 10000); //creando un nombre aleatorio
		$config['file_name'] = $nombre_aleatorio; //asignando el nombre al archivo subido
		$this->load->library('upload', $config); //cargando la libreria UPLOAD
		if ($this->upload->do_upload("fotografia")) { //intentando subir el archivo
			$dataArchivoSubido = $this->upload->data(); //capturando informacion del archivo subido
			$nombre_archivo_subido = $dataArchivoSubido["file_name"]; //obteniendo el nombre del archivo
		} else {
			$nombre_archivo_subido = ""; //Cuando no se sube el archivo el nombre queda VACIO
		}
		$datosNuevoClinica = array(
			"nombre_aj" => $this->input->post("nombre_aj"),
			"ruc_aj" => $this->input->post("ruc_aj"),
			"propietario_aj" => $this->input->post("propietario_aj"),
			"fechafundacion_aj" => $this->input->post("fechafundacion_aj"),
			"fotografia" => $nombre_archivo_subido,
			"latitud_aj" => $this->input->post("latitud_aj"),
			"longitud_aj" => $this->input->post("longitud_aj")
		);
		$this->Clinica->insertar($datosNuevoClinica);
		//Definiendo mensaje de exito en el correo
		enviarEmail(
			"walter.tipanluisa5714@utc.edu.ec",
			"CREACION",
			"<h1>SE CREO LA CLINICA </h1>" . $datosNuevoClinica['nombre_aj']
		);
		//Definiendo mensaje de exito
		// Mostrar la alerta usando SweetAlert2
		$this->session->set_flashdata('alerta', 'Clinica registrada exitosamente');
		redirect("clinicas/index");
	}
	//Editar una clinica por su id por GET
	public function editar($id)
	{
		$data["clinicaEditar"] = $this->Clinica->obtenerPorId($id);
		$this->load->view("../views/templates/header");
		$this->load->view("clinicas/editar", $data);
		$this->load->view("../views/templates/footer");
	}

	//Actualizar datos en la tabla clinica
	public function actualizarClinica()
	{
		$id_aj = $this->input->post("id_aj");

		// Obtener información del hospital antes de la actualización
		$clinicaActual = $this->Clinica->obtenerPorId($id_aj);

		// INICIO PROCESO DE SUBIDA DE ARCHIVO
		$config['upload_path'] = APPPATH . '../uploads/clinicas/'; // ruta de subida de archivos
		$config['allowed_types'] = 'jpeg|jpg|png'; // tipo de archivos permitidos
		$config['max_size'] = 5 * 1024; // definir el peso máximo de subida (5MB)

		// Verificar si se está intentando subir una nueva foto
		if ($_FILES['nueva_foto_cli']['error'] != 4) { // Error 4 significa que no se seleccionó ningún archivo
			$nombre_aleatorio = "clinica_" . time() * rand(100, 10000); // creando un nombre aleatorio
			$config['file_name'] = $nombre_aleatorio; // asignando el nombre al archivo subido

			$this->load->library('upload', $config); // cargando la librería UPLOAD

			if ($this->upload->do_upload("nueva_foto_cli")) { // intentando subir el nuevo archivo
				$dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
				$nombre_archivo_subido = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
				// Eliminar la foto anterior si existe
				if (!empty($clinicaActual->fotografia)) {
					$ruta_foto_anterior = APPPATH . '../uploads/clinicas/' . $clinicaActual->fotografia;
					if (file_exists($ruta_foto_anterior)) {
						unlink($ruta_foto_anterior);
					}
				}
			} else {
				$nombre_archivo_subido = $clinicaActual->fotografia; // Conservar la foto actual si la subida falla
			}
		} else {
			$nombre_archivo_subido = $clinicaActual->fotografia; // Conservar la foto actual si no se selecciona una nueva
		}
		$datosClinica = array(
			"nombre_aj" => $this->input->post("nombre_aj"),
			"ruc_aj" => $this->input->post("ruc_aj"),
			"propietario_aj" => $this->input->post("propietario_aj"),
			"fechafundacion_aj" => $this->input->post("fechafundacion_aj"),
			"fotografia" => $nombre_archivo_subido,
			"latitud_aj" => $this->input->post("latitud_aj"),
			"longitud_aj" => $this->input->post("longitud_aj"),
		);
		$this->Clinica->actualizar($id_aj, $datosClinica);
		//Definiendo mensaje de exito
		$this->session->set_flashdata('alerta', 'Clinica actualizada exitosamente');
		redirect("clinicas/index");
	}
} //Cierre de  la clase
