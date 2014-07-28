<?php 
class Reservas_model extends CI_Model {
	
	function insertReserva($datos){
			
		$this->db->insert('reservas', $datos);
		
		$id_reserva=$this->db->insert_id();
		
		return $id_reserva;	
	}
	
	function getReserva($id){
		$query = $this->db->query("SELECT 
									reservas.entrada as entrada,
									reservas.salida as salida,
									reservas.adultos as adultos,
									reservas.menores as menores,
									habitaciones.habitacion as habitacion,
									hoteles.hotel as hotel
									FROM 
									reservas
									INNER JOIN 
									habitaciones ON(reservas.id_habitacion=habitaciones.id_habitacion)
									INNER JOIN 
									hoteles ON(hoteles.id_hotel=habitaciones.id_hotel)
									WHERE reservas.id_reserva='$id' ");
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	function getCantNuevas(){
		$query = $this->db->query("SELECT * FROM reservas WHERE id_estado_reserva=1 ");
		
		return $query->num_rows();
	}
	
	function getNuevas(){
		$query = $this->db->query("SELECT * FROM reservas
									INNER JOIN habitaciones
									ON(reservas.id_habitacion=habitaciones.id_habitacion)
									INNER JOIN huespedes
									ON(reservas.id_huesped=huespedes.id_huesped) 
									WHERE id_estado_reserva=1 ");
		
		if($query->result()>0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
				
			}	
		}else{
				return 0;
		}
		
		
		return $data;
	}
	
	
} 
?>
