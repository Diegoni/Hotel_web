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
	
	function correoMensaje($consulta){
		
		$título = $consulta['titulo'];
		
		$query = $this->db->query("	SELECT hoteles.correo_mensaje  FROM hoteles
									WHERE hoteles.id_hotel = '$consulta[id_hotel]'");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$correo_mensaje = $fila->correo_mensaje;		
			}
		}
		
		$mensaje = $correo_mensaje."<br>";
		$mensaje .= 
		"
		<html>
		<head>
		<style type='text/css'>
		table.gridtable {
			font-family: verdana,arial,sans-serif;
			font-size:11px;
			color:#333333;
			border-width: 1px;
			border-color: #666666;
			border-collapse: collapse;
		}
		table.gridtable th {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #666666;
			background-color: #dedede;
		}
		table.gridtable td {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #666666;
			background-color: #ffffff;
		}
		</style>".
			header('Content-type: text/html; charset=utf-8')." 
  			<title>".$título."</title>
		</head>
		<body>
  			<table class='gridtable'>
	  		<tr>
	      		<td>Mensaje: </td>
	      		<th>".$consulta['mensaje']."</th>
	    	</tr>
	    	<tr>
	      		<td>Fecha de envio: </td>
	      		<th>".date("H:i:s d-m-Y", strtotime($consulta['fecha_envio']))."</th>
	    	</tr>
	    	<tr>
	      		<td>Email: </td>
	      		<th>".$consulta['emisor']."</th>
	    	</tr>
	    	<tr>
	      		<td>Nombre: </td>
	      		<th>".$consulta['nombre']."</th>
	    	</tr>
	    	<tr>
	      		<td>Apellido: </td>
	      		<th>".$consulta['apellido']."</th>
	    	</tr>
	    	<tr>
	      		<td>Telefono: </td>
	      		<th>".$consulta['telefono']."</th>
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
		
		$query = $this->db->query("	SELECT emails_hotel.email  FROM hotel_email_mensaje
									INNER JOIN emails_hotel ON(hotel_email_mensaje.id_email=emails_hotel.id_email) 
									WHERE hotel_email_mensaje.id_hotel = '$consulta[id_hotel]'");
		
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
	
	
	function correoReserva($huesped, $tarjeta, $reservas){
		foreach ($reservas as $reserva) {
			$entrada=$reserva->entrada;
			$salida=$reserva->salida;
			$adultos=$reserva->adultos;
			$menores=$reserva->menores;
			$hotel=$reserva->hotel;
			$id_hotel=$reserva->id_hotel;
			$fecha_alta=$reserva->fecha_alta;
		}
		$query = $this->db->query("	SELECT hoteles.correo_reserva  FROM hoteles
									WHERE hoteles.id_hotel = '$id_hotel'");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$correo_reserva = $fila->correo_reserva;		
			}
		}
			
											
		$título = 'Reserva online';
		$mensaje = $correo_reserva."<br>";
		$mensaje .= 
		"
		<html>
		<head>
		<style type='text/css'>
		table.gridtable {
			font-family: verdana,arial,sans-serif;
			font-size:11px;
			color:#333333;
			border-width: 1px;
			border-color: #666666;
			border-collapse: collapse;
		}
		table.gridtable th {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #666666;
			background-color: #dedede;
		}
		table.gridtable td {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #666666;
			background-color: #ffffff;
		}
		</style>".
			header('Content-type: text/html; charset=utf-8')." 
  			<title>".$título."</title>
		</head>
		<body>
  			<table class='gridtable'>
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
	      		<th>".date("d-m-Y", strtotime($entrada))."</th>
	    	</tr>
	    	<tr>
	      		<td>Salida: </td>
	      		<th>".date("d-m-Y", strtotime($salida))."</th>
	    	</tr>
	    	<tr>
	      		<td>Adultos: </td>
	      		<th>".$adultos."</th>
	    	</tr>
	    	<tr>
	      		<td>Menores: </td>
	      		<th>".$menores."</th>
	    	</tr>
	    	<tr>
	      		<td>Hotel: </td>
	      		<th>".$hotel."</th>
	    	</tr>";
	    foreach ($reservas as $reserva) {
	    $mensaje.=
	    	"<tr>
	      		<td>Cantidad: </td>
	      		<th>".$reserva->cantidad."</th>
	    	</tr>
	    	<tr>
	      		<td>Habitacion: </td>
	      		<th>".$reserva->habitacion."</th>
	    	</tr>";
		}
	    
	    $mensaje.= 
	  		"<tr>
	      		<td>Hotel: </td>
	      		<th>".date('H:i:s d-m-Y', strtotime($fecha_alta))."</th>
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
		
		$query = $this->db->query("	SELECT emails_hotel.email  FROM hotel_email_reserva
									INNER JOIN emails_hotel ON(hotel_email_reserva.id_email=emails_hotel.id_email) 
									WHERE hotel_email_reserva.id_hotel = '$id_hotel'");
		
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
	
	
	function correoHabitacion($consulta, $habitacion){
		$título = $consulta['titulo'];
		
		$query = $this->db->query("	SELECT hoteles.correo_habitacion  FROM hoteles
									WHERE hoteles.id_hotel = '$consulta[id_hotel]'");
		
		if($query->num_rows() > 0){
			foreach ($query->result() as $fila){
				$correo_habitacion = $fila->correo_habitacion;		
			}
		}
		
		$mensaje = $correo_habitacion."<br>";
		$mensaje .= 
		"
		<html>
		<head>
		<style type='text/css'>
		table.gridtable {
			font-family: verdana,arial,sans-serif;
			font-size:11px;
			color:#333333;
			border-width: 1px;
			border-color: #666666;
			border-collapse: collapse;
		}
		table.gridtable th {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #666666;
			background-color: #dedede;
		}
		table.gridtable td {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #666666;
			background-color: #ffffff;
		}
		</style>".
			header('Content-type: text/html; charset=utf-8')." 
  			<title>".$título."</title>
		</head>
		<body>
  			<table class='gridtable'>
	  		<tr>
	      		<td>Mensaje: </td>
	      		<th>".$consulta['mensaje']."</th>
	    	</tr>
	    	<tr>
	      		<td>Fecha de envio: </td>
	      		<th>".date("H:i:s d-m-Y", strtotime($consulta['fecha_envio']))."</th>
	    	</tr>
	    	<tr>
	      		<td>De: </td>
	      		<th>".$consulta['nombre']." ".$consulta['apellido']."</th>
	    	</tr>
	    	<tr>
	      		<td>Habitacion: </td>
	      		<th><a href='http://tmsgroup.com.ar/carollo/index.php/habitacion/view/".$habitacion['id_habitacion']."'>".$habitacion['habitacion']."</a></th>
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
		
		mail($consulta['emisor'], $título, $mensaje, $cabeceras);
		
		$query = $this->db->query("	SELECT emails_hotel.email  FROM hotel_email_mensaje
									INNER JOIN emails_hotel ON(hotel_email_mensaje.id_email=emails_hotel.id_email) 
									WHERE hotel_email_mensaje.id_hotel = '$consulta[id_hotel]'");
		
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
