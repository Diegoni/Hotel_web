<?php 
class Monedas_model extends CI_Model {
	
	function getMonedas(){
		$query = $this->db->query("SELECT * FROM monedas");
		
		if($query->num_rows()>0){
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
