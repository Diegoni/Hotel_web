<?php 
class Articulos_model extends CI_Model {
	
	function getArticulos($datos=NULL){
		$date=date("Y-m-d");
		if(isset($datos)){
			$query = $this->db->query("SELECT * FROM articulos 
									INNER JOIN categorias ON(articulos.id_categoria=categorias.id_categoria)
									WHERE articulos.delete = 0 AND
									articulos.id_estado_articulo != 2 AND
									DATE_FORMAT(articulos.fecha_publicacion, '%Y-%m-%d') <= '$date' AND
									(DATE_FORMAT(articulos.fecha_publicacion, '%Y-%m-%d') >= '$date' OR 
									articulos.fecha_despublicacion=0 ) AND
									articulos.$datos[columna] = '$datos[dato]'
									ORDER BY articulos.id_articulo");
			
		}else{
			$id_idioma=$_COOKIE['idioma'];
			
			$query = $this->db->query("SELECT * FROM articulos 
									INNER JOIN categorias ON(articulos.id_categoria=categorias.id_categoria)
									WHERE articulos.delete = 0 AND
									articulos.id_estado_articulo != 2 AND
									DATE_FORMAT(articulos.fecha_publicacion, '%Y-%m-%d') <= '$date' AND
									(DATE_FORMAT(articulos.fecha_publicacion, '%Y-%m-%d') >= '$date' OR 
									articulos.fecha_despublicacion=0 ) AND
									(articulos.id_idioma = 0 OR articulos.id_idioma = '$id_idioma' )
									ORDER BY articulos.id_articulo");	
		}
		
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	
	
	
	function getArticulos_paginaprincipal($id_hotel=NULL){
		$date=date("Y-m-d");
		$id_idioma=$_COOKIE['idioma'];
		$query = $this->db->query("SELECT * FROM articulos 
									INNER JOIN categorias ON(articulos.id_categoria=categorias.id_categoria)
									WHERE 
									articulos.id_hotel='$id_hotel' AND
									articulos.delete = 0 AND
									articulos.id_estado_articulo != 2 AND
									DATE_FORMAT(articulos.fecha_publicacion, '%Y-%m-%d') <= '$date' AND
									(DATE_FORMAT(articulos.fecha_publicacion, '%Y-%m-%d') >= '$date' OR 
									articulos.fecha_despublicacion=0 ) AND
									articulos.pagina_principal = 1 AND
									(articulos.id_idioma = 0 OR articulos.id_idioma = '$id_idioma' )
									ORDER BY articulos.id_articulo");
		
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
