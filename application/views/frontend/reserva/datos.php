
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">Datos personales</div>
		  	<div class="panel-body">
		  		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/reserva/pago'?>" />
  					<div class="form-group">
    					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" name="apellido" placeholder="Ingrese apellido">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="email" class="col-sm-2 control-label">Email</label>
    					<div class="col-sm-10">
      					<input type="email" class="form-control" name="email" placeholder="Ingrese email">
    					</div>
  					</div>
  					  					  					
  					<div class="form-group">
    					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
    					<div class="col-sm-10">
      					<input type="number" class="form-control" name="telefono" placeholder="Ingrese teléfono">
    					</div>
  					</div>
  					
  					<div class="form-group slidingDiv">
  						<label for="nota" class="col-sm-2 control-label">Nota</label>
    					<div class="col-sm-10">
      						<textarea class="form-control" name="nota" rows="3" placeholder="Ingrese nota"></textarea>
    					</div>
  					</div>
  					
  					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox"> Acepto las condiciones de la reserva. <a href="#">Ver condiciones</a> 
					        </label>
					      </div>
					    </div>
					</div>
  					  					
  					<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Aceptar</button>
      						<a href="#" class="btn btn-default show_hide">Agregar nota</a>
    					</div>
  					</div>
  					<input type="hidden" name="entrada" value="<?php echo $this->input->post('entrada') ?>">
					<input type="hidden" name="salida"  value="<?php echo $this->input->post('salida') ?>">
					<input type="hidden" name="adultos" value="<?php echo $this->input->post('adultos') ?>">
					<input type="hidden" name="menores" value="<?php echo $this->input->post('menores') ?>">					
					<input type="hidden" name="habitacion" value="<?php echo $this->input->post('habitacion') ?>">
				</form>
		    </div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Huesped registrado</div>
		  	<div class="panel-body">
				<form class="form-horizontal" role="form">
  					<div class="form-group">
    					<label for="usuario" class="col-sm-2 control-label">Ususario</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" id="usuario" placeholder="Ingrese usuario">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="pass" class="col-sm-2 control-label">Pass</label>
    					<div class="col-sm-10">
      					<input type="password" class="form-control" id="pass" placeholder="Ingrese password">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Sign in</button>
    					</div>
  					</div>
				</form>
			</div>
		</div>
	</div>
</div>	