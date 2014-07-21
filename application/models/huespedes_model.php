<?php 
class Huespedes_model extends CI_Model {
	
	public function insertHuesped($datos)
	{
		$fecha= date('Y-m-d H:i:s');
			
		$huesped = array(
	        "nombre" => $datos['nombre'],
	        "apellido" => $datos['apellido'],
	        "dni" => 0,
	        "id_tipo_huesped" => 1,
	        "fecha_alta" => $fecha,
	        "fecha_modificacion" => $fecha
	    );
	    	 
	    $this->db->insert('huespedes', $huesped);
		
		$id_huesped=$this->db->insert_id();	
		
		if(isset($datos['telefono'])){		
			$telefono = array(
	        	"id_huesped" => $id_huesped,
	        	"telefono" => $datos['telefono']
	    	);
		
			$this->db->insert('telefonos_huesped',$telefono);
		}
		
		if(isset($datos['email'])){
			$email = array(
	        	"id_huesped" => $id_huesped,
	        	"email" => $datos['email']
	    	);
		
			$this->db->insert('emails_huesped',$email);			
		}
		
		return $id_huesped;
	}

} 
?>
