<?php 
class Tarjetas_model extends CI_Model {
			
	function insertTarjeta($registro){
		$query = $this->db->query("SELECT * FROM tarjetas WHERE tarjetas.tarjeta='$registro[tarjeta]' AND tarjetas.id_huesped='$registro[id_huesped]'");
		
		if($query->num_rows()==0){
			$this->db->insert('tarjetas', $registro);
		
			$id=$this->db->insert_id();
		
			return $id;	
		}else{
			return 0;
		}
		
		
	}		
			
		
} 
?>
