<?php 
class Mensajes_model extends CI_Model {
	
	function insertMensaje($datos){
		
		$datos = $this->db->escape($datos);
			
		$this->db->insert('mensajes', $datos);
		
		$id_mensaje=$this->db->insert_id();
		
		return $id_mensaje;	
	}
	
	function getCantNuevos(){
		$query = $this->db->query("SELECT * FROM mensajes WHERE id_estado_mensaje=1 ");
		
		return $query->num_rows();
	}
	
	
	function getNuevos(){
		$query = $this->db->query("SELECT * FROM mensajes WHERE id_estado_mensaje=1 ");
		
		foreach ($query->result() as $fila){
			$data[] = $fila;
		}
		
		return $data;
	}
	
	
	function getMensajes(){
		$sql = "SELECT 
					`mensajes`.`id_mensaje`,
					`mensajes`.`titulo`,
					`mensajes`.`emisor`,
					`mensajes`.`fecha_envio`,
					`estados_mensaje`.`estado_mensaje`,
					`hoteles`.`hotel`
				FROM 
					`mensajes` 
				INNER JOIN 
					`estados_mensaje` ON (`mensajes`.`id_estado_mensaje` = `estados_mensaje`.`id_estado_mensaje`)
				INNER JOIN 
					`hoteles` ON (`mensajes`.`id_hotel` = `hoteles`.`id_hotel`)		
				WHERE 
					`mensajes`.`delete` = 0 
				ORDER BY 
					`mensajes`.`id_mensaje` DESC";
		
		$query = $this->db->query($sql);
		
		foreach ($query->result() as $fila){
			$data[] = $fila;
		}
		
		return $data;
	}
	
	
	function deleteMensajes($id_mensaje){
		$registro = array(
			'delete' => 1
		);
		
		$this->db->update('mensajes', $registro, array('id_mensaje' => $id_mensaje));
	}
			
} 
?>
