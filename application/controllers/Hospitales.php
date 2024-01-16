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
		$this->load->view("hospitales/index",$data);
		$this->load->view("../views/templates/footer");
	}
	//Eliminando un hospital por su id por GET
	public function borrar($id_hos)
	{
		$this->Hospital->eliminar($id_hos);
		$this->session->set_flashdata("confirmacion","El hospital se ha eliminado exitosamente");
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
	public function guardar() {
		$datosNuevoHospital = array(
			"nombre_hos" => $this->input->post("nombre_hos"),
			"direccion_hos" => $this->input->post("direccion_hos"),
			"telefono_hos" => $this->input->post("telefono_hos"),
			"latitud_hos" => $this->input->post("latitud_hos"),
			"longitud_hos" => $this->input->post("longitud_hos")
		);
		$this->Hospital->insertar($datosNuevoHospital);
		$this->session->set_flashdata("confirmacion","El hospital se ha guardado exitosamente");
		redirect("hospitales/index");
	}
} //Cierre de  la clase
