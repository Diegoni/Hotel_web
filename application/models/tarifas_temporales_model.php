<?php 
class Tarifas_temporales_model extends CI_Model {
		
	function getTarifas($habitaciones, $consulta){
		
		foreach ($habitaciones as $habitacion) {
			$query=$this->db->query("SELECT 
							tarifa_habitacion.id_habitacion as id_habitacion,
							tarifas_temporales.id_tarifa_temporal as id_tarifa_temporal
							FROM `tarifa_habitacion` 
							INNER JOIN tarifas_temporales ON(tarifa_habitacion.id_tarifa_temporal=tarifas_temporales.id_tarifa_temporal)
							INNER JOIN tipos_tarifa ON(tarifa_habitacion.id_tarifa_temporal=tarifas_temporales.id_tarifa_temporal)
							WHERE (DATE_FORMAT(tarifas_temporales.salida, '%d-%m-%Y')  >= '$consulta[entrada]' 
							AND DATE_FORMAT(tarifas_temporales.entrada, '%d-%m-%Y') <= '$consulta[salida]')
							AND tarifa_habitacion.id_habitacion = '$habitacion->id_habitacion' 
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
