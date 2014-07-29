<?php 
class Tipos_habitacion_model extends CI_Model {
	
	function getTipos(){
		$query=$this->db->query("SELECT * FROM tipos_habitacion");
		echo $query->num_rows();
		if($query->num_rows()>0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}	
				return $data;
		}else{
				return $data=0;
		}
	}
	
	function getTipo($id){
		$query=$this->db->query("SELECT * FROM tipos_habitacion WHERE id_tipo_habitacion='$id'");
		echo $query->num_rows();
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
