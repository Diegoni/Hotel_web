<?php foreach ($habitaciones as $habitacion) { ?>
<!-- Modal -->
<div class="modal fade" id="<?php echo $habitacion->id_habitacion?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Habitación</h4>
      </div>
      <div class="modal-body">
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>Habitación</th>
        				<th title="adultos">Adultos</th>
        				<th title="menores">Menores</th>
        				<th title="estadía mínima">Mín</th>
        				<th title="estadía máxima">Máx</th>
        				<th title="tarifa">Tarifa</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td><?php echo $habitacion->habitacion?></td>
        				<td><?php echo $habitacion->adultos?></td>
        				<td><?php echo $habitacion->menores?></td>
        				<td><?php echo $habitacion->estadia_min?> días</td>
        				<td><?php echo $habitacion->estadia_max?> días</td>
        				<td><?php echo $habitacion->tarifa?></td>
        			</tr>
        		</tbody>
        	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
	