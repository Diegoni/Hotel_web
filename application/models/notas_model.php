<?php 
class Notas_model extends CI_Model {
			
	function insertNota($nota){
		$this->db->insert('notas', $nota);
		
		$id_nota=$this->db->insert_id();
		
		return $id_nota;
	}		
			
		
} 
?>
