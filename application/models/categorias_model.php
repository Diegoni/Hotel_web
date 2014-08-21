<?php 
class Categorias_model extends CI_Model {
	
	function getCategoria($id){
		$query = $this->db->query("SELECT * FROM categorias 
									WHERE categorias.delete = 0 AND
									categorias.id_categoria = '$id'");
		
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
