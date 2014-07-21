<?php 
class Ayudas_model extends CI_Model {
	
	function getAyuda($sector){
		$query = $this->db->query("SELECT * FROM ayudas WHERE sector='$sector'");
		
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
