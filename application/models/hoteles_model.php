<?php 
class Hoteles_model extends CI_Model {
	
	function getHoteles(){
		$query = $this->db->query("SELECT * FROM hoteles ORDER BY hotel");
		
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
