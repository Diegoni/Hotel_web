<?php 
class Articulos_model extends CI_Model {
	
	function getArticulos(){
		$query = $this->db->query("SELECT * FROM articulos INNER JOIN categorias ON(articulos.id_categoria=categorias.id_categoria) ORDER BY articulo");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	function getCategorias(){
		$query=$this->db->query('SELECT count(*) FROM `articulos` GROUP BY id_categoria');
		
		return $query->num_rows();
	}
} 
?>
