<?php foreach ($configs as $config) {
	$max_adultos=$config->max_adultos;
	$max_menores=$config->max_menores;
}?>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-hotel">
	  		<div class="panel-heading">Consulta</div>
	  		<div class="panel-body">
	  			<form method="post" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/envio'?>" />
  					<div class="form-group">
    					<label for="mensaje"><i class="fa fa-envelope-o"></i> Mensaje</label>
    					<textarea type="email" class="form-control" id="exampleInputEmail1"></textarea>
  					</div>
  					<div class="form-group">
    					<label for="email"><i class="fa fa-envelope-o"></i> Email</label>
    					<input type="email" class="form-control" id="nombre">
  					</div>
  					<div class="form-group">
    					<label for="nombre"><i class="fa fa-user"></i> Nombre</label>
    					<input type="text" class="form-control" name="nombre">
  					</div>
  					<div class="form-group">
    					<label for="apellido"><i class="fa fa-user"></i> Apellido</label>
    					<input type="text" class="form-control" name="apellido">
  					</div>
  					<div class="form-group">
    					<label for="telefono"><i class="fa fa-phone"></i> Teléfono</label>
    					<input type="text" class="form-control" name="apellido">
  					</div>
  					<div class="form-group">
  						<center>
  							<button type="submit" class="btn btn-hotel btn-xlarge">
								<span class="icon-chevron-right"></span>
							</button>	
  						</center>
  					</div>
				</form>
			</div>
		</div>
		
		
	</div>