<?php 
class Ayudas_model extends CI_Model {
	
	function getAyuda($ayuda)
	{
		$sql = "SELECT 
					* 
				FROM 
					ayudas 
				WHERE 
					sector = '$ayuda[sector]' AND 
					id_idioma ='$ayuda[id_idioma]'";
		
		$query = $this->db->query($sql);
				
		if($query->num_rows() == 0)
		{
			$sql = "SELECT 
						* 
					FROM 
						ayudas 
					WHERE 
						sector = '$ayuda[sector]' AND 
						id_idioma = 0";
							
			$query = $this->db->query($sql);
		}	
			
		if($query->num_rows() > 0)
		{	
			foreach ($query->result() as $fila)
			{
				$data[] = $fila;
			}
			return $data;
			
		}
		else
		{
			return FALSE;
		}
	}
}
?>
