<?php
class Clinica extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Insertar Nuevos Hospitales
	function insertar($datos)
	{
		$respuesta = $this->db->insert("clinica", $datos);
		return $respuesta;
	}
	//Consultar Datos
	function consultarTodos()
	{
		$clinicas = $this->db->get("clinica");
		if ($clinicas->num_rows() > 0) {
			return $clinicas->result();
		} else {
			return false;
		}
	}
	//Eliminar Hospital Por ID
	function eliminar($id){
		$this->db->where("id_aj", $id);
		$return = $this->db->delete("clinica");
	}
}
//FIN DE LA CLASE HOSPITAL
