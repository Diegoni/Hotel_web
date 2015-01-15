<?php 
class Disponibilidades_model extends CI_Model {
		
	function getDisponibilidad($habitaciones, $consulta){
		//La consulta envia el mes y el dia cambiados, por eso se hace este cambio	
		$entrada_array	= explode("/", $consulta['entrada']);	
		$nueva_entrada	= $entrada_array[1]."/".$entrada_array[0]."/".$entrada_array[2];

		$salida_array	= explode("/", $consulta['salida']);	
		$nueva_salida	= $salida_array[1]."/".$salida_array[0]."/".$salida_array[2];
				
		foreach ($habitaciones as $habitacion) {
			$query=$this->db->query("SELECT 
							disponibilidad_habitacion.id_habitacion as id_habitacion,
							disponibilidades.id_disponibilidad as id_disponibilidad,
							DATE_FORMAT(disponibilidades.entrada, '%d-%m-%Y') as entrada,
							DATE_FORMAT(disponibilidades.salida, '%d-%m-%Y') as salida
							FROM `disponibilidad_habitacion` 
							INNER JOIN disponibilidades ON(disponibilidad_habitacion.id_disponibilidad=disponibilidades.id_disponibilidad)
							WHERE
							disponibilidad_habitacion.id_habitacion = '$habitacion->id_habitacion'
							AND disponibilidades.delete=0 
							");
			
			if($query->num_rows() > 0){
				foreach ($query->result() as $fila){
					//controlamos si la disponibilidad afecta a la consulta
					if(	$this->mayor($fila->salida, $nueva_entrada) && 
						$this->mayor($nueva_salida, $fila->entrada)){				
						$data[] = $fila;
					}				
				}
			}	
			
		}
		
		if(isset($data)){
			return $data;	
		}
				
	}
	
	//funcion que devuelve true si la fecha1 es mayor a la fecha2
	function mayor($fecha1, $fecha2){
				
		$fecha1_formato = date('Y-m-d', strtotime($fecha1));
		$fecha2_formato = date('Y-m-d', strtotime($fecha2));
		
		$fecha1_array	= explode("-", $fecha1_formato);
		$fecha2_array	= explode("-", $fecha2_formato);
		
		if($fecha1_array[0] < $fecha2_array[0]){
			return FALSE;
		}else if($fecha1_array[0] == $fecha2_array[0]){
			if($fecha1_array[1] < $fecha2_array[1]){
				return FALSE;
			}else if($fecha1_array[1] == $fecha2_array[1]){
				if($fecha1_array[2] < $fecha2_array[2]){
					return FALSE;
				}else{
					return TRUE;
				}
			}else{
				return TRUE;
			}
		}else{
			return TRUE;
		}
			
		
	}	
	
	function insertDisponibilidad($registro){
		$this->db->insert('disponibilidades', $registro);
		
		$id=$this->db->insert_id();
		
		return $id;	
		
	}
	
	function getDisponibilidadId($id){
		$query=$this->db->query("SELECT 
							*
							FROM `disponibilidades`
							WHERE disponibilidades.id_disponibilidad='$id'");
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
					$data[] = $fila;
			}
			return $data;
		}else{
			return false;
		}
	}
	
		
} 
?>
