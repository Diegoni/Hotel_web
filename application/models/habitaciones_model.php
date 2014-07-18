<?php 
class Habitaciones_model extends CI_Model {
	
	function getHabitaciones(){
		$query = $this->db->query("SELECT * FROM habitaciones INNER JOIN tarifas ON(habitaciones.id_tarifa=tarifas.id_tarifa) ORDER BY id_hotel");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}

} 
?>
