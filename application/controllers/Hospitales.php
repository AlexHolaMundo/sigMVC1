<?php
class Hospitales extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Hospital");
	}
	//Renderizacion de la vista index de hospitales
	public function index()
	{
		$data["listadoHospitales"] = $this->Hospital->consultarTodos();
		$this->load->view("../views/templates/header");
		$this->load->view("hospitales/index", $data);
		$this->load->view("../views/templates/footer");
	}
	//Eliminando un hospital por su id por GET
	public function borrar($id_hos)
	{
		$this->Hospital->eliminar($id_hos);
		$this->session->set_flashdata("alerta", "El hospital se ha eliminado exitosamente");
		redirect("hospitales/index");
	}
	//Renderizacion de la vista nuevo de hospitales
	public function nuevo()
	{
		$this->load->view("../views/templates/header");
		$this->load->view("hospitales/nuevo");
		$this->load->view("../views/templates/footer");
	}
	//Insertar datos en la tabla hospital
	public function guardar()
	{
		/* INICIO PROCESO DE SUBIDA DE ARCHIVO */
		$config['upload_path'] = APPPATH . '../uploads/hospitales/'; //ruta de subida de archivos
		$config['allowed_types'] = 'jpeg|jpg|png'; //tipo de archivos permitidos
		$config['max_size'] = 5 * 1024; //definir el peso maximo de subida (5MB)
		$nombre_aleatorio = "hospital_" . time() * rand(100, 10000); //creando un nombre aleatorio
		$config['file_name'] = $nombre_aleatorio; //asignando el nombre al archivo subido
		$this->load->library('upload', $config); //cargando la libreria UPLOAD
		if ($this->upload->do_upload("foto_hos")) { //intentando subir el archivo
			$dataArchivoSubido = $this->upload->data(); //capturando informacion del archivo subido
			$nombre_archivo_subido = $dataArchivoSubido["file_name"]; //obteniendo el nombre del archivo
		} else {
			$nombre_archivo_subido = ""; //Cuando no se sube el archivo el nombre queda VACIO
		}
		$datosNuevoHospital = array(
			"nombre_hos" => $this->input->post("nombre_hos"),
			"direccion_hos" => $this->input->post("direccion_hos"),
			"telefono_hos" => $this->input->post("telefono_hos"),
			"latitud_hos" => $this->input->post("latitud_hos"),
			"longitud_hos" => $this->input->post("longitud_hos"),
			"foto_hos" => $nombre_archivo_subido
		);
		$this->Hospital->insertar($datosNuevoHospital);
		enviarEmail("walter.tipanluisa5714@utc.edu.ec","CREACION",
			"<h1>SE CREO EL Hospital </h1>".$datosNuevoHospital['nombre_hos']);
		$this->session->set_flashdata("alerta", "El hospital se ha guardado exitosamente");
		redirect("hospitales/index");
	}

	//Editar un hospital por su id por GET
	public function editar($id)
	{
		$data["hospitalEditar"] = $this->Hospital->obtenerPorId($id);
		$this->load->view("../views/templates/header");
		$this->load->view("hospitales/editar", $data);
		$this->load->view("../views/templates/footer");
	}
	//Actualizar datos en la tabla hospital
	public function actualizarHospital()
{
    $id_hos = $this->input->post("id_hos");

    // Obtener información del hospital antes de la actualización
    $hospitalActual = $this->Hospital->obtenerPorId($id_hos);

    // INICIO PROCESO DE SUBIDA DE ARCHIVO
    $config['upload_path'] = APPPATH . '../uploads/hospitales/'; // ruta de subida de archivos
    $config['allowed_types'] = 'jpeg|jpg|png'; // tipo de archivos permitidos
    $config['max_size'] = 5 * 1024; // definir el peso máximo de subida (5MB)

    // Verificar si se está intentando subir una nueva foto
    if ($_FILES['nueva_foto_hos']['error'] != 4) { // Error 4 significa que no se seleccionó ningún archivo
        $nombre_aleatorio = "hospital_" . time() * rand(100, 10000); // creando un nombre aleatorio
        $config['file_name'] = $nombre_aleatorio; // asignando el nombre al archivo subido

        $this->load->library('upload', $config); // cargando la librería UPLOAD

        if ($this->upload->do_upload("nueva_foto_hos")) { // intentando subir el nuevo archivo
            $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
            $nombre_archivo_subido = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
            // Eliminar la foto anterior si existe
            if (!empty($hospitalActual->foto_hos)) {
                $ruta_foto_anterior = APPPATH . '../uploads/hospitales/' . $hospitalActual->foto_hos;
                if (file_exists($ruta_foto_anterior)) {
                    unlink($ruta_foto_anterior);
                }
            }
        } else {
            $nombre_archivo_subido = $hospitalActual->foto_hos; // Conservar la foto actual si la subida falla
        }
    } else {
        $nombre_archivo_subido = $hospitalActual->foto_hos; // Conservar la foto actual si no se selecciona una nueva
    }

    // Datos actualizados del hospital
    $datosHospital = array(
        "nombre_hos" => $this->input->post("nombre_hos"),
        "direccion_hos" => $this->input->post("direccion_hos"),
        "telefono_hos" => $this->input->post("telefono_hos"),
        "latitud_hos" => $this->input->post("latitud_hos"),
        "longitud_hos" => $this->input->post("longitud_hos"),
        "foto_hos" => $nombre_archivo_subido
    );

    $this->Hospital->actualizar($id_hos, $datosHospital);
    $this->session->set_flashdata("alerta", "Hospital actualizado exitosamente");
    redirect('hospitales/index');
}

} //Cierre de  la clase
