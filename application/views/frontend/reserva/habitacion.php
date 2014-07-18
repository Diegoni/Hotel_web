
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">Consultar precios</div>
		  	<div class="panel-body">
		    	Entrada: <?php echo $this->input->post('entrada') ?>
				Salida: <?php echo $this->input->post('salida') ?>
				Adultos: <?php echo $this->input->post('adultos') ?>
				Menores: <?php echo $this->input->post('menores') ?>
					
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Habitación</th>
							<th>Seleccionar</th>
							<th>Costo</th>
						</tr>
					</thead>
					<tbody>
						<?php echo form_open('reserva/datos');?>
						<?php foreach ($habitaciones as $habitacion) { ?>
						<tr>
							<td><a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $habitacion->id_habitacion?>"><?php echo $habitacion->habitacion; ?></a></td>		
							<td><input type="checkbox" value="<?php echo $habitacion->id_habitacion; ?>" name="habitacion"></td>
							<td>$ <?php echo number_format($habitacion->precio, 2, ',', ' '); ?></td>
							
						</tr>
						<?php } ?>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" value="Aceptar" class="btn btn-default" /></td>
						</tr>
						<?php echo form_close(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>	
