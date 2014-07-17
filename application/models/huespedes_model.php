<?php 
class Huespedes_model extends CI_Model {
	
	public function buscar_telefonos($id)
	{
		$query = $this->db->query("SELECT * FROM telefonos_huesped WHERE id_huesped='$id' ");
		if($query->num_rows() > 0){
			return site_url('/admin/huesped/telefonos_huesped').'/'.$id;	
		}else{
			return site_url('admin/huesped/telefonos_huesped/add').'/'.$id;;
		}
	}

} 
?>
