<?php
class Hospital extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Insertar Nuevos Hospitales
	function insertar($datos)
	{
		$respuesta = $this->db->insert("hospital", $datos);
		return $respuesta;
	}
	//Consultar Datos
	function consultarTodos()
	{
		$hospitales = $this->db->get("hospital");
		if ($hospitales->num_rows() > 0) {
			return $hospitales->result();
		} else {
			return false;
		}
	}
	//Eliminar Hospital Por ID
	function eliminar($id){
		$this->db->where("id_hos", $id);
		$return = $this->db->delete("hospital");
	}

	//Obtener Hospital Por ID
	function obtenerPorId($id){
		$this->db->where("id_hos", $id);
		$hospitales = $this->db->get("hospital");
		if ($hospitales->num_rows() > 0) {
			return $hospitales->row();
		} else {
			return false;
		}
	}

	//Funcion para actualizar
	function actualizar($id, $datos){
		$this->db->where("id_hos", $id);
		$return = $this->db->update("hospital", $datos);
		return $return;
	}
}
//FIN DE LA CLASE HOSPITAL
