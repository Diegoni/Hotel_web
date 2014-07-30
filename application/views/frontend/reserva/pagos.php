
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">Datos personales</div>
		  	<div class="panel-body">
		  		<table class="table table-hover">
		  			<?php foreach ($reservas as $reserva) {?>
					<tr>
						<td><i class="fa fa-sign-in"></i> Entrada: </td>
						<th><?php echo $reserva->entrada; ?></th>
						<td><i class="fa fa-sign-out"></i> Salida: </td>
						<th><?php echo $reserva->salida; ?></th>
					</tr>
					<!--
					<tr>
						<td><i class="fa fa-user"></i> Adultos: </td>
						<th><?php echo $reserva->adultos; ?></th>
						<td><i class="fa fa-child"></i> Menores: </td>
						<th><?php echo $reserva->menores; ?></th>
					</tr>
					-->	
					<tr>
						<td><span class="icon-bed"></span> Habitación: </td>
						<th><?php echo $reserva->habitacion; ?></th>
						<td><i class="icon-office-building"></i> Hotel: </td>
						<th><?php echo $reserva->hotel; ?></th>
					</tr>
					<?php }	?>
				</table>
		  	</div>
		</div>
	</div>
</div>	