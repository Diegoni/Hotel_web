<?php 
class Vuelos_model extends CI_Model {
			
	function insertVuelo($vuelo){
		$this->db->insert('vuelos', $vuelo);
		
		$id=$this->db->insert_id();
		
	}		
			
		
} 
?>
