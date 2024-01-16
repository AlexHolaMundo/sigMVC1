<?php
class Clinicas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Clinica");
	}
	//Renderizacion de la vista index de hospitales
	public function index()
	{
		$data["listadoClinicas"] = $this->Clinica->consultarTodos();
		$this->load->view("../views/templates/header");
		$this->load->view("clinicas/index",$data);
		$this->load->view("../views/templates/footer");
	}
	//Eliminando un hospital por su id por GET
	public function borrar($id_aj)
	{
		$this->Clinica->eliminar($id_aj);
		$this->session->set_flashdata('alerta', 'Clinica eliminada exitosamente');
		redirect("clinicas/index");
	}
	//Renderizacion de la vista nuevo de hospitales
	public function nuevo()
	{
		$this->load->view("../views/templates/header");
		$this->load->view("clinicas/nuevo");
		$this->load->view("../views/templates/footer");
	}
	//Insertar datos en la tabla hospital
	public function guardar() {
		$datosNuevoClinica = array(
			"nombre_aj" => $this->input->post("nombre_aj"),
			"ruc_aj" => $this->input->post("ruc_aj"),
			"propietario_aj" => $this->input->post("propietario_aj"),
			"fechafundacion_aj" => $this->input->post("fechafundacion_aj"),
			"latitud_aj" => $this->input->post("latitud_aj"),
			"longitud_aj" => $this->input->post("longitud_aj")
		);
		$this->Clinica->insertar($datosNuevoClinica);
		//Definiendo mensaje de exito
		$this->session->set_flashdata('alerta', 'Clinica registrada exitosamente');
		redirect("clinicas/index");
	}
} //Cierre de  la clase
