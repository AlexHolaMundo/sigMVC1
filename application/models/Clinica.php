<?php
class Clinica extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Insertar Nuevas clinicas
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
	//Eliminar Clinica Por ID
	function eliminar($id){
		$this->db->where("id_aj", $id);
		$return = $this->db->delete("clinica");
	}

	//Obtener Clinica Por ID
	function obtenerPorId($id){
		$this->db->where("id_aj", $id);
		$clinicas = $this->db->get("clinica");
		if ($clinicas->num_rows() > 0) {
			return $clinicas->row();
		} else {
			return false;
		}
	}
	//Funcion para actualizar
	function actualizar($id, $datos){
		$this->db->where("id_aj", $id);
		$return = $this->db->update("clinica", $datos);
		return $return;
	}
}
//FIN DE LA CLASE HOSPITAL
