
	<div class="col-md-9">
		<div class="panel panel-hotel">
			<div class="panel-heading">Datos personales</div>
		  	<div class="panel-body">
		  		<table class="table table-hover">
		  			<?php foreach ($reservas as $reserva) {?>  				
		  			<?php }	?>	
					<tr>
						<td><i class="fa fa-sign-in"></i> Entrada: </td>
						<th><?php echo date("d-m-Y", strtotime($reserva->entrada)); ?></th>
						<td><i class="fa fa-sign-out"></i> Salida: </td>
						<th><?php echo date("d-m-Y", strtotime($reserva->salida)); ?></th>
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
						<td>
							<span class="icon-bed"></span>
							<?php if (count($reservas)==1){
									echo "Habitación:";
								}else{
									echo "Habitaciones:";
								} ?>
						</td>
						<th>
							<?php foreach ($reservas as $reserva) {?>
								<?php echo $reserva->cantidad; ?> - 
								<?php echo $reserva->habitacion; ?>
								<br>								  				
		  					<?php }	?>	
						</th>
						<td><i class="fa fa-building"></i> Hotel: </td>
						<th><?php echo $reserva->hotel; ?></th>
					</tr>
					
				</table>
		  	</div>
		</div>
	</div>
</div>	