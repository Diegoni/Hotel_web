<?php 
class Hoteles_email_model extends CI_Model {
	
	function getEmails($id_hotel){
		$query_reserva = $this->db->query("	SELECT emails_hotel.email FROM hotel_email_reserva
									INNER JOIN emails_hotel ON(hotel_email_reserva.id_email=emails_hotel.id_email) 
									WHERE hotel_email_reserva.id_hotel = '$id_hotel'
									AND emails_hotel.mostrar = 1
									");
		
		$query_mensaje = $this->db->query("	SELECT emails_hotel.email  FROM hotel_email_mensaje
									INNER JOIN emails_hotel ON(hotel_email_mensaje.id_email=emails_hotel.id_email) 
									WHERE hotel_email_mensaje.id_hotel = '$id_hotel'
									AND emails_hotel.mostrar = 1
									");
			
		if($query_reserva->num_rows() > 0 || $query_reserva->num_rows() > 0){
			$data=array();
			if($query_reserva->num_rows() > 0){				
				foreach ($query_reserva->result() as $fila){
					if (!(in_array($fila, $data))) {						
						$data[] = $fila;
					}
				}
			}
			if($query_mensaje->num_rows() > 0){
				foreach ($query_mensaje->result() as $fila){
					if (!(in_array($fila, $data))) {
						$data[] = $fila;	
					}
					
				}
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	function correoMensaje($mensaje){
		$query = $this->db->query("	SELECT emails_hotel.email  FROM hotel_email_mensaje
									INNER JOIN emails_hotel ON(hotel_email_mensaje.id_email=emails_hotel.id_email) 
									WHERE hotel_email_mensaje.id_hotel = '$mensaje[id_hotel]'");
		$título = $mensaje['titulo'];
		$mensaje = 
		"
		<html>
		<head>
  			<title>".$mensaje['titulo']."</title>
		</head>
		<body>
  			<table>
	  		<tr>
	      		<td>Mensaje: </td>
	      		<th>".$mensaje['mensaje']."</th>
	    	</tr>
	    	<tr>
	      		<td>Fecha: </td>
	      		<th>".$mensaje['fecha_envio']."</th>
	    	</tr>
	    	<tr>
	      		<td>De: </td>
	      		<th>".$mensaje['emisor']."</th>
	    	</tr>
	  		</table>
		</body>
		</html>
		";
		
		// Para enviar un correo HTML
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Cabeceras adicionales
		$cabeceras .= 'From: Hoteles Gold <consulta@hoteles.com>' . "\r\n";
		
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$para = $fila->email;
				mail($para, $título, $mensaje, $cabeceras);
				
				$data[] = $fila;	
			}
			return $data;
		}else{
			return FALSE;
		}
	}
	
	
	function correoReserva($huesped, $tarjeta, $consulta, $habitaciones){
		$query = $this->db->query("	SELECT emails_hotel.email  FROM hotel_email_reserva
									INNER JOIN emails_hotel ON(hotel_email_reserva.id_email=emails_hotel.id_email) 
									WHERE hotel_email_reserva.id_hotel = '$consulta[hotel]'");
		$título = 'Reserva online';
		$mensaje = 
		"
		<html>
		<head>
  			<title>".$título."</title>
		</head>
		<body>
  			<table>
	  		<tr>
	      		<td>Nombre: </td>
	      		<th>".$huesped['nombre']."</th>
	    	</tr>
	    	<tr>
	      		<td>Apellido: </td>
	      		<th>".$huesped['apellido']."</th>
	    	</tr>
	    	<tr>
	      		<td>Email: </td>
	      		<th>".$huesped['email']."</th>
	    	</tr>
	    	<tr>
	      		<td>Teléfono: </td>
	      		<th>".$huesped['telefono']."</th>
	    	</tr>
	    	<tr>
	      		<td>Tarjeta: </td>
	      		<th>".$tarjeta['tarjeta']."</th>
	    	</tr>
	    	<tr>
	      		<td>Entrada: </td>
	      		<th>".$consulta['entrada']."</th>
	    	</tr>
	    	<tr>
	      		<td>Salida: </td>
	      		<th>".$consulta['salida']."</th>
	    	</tr>
	    	<tr>
	      		<td>Adultos: </td>
	      		<th>".$consulta['adultos']."</th>
	    	</tr>
	    	<tr>
	      		<td>Menores: </td>
	      		<th>".$consulta['menores']."</th>
	    	</tr>
	  		</table>
		</body>
		</html>
		";
		
		// Para enviar un correo HTML
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Cabeceras adicionales
		$cabeceras .= 'From: Hoteles Gold <consulta@hoteles.com>' . "\r\n";
		
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$para = $fila->email;
				mail($para, $título, $mensaje, $cabeceras);
				
				$data[] = $fila;	
			}
			return $data;
		}else{
			return FALSE;
		}	
		
	}

} 
?>
