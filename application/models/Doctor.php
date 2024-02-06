<?php
class Doctor extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Insertar Nuevos doctores
	function insertar($datos)
	{
		$respuesta = $this->db->insert("doctorWATT", $datos);
		return $respuesta;
	}
	//Consultar Datos
	function consultarTodos()
	{
		$doctores = $this->db->get("doctorWATT");
		if ($doctores->num_rows() > 0) {
			return $doctores->result();
		} else {
			return false;
		}
	}
	//Eliminar Doctor Por ID
	function eliminar($id){
		$this->db->where("id_WATT", $id);
		$return = $this->db->delete("doctorWATT");
	}
	//Obtener Doctor Por ID
	function obtenerPorId($id){
		$this->db->where("id_WATT", $id);
		$doctores = $this->db->get("doctorWATT");
		if ($doctores->num_rows() > 0) {
			return $doctores->row();
		} else {
			return false;
		}
	}
	//Funcion para actualizar
	function actualizar($id, $datos){
		$this->db->where("id_WATT", $id);
		$return = $this->db->update("doctorWATT", $datos);
		return $return;
	}
}
//FIN DE LA CLASE DOCTOR
