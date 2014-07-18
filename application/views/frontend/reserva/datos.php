
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">Datos personales</div>
		  	<div class="panel-body">
		  		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/reserva/pago'?>" />
  					<div class="form-group">
    					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="apellido" class="col-sm-2 control-label">Apellido</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" id="apellido" placeholder="Ingrese apellido">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="email" class="col-sm-2 control-label">Email</label>
    					<div class="col-sm-10">
      					<input type="email" class="form-control" id="email" placeholder="Ingrese email">
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="pais" class="col-sm-2 control-label">Pais</label>
    					<div class="col-sm-10">
      					<select name="pais" class="form-control">
      						<?php foreach ($paises as $pais) { ?>
								<option value="<?php echo $pais->id_pais ?>"><?php echo $pais->pais ?></option>		  
							<?php } ?>
      					</select>
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
    					<div class="col-sm-10">
      					<input type="teléfono" class="form-control" id="email" placeholder="Ingrese teléfono">
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
    					</div>
  					</div>
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