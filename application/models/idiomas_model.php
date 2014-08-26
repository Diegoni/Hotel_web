<?php 
class Idiomas_model extends CI_Model {
	
	function getIdioma($id){
		$query = $this->db->query("SELECT * FROM idiomas WHERE id_idioma='$id'");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
		}else{
			return FALSE;
		}
		
		foreach ($data as $idioma) {
			include_once('idiomas/'.$idioma->archivo);	
		}
		
		return $texto;
	}
	

}
?>
