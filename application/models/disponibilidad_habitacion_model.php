<?php 
class Disponibilidad_habitacion_model extends CI_Model {
	
	function insertHabitaciones($habitaciones, $id){

		foreach ($habitaciones as $key => $value) {
			$registro=array('id_disponibilidad' 	=> $id,
							'id_habitacion' 		=> $value);
				
			$this->db->insert('disponibilidad_habitacion', $registro); 
            
            $id=$this->db->insert_id();
			
			$query=$this->db->query("SELECT 
							disponibilidad_habitacion.id_habitacion
							FROM `disponibilidad_habitacion` 
							WHERE disponibilidad_habitacion.id_disponibilidad_habitacion='$id'");
			
			foreach ($query->result() as $fila){
				$disponibilidad_habitacion[] = $fila->id_habitacion;
			}

		}
		
		return $disponibilidad_habitacion;
	}
	
		
} 
?>
