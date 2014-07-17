<?php 
class Telefonos_huesped_model extends CI_Model {
	
	function getTelefonos($id){
		$query = $this->db->query("SELECT * FROM telefonos_huesped");
		
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
