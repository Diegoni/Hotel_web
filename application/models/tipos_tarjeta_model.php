<?php 
class Tipos_tarjeta_model extends CI_Model {
	
	function getTipos(){
		$query=$this->db->query("SELECT * FROM `tipos_tarjeta` WHERE `delete`=0");
		if($query->num_rows()>0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}	
				return $data;
		}else{
				return $data=0;
		}
	}
	
} 
?>
