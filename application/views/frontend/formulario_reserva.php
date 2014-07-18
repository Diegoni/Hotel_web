
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
	  		<div class="panel-heading">Reserva online</div>
	  		<div class="panel-body">
	  			<?php echo form_open('reserva/habitacion');?> 
	    			<div class="form-group">
						<label for="exampleInputEmail1">Entrada</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="icon-calendarthree"></span>
							</div>
      						<input class="form-control" name="entrada" id="entrada" type="entrada" placeholder="Fecha entrada">
    					</div>
				  	</div>
				  	<div class="form-group">
					    <label for="exampleInputEmail1">Salida</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class="icon-calendarthree"></span>
							</div>
      						<input class="form-control" name="salida" id="salida" type="salida" placeholder="Fecha salida">
    					</div>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Ocupación</label>
						<select class="form-control" name="adultos">
				  			<option value="1">1 adulto</option>
				  			<option value="2">2 adultos</option>
				  			<option value="3">3 adultos</option>
				  			<option value="4">4 adultos</option>
				  			<option value="5">5 adultos</option>
						</select>
			     		<select class="form-control" name="menores">
				  			<option value="0">sin menores</option>
				  			<option value="1">1 menor</option>
				  			<option value="2">2 menores</option>
				  			<option value="3">3 menores</option>
				  			<option value="4">4 menores</option>
				  			<option value="5">5 menores</option>
						</select>
			  		</div>
					<div class="form-group">
				  		<button type="submit" class="btn btn-default">Ver precios</button>
				  	</div>
				<?php echo form_close(); ?>	
			</div>
		</div>
	</div>
	