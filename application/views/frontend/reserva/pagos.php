
	<div class="col-md-8">
		<div class="panel panel-hotel">
			<div class="panel-heading"><?php echo $texto['datos_personales'];?></div>
		  	<div class="panel-body">
		  		<table class="table table-hover">
		  			<?php foreach ($reservas as $reserva) {?>  				
		  			<?php }	?>	
					<tr>
						<td><i class="fa fa-sign-in"></i> <?php echo $texto['entrada'];?>: </td>
						<th><?php echo date("d-m-Y", strtotime($reserva->entrada)); ?></th>
						<td><i class="fa fa-sign-out"></i> <?php echo $texto['salida'];?>: </td>
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
									echo $texto['habitacion'];
								}else{
									echo $texto['habitaciones'];
								} ?>
						</td>
						<th>
							<?php foreach ($reservas as $reserva) {?>
								<?php echo $reserva->cantidad; ?> - 
								<?php echo $reserva->habitacion; ?>
								<br>								  				
		  					<?php }	?>	
						</th>
						<td><i class="fa fa-building"></i> <?php echo $texto['hotel'];?>: </td>
						<th><?php echo $reserva->hotel; ?></th>
					</tr>
					
				</table>
		  	</div>
		</div>
	</div>
</div>	