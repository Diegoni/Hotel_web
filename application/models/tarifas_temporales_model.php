<?php 
class Tarifas_temporales_model extends CI_Model {
		
	function getTarifas($habitaciones, $consulta){
		foreach ($habitaciones as $habitacion) {
			$sql = "SELECT 
						tarifas_temporales.id_tarifa_temporal,
						tarifa_habitacion.id_habitacion as id_habitacion,
						tarifas_temporales.valor as valor,
						tarifas_temporales.id_tipo_tarifa as id_tipo_tarifa,
						tarifas_temporales.id_tarifa_temporal as id_tarifa_temporal,
						tarifas_temporales.salida,
						tarifas_temporales.entrada
					FROM 
						`tarifa_habitacion` 
					INNER JOIN 
						tarifas_temporales ON(tarifa_habitacion.id_tarifa_temporal = tarifas_temporales.id_tarifa_temporal)
					INNER JOIN 
						tipos_tarifa ON(tarifa_habitacion.id_tarifa_temporal = tarifas_temporales.id_tarifa_temporal)
					WHERE 
						tarifa_habitacion.id_habitacion = '$habitacion->id_habitacion' 
					GROUP BY 
						tarifas_temporales.id_tarifa_temporal
							";
							
			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0){
				foreach ($query->result() as $fila){
					//DATE_FORMAT(tarifas_temporales.salida, '%d-%m-%Y') >= '$consulta[entrada]'
					
					$array_salida = explode('/', $consulta['salida']);
					$salida = $array_salida[2]."-".$array_salida[1]."-".$array_salida[0];
					$array_entrada = explode('/', $consulta['entrada']);
					$entrada = $array_entrada[2]."-".$array_entrada[1]."-".$array_entrada[0];
					
					$array_entrada = explode('-', $fila->entrada);
					$entrada_2 = $array_entrada[0]."-".$array_entrada[1]."-".$array_entrada[2];
					$array_salida = explode('-', $fila->salida);
					$salida_2 = $array_salida[0]."-".$array_salida[1]."-".$array_salida[2];
						
					if($salida >= $entrada_2 ){
						if($entrada <= $salida_2 ){
							$data[] = $fila;	
						}	
					}
				}
			}	
			
		}
		
		if(isset($data)){
			return $data;	
		}else{
			
		}
				
	}

	function calcular_precio($datos)
	{
		if($datos['id_tipo_tarifa'] == 1)
		{
			$valor = $datos['precio'] + ($datos['precio'] * $datos['valor'] / 100);
		}
		else if($datos['id_tipo_tarifa'] == 2)
		{
			$valor = $datos['precio'] - ($datos['precio'] * $datos['valor'] / 100);	
		}
		else if($datos['id_tipo_tarifa'] == 3)
		{
			$valor = $datos['valor'];
		}
		
		return $valor;
	}
	
	function getFechas($id)
	{
		$sql = "SELECT 
					tarifas_temporales.entrada,
					tarifas_temporales.salida
				FROM 
					tarifas_temporales 
				WHERE 
					tarifas_temporales.id_tarifa_temporal = '$id'";
		
		$query = $this->db->query($sql);
							
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$data[] = $fila;
			}
		}	
			
		return $data;				
	}
	
	function insertTarifa($registro)
	{
		$this->db->insert('tarifas_temporales', $registro);
		
		$id = $this->db->insert_id();
		
		return $id;	
	}	
	
	function getTarifaID($id)
	{
		$sql = "SELECT 
					*
				FROM 
					`tarifas_temporales`
				WHERE 
					tarifas_temporales.id_tarifa_temporal = '$id'";
		
		$query = $this->db->query($sql);
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$data[] = $fila;
			}
			
			return $data;
		}
		else
		{
			return false;
		}
	}
	
		
} 
?>
