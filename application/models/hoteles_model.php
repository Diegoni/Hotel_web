<?php 
class Hoteles_model extends CI_Model {
	
	function getHoteles(){
		$query = $this->db->query("SELECT * FROM hoteles 
									INNER JOIN telefonos_hotel ON(hoteles.id_hotel=telefonos_hotel.id_hotel)
									INNER JOIN direcciones_hotel ON(direcciones_hotel.id_hotel=hoteles.id_hotel)
									INNER JOIN provincias ON(provincias.id_provincia=direcciones_hotel.id_provincia)
									ORDER BY hotel");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	function getHotel($id=NULL){
		$query = $this->db->query("SELECT * FROM hoteles WHERE id_hotel='$id'");
		
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
