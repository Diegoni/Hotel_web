<!------------------------------------------------------------------------
--------------------------------------------------------------------------
					Modal reserva
--------------------------------------------------------------------------
------------------------------------------------------------------------->	

<div class="modal fade" id="modal_reservas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevas reservas</h4>
      </div>
      <div class="modal-body">
      	<table class="table table-hover">
      		<thead>
      			<tr>
	      			<th>ID</th>
	      			<th>Habitación</th>
	      			<th>Huesped</th>
	      			<th>Entrada</th>
	      			<th>Salida</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($reservas as $reserva) { ?>
			  	<tr>
			  		<td><?php echo $reserva->id_reserva ?></td>
			  		<td><?php echo $reserva->habitacion ?></td>
			  		<td><?php echo $reserva->apellido ?> <?php echo $reserva->nombre ?></td>
			  		<td><?php echo date("d-m-Y", strtotime($reserva->entrada)); ?></td>
			  		<td><?php echo date("d-m-Y", strtotime($reserva->salida));  ?></td>
			  		<td><select name="estado">
			  				<?php foreach ($estados_reserva as $estado) { ?>
								<option value="<?php echo $estado->id_estado_reserva?>"><?php echo $estado->estado_reserva;?></option>	  
							<?php } ?>
			  			</select>
			  		</td>
			  	</tr>
		 		<?php }?>
      		</tbody>
      	</table>
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>



<!------------------------------------------------------------------------
--------------------------------------------------------------------------
					Modal mensaje
--------------------------------------------------------------------------
------------------------------------------------------------------------->	

<div class="modal fade" id="modal_mensajes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevas reservas</h4>
      </div>
      <div class="modal-body">
      	<table class="table table-hover">
      		<thead>
      			<tr>
	      			<th>ID</th>
	      			<th>Título</th>
	      			<th>De</th>
	      			<th>Tipo</th>
	      			<th>Fecha</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($mensajes as $mensaje) { ?>
			  	<tr>
			  		<td><?php echo $mensaje->id_mensaje ?></td>
			  		<td><?php echo $mensaje->titulo ?></td>
			  		<td><?php echo $mensaje->emisor ?></td>
			  		<td><?php echo $mensaje->id_tipo_mensaje ?></td>
			  		<td><?php echo date("d-m-Y", strtotime($mensaje->fecha_envio));  ?></td>
			  		<td><select name="estado">
			  				<?php foreach ($estados_reserva as $estado) { ?>
								<option value="<?php echo $estado->id_estado_reserva?>"><?php echo $estado->estado_reserva;?></option>	  
							<?php } ?>
			  			</select>
			  		</td>
			  	</tr>
		 		<?php }?>
      		</tbody>
      	</table>
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

