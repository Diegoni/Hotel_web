	<div class="col-md-9">
		<div class="panel panel-hotel">
			<div class="panel-heading"><?php echo $texto['datos_personales']?></div>
		  	<div class="panel-body">
		  		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/reserva/pago'?>" />
  					<div class="form-group">
    					<label for="nombre" class="col-sm-2 control-label"><?php echo $texto['nombre']?></label>
    					<div class="col-sm-10">
    						<div class="input-group">
								<input type="text" class="form-control" name="nombre" id="validate-text" placeholder="<?php echo $texto['ingrese']?> <?php echo $texto['nombre']?>" autofocus required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="apellido" class="col-sm-2 control-label"><?php echo $texto['apellido']?></label>
    					<div class="col-sm-10">
    						<div class="input-group">
								<input type="text" class="form-control" name="apellido" id="validate-text" placeholder="<?php echo $texto['ingrese']?> <?php echo $texto['apellido']?>" required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
    					</div>
  					</div>
  					
  					<div class="form-group">
    					<label for="email" class="col-sm-2 control-label"><?php echo $texto['email']?></label>
    					<div class="col-sm-10">
    						<div class="input-group" data-validate="email">
								<input type="text" class="form-control" name="email" id="validate-email" placeholder="<?php echo $texto['ingrese']?> <?php echo $texto['email']?>" required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
      					</div>
  					</div>
  					  					  					
  					<div class="form-group">
    					<label for="telefono" class="col-sm-2 control-label"><?php echo $texto['telefono']?></label>
    					<div class="col-sm-10">
    						<div class="input-group" data-validate="phone">
								<input type="text" class="form-control" name="telefono" id="validate-phone" placeholder="<?php echo $texto['ejemplo']?> 261-4223355" required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
    					</div>
  					</div>
  					
  					<div class="form-group">
            			<label for="tipo_tarjeta" class="col-sm-2 control-label"><?php echo $texto['tipo_tarjeta']?></label>
						<div class="col-sm-10">
							<div class="input-group">
		                        <select class="form-control" name="tipo_tarjeta" id="tipo_tajeta"required>
		                            <option value=""><?php echo $texto['seleccione_tarjeta']?></option>
		                            <?php foreach ($tipos_tarjeta as $tipo_tarjeta) { ?>
										<option value="<?php echo $tipo_tarjeta->id_tipo_tarjeta; ?>"><?php echo $tipo_tarjeta->tipo_tarjeta; ?></option>	
									<?php } ?>
		                        </select>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
    					<label for="tarjeta" class="col-sm-2 control-label"><?php echo $texto['tarjeta']?></label>
    					<div class="col-sm-10">
    						<div class="input-group" data-validate="phone">
								<input type="text" class="form-control" name="tarjeta" id="tarjeta" placeholder="<?php echo $texto['ejemplo']?> 261-4223355" required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
    					</div>
  					</div>
  					
  					<div class="form-group slidingDiv">
  						<label for="nota" class="col-sm-2 control-label"><?php echo $texto['nota']?></label>
    					<div class="col-sm-10">
      						<textarea class="form-control" name="nota" rows="3" placeholder="<?php echo $texto['ingrese']?> <?php echo $texto['nota']?>"></textarea>
    					</div>
  					</div>
  					
  					<div class="form-group">
  						<label for="nota" class="col-sm-2 control-label"></label>
    					<div class="col-sm-10">
      						<a href="#" class="btn btn-default show_hide">
								<?php echo $texto['agregar_nota']?>
							</a>
    					</div>
  					</div>
  					
  					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" required> <?php echo $texto['acepto_condiciones']?> 
					          <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#terminos"><?php echo $texto['ver_condiciones']?> </a> 
					        </label>
					      </div>
					    </div>
					</div>
  					  					
  					<div class="form-group">
  						<input type="hidden" name="entrada" value="<?php echo $this->input->post('entrada') ?>">
						<input type="hidden" name="salida"  value="<?php echo $this->input->post('salida') ?>">
						<input type="hidden" name="adultos" value="<?php echo $this->input->post('adultos') ?>">
						<input type="hidden" name="menores" value="<?php echo $this->input->post('menores') ?>">					
						<input type="hidden" name="hotel" value="<?php echo $this->input->post('hotel') ?>">
						<?php 
						foreach ($habitaciones as $clave => $valor) { ?>
	    					<input type="hidden" name="habitacion<?php echo $clave;?>" value="<?php echo $valor?>">
						<?php } ?>
						<center>
    					<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-hotel btn-xlarge">
								<span class="icon-ok font-big"></span>
							</button>
    					</div>
    					<div class="col-sm-5">
							
      					</div>
      					</center>
    					
  					</div>  					
				</form>
		    </div>
		</div>
		
		<!-- ver como lo vamos a trabajar -->
		<!--
		<div class="panel panel-default">
			<div class="panel-heading">Huesped registrado</div>
		  	<div class="panel-body">
				<form class="form-horizontal" role="form">
  					<div class="form-group">
    					<label for="usuario" class="col-sm-2 control-label">Ususario</label>
    					<div class="col-sm-10">
      						<div class="input-group">
								<input type="text" class="form-control" name="nombre" id="validate-text" placeholder="Ingrese nombre" required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
    					</div>
    				</div>
  					
  					
  					<div class="form-group">
    					<label for="pass" class="col-sm-2 control-label">Pass</label>
    					<div class="col-sm-10">
      					<div class="input-group">
								<input type="password" class="form-control" name="pass" id="validate-text" placeholder="Ingrese pass" required>
								<span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
							</div>
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
		-->
	</div>
</div>

<div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel"><?php echo $texto['terminos_condiciones']?></h4>
      		</div>
      		<div class="modal-body">
      			<?php foreach ($terminos as $termino) { ?>
					  <?php echo $termino->termino; ?>
				<?php } ?>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $texto['cerrar']?></button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>	