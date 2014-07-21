
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">Datos personales</div>
		  	<div class="panel-body">
		  		<?php  
		  		foreach ($reservas as $reserva) {
				echo $reserva->entrada;
				echo $reserva->salida;
				echo $reserva->adultos;
				echo $reserva->menores;
				echo $reserva->id_estado_reserva;
					  
				}
		  		
				?>		
		  	</div>
		</div>
	</div>
</div>	