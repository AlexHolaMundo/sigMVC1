<?php
class Doctores extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Doctor");
	}
	//Renderizacion de la vista index de doctores
	public function index()
	{
		$data["listadoDoctores"] = $this->Doctor->consultarTodos();
		$this->load->view("../views/templates/header");
		$this->load->view("doctores/index",$data);
		$this->load->view("../views/templates/footer");
	}
	//Eliminando un doctor por su id por GET
	public function borrar($id_WATT)
	{
		$this->Doctor->eliminar($id_WATT);
		$this->session->set_flashdata('alerta', 'Doctor eliminado exitosamente');
		redirect("doctores/index");
	}
	//Renderizacion de la vista nuevo de doctores
	public function nuevo()
	{
		$this->load->view("../views/templates/header");
		$this->load->view("doctores/nuevo");
		$this->load->view("../views/templates/footer");
	}

	//Insertar datos en la tabla doctores
	public function guardar()
	{
		/* INICIO PROCESO DE SUBIDA DE ARCHIVO */
		$config['upload_path'] = APPPATH . '../uploads/doctores/'; //ruta de subida de archivos
		$config['allowed_types'] = 'jpeg|jpg|png'; //tipo de archivos permitidos
		$config['max_size'] = 6 * 1024; //definir el peso maximo de subida (5MB)
		$nombre_aleatorio = "doctor_" . time() * rand(100, 10000); //creando un nombre aleatorio
		$config['file_name'] = $nombre_aleatorio; //asignando el nombre al archivo subido
		$this->load->library('upload', $config); //cargando la libreria UPLOAD
		if ($this->upload->do_upload("carnetWATT")) { //intentando subir el archivo
			$dataArchivoSubido = $this->upload->data(); //capturando informacion del archivo subido
			$nombre_archivo_subido = $dataArchivoSubido["file_name"]; //obteniendo el nombre del archivo
		} else {
			$nombre_archivo_subido = ""; //Cuando no se sube el archivo el nombre queda VACIO
		}
		$datosNuevoDoctor = array(
			"primer_apellidoWATT" => $this->input->post("primer_apellidoWATT"),
			"segundo_apellidoWATT" => $this->input->post("segundo_apellidoWATT"),
			"nombreWATT" => $this->input->post("nombreWATT"),
			'fecha_nacimientoWATT' => $this->input->post('fecha_nacimientoWATT'),
			"identificacionWATT" => $this->input->post("identificacionWATT"),
			"nacionalidadWATT" => $this->input->post("nacionalidadWATT"),
			"latitudWATT" => $this->input->post("latitudWATT"),
			"longitudWATT" => $this->input->post("longitudWATT"),
			"carnetWATT" => $nombre_archivo_subido,
		);
		$this->Doctor->insertar($datosNuevoDoctor);
		//Definiendo mensaje de exito en el correo
		enviarEmail("walter.tipanluisa5714@utc.edu.ec","CREACION",
    		"<h1>SE CREO EL DOCTOR </h1>".$datosNuevoDoctor['nombreWATT']);
		//Definiendo mensaje de exito
		$this->session->set_flashdata('alerta', 'Doctor registrado exitosamente');
		redirect("doctores/index");
	}
	//Editar un doctor por su id por GET
	public function editar($id)
	{
		$data["doctorEditar"] = $this->Doctor->obtenerPorId($id);
		$this->load->view("../views/templates/header");
		$this->load->view("doctores/editar",$data);
		$this->load->view("../views/templates/footer");
	}
	//Actualizar datos en la tabla doctores
	public function actualizarDoctor()
	{
	$id_WATT = $this->input->post("id_WATT");

    // Obtener información del hospital antes de la actualización
    $doctorActual = $this->Doctor->obtenerPorId($id_WATT);

    // INICIO PROCESO DE SUBIDA DE ARCHIVO
    $config['upload_path'] = APPPATH . '../uploads/doctores/'; // ruta de subida de archivos
    $config['allowed_types'] = 'jpeg|jpg|png'; // tipo de archivos permitidos
    $config['max_size'] = 5 * 1024; // definir el peso máximo de subida (5MB)

    // Verificar si se está intentando subir una nueva foto
    if ($_FILES['nueva_foto_doc']['error'] != 4) { // Error 4 significa que no se seleccionó ningún archivo
        $nombre_aleatorio = "doctor_" . time() * rand(100, 10000); // creando un nombre aleatorio
        $config['file_name'] = $nombre_aleatorio; // asignando el nombre al archivo subido

        $this->load->library('upload', $config); // cargando la librería UPLOAD

        if ($this->upload->do_upload("nueva_foto_doc")) { // intentando subir el nuevo archivo
            $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
            $nombre_archivo_subido = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
            // Eliminar la foto anterior si existe
            if (!empty($doctorActual->carnetWATT)) {
                $ruta_foto_anterior = APPPATH . '../uploads/doctores/' . $doctorActual->carnetWATT;
                if (file_exists($ruta_foto_anterior)) {
                    unlink($ruta_foto_anterior);
                }
            }
        } else {
            $nombre_archivo_subido = $doctorActual->carnetWATT; // Conservar la foto actual si la subida falla
        }
    } else {
        $nombre_archivo_subido = $doctorActual->carnetWATT; // Conservar la foto actual si no se selecciona una nueva
    }
		$datosDoctor = array(
			"primer_apellidoWATT" => $this->input->post("primer_apellidoWATT"),
			"segundo_apellidoWATT" => $this->input->post("segundo_apellidoWATT"),
			"nombreWATT" => $this->input->post("nombreWATT"),
			'fecha_nacimientoWATT' => $this->input->post('fecha_nacimientoWATT'),
			"identificacionWATT" => $this->input->post("identificacionWATT"),
			"nacionalidadWATT" => $this->input->post("nacionalidadWATT"),
			"latitudWATT" => $this->input->post("latitudWATT"),
			"longitudWATT" => $this->input->post("longitudWATT"),
			"carnetWATT" => $nombre_archivo_subido
		);
		$this->Doctor->actualizar($id_WATT, $datosDoctor);
		$this->session->set_flashdata('alerta', 'Doctor actualizado exitosamente');
		redirect("doctores/index");
	}
}//Cierre de  la clase
