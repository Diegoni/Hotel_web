<?php 
class Habitaciones_model extends CI_Model {
	
	function getHabitaciones($consulta=NULL){
		if(isset($consulta['tipo'])){
			$query = $this->db->query("SELECT * FROM habitaciones
									INNER JOIN tarifas ON(habitaciones.id_tarifa=tarifas.id_tarifa) 
									INNER JOIN monedas ON(tarifas.id_moneda=monedas.id_moneda)
									WHERE id_hotel='$consulta[hotel]'
									AND id_tipo_habitacion='$consulta[tipo]' 
									ORDER BY id_hotel");	
		}else{
			$query = $this->db->query("SELECT * FROM habitaciones
									INNER JOIN tarifas ON(habitaciones.id_tarifa=tarifas.id_tarifa) 
									INNER JOIN monedas ON(tarifas.id_moneda=monedas.id_moneda)
									WHERE id_hotel='$consulta[hotel]' 
									ORDER BY id_hotel");
		}
		
		
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			$data=array();
			return $data;
		}
	}

} 
?>
