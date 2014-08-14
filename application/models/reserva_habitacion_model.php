<?php 
class Reserva_habitacion_model extends CI_Model {
	
	function insertReserva_habitacion($id_reserva, $habitaciones){
		$habitaciones_post=array();
		
		foreach ($habitaciones as $id => $cantidad) {
			$datos=array('id_reserva'=>$id_reserva,
							'id_habitacion'=>$id,
							'cantidad'=> $cantidad, 
							'prioridad'=>0					
							);
			$this->db->insert('reserva_habitacion', $datos);
			array_push($habitaciones_post, $this->db->insert_id());				
		}
		
		return $habitaciones_post;	
	}
	
	
	
	function getReserva($id_reserva){
		$query=$this->db->query("SELECT 
							reservas.entrada as entrada,
							reservas.salida as salida,
							habitaciones.habitacion as habitacion,
							reserva_habitacion.cantidad as cantidad,
							hoteles.hotel as hotel
							FROM `reserva_habitacion` 
							INNER JOIN reservas ON(reserva_habitacion.id_reserva=reservas.id_reserva)
							INNER JOIN habitaciones ON(reserva_habitacion.id_habitacion=habitaciones.id_habitacion)
							INNER JOIN hoteles ON(habitaciones.id_hotel=hoteles.id_hotel)
							WHERE reserva_habitacion.id_reserva='$id_reserva'");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
		
		return $data;
	}
	
	
	
	function getReservas_habitacion($habitaciones, $consulta){
				
		foreach ($habitaciones as $habitacion) {
			$query=$this->db->query("SELECT 
							reserva_habitacion.cantidad as cantidad,
							reserva_habitacion.id_habitacion as id_habitacion
							FROM `reserva_habitacion` 
							INNER JOIN reservas ON(reserva_habitacion.id_reserva=reservas.id_reserva)
							INNER JOIN estados_reserva ON(estados_reserva.id_estado_reserva=reservas.id_estado_reserva)
							WHERE (DATE_FORMAT(reservas.salida, '%d-%m-%Y') >= '$consulta[entrada]' 
							AND DATE_FORMAT(reservas.entrada, '%d-%m-%Y') <= '$consulta[salida]')
							AND reserva_habitacion.id_habitacion = '$habitacion->id_habitacion' 
							AND (estados_reserva.reserva_lugar=1)
							");
			if($query->num_rows() > 0){
				foreach ($query->result() as $fila){
					$data[] = $fila;
				}
			}	
			
		}
		
		if(isset($data)){
			return $data;	
		}
			
				
	}	
	
		
} 
?>
