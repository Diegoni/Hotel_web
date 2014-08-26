<?php foreach ($configs as $config) {
	$max_adultos=$config->max_adultos;
	$max_menores=$config->max_menores;
}?>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-hotel">
	  		<div class="panel-heading"><?php echo $texto['consulta'];?></div>
	  		<div class="panel-body">
	  			<form method="post" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/envio'?>" />
  					<div class="form-group">
    					<label for="mensaje"><i class="fa fa-envelope-o"></i> <?php echo $texto['mensaje'];?></label>
    					<textarea type="email" class="form-control" id="exampleInputEmail1"></textarea>
  					</div>
  					<div class="form-group">
    					<label for="email"><i class="fa fa-envelope-o"></i> <?php echo $texto['email'];?></label>
    					<input type="email" class="form-control" id="nombre">
  					</div>
  					<div class="form-group">
    					<label for="nombre"><i class="fa fa-user"></i> <?php echo $texto['nombre'];?></label>
    					<input type="text" class="form-control" name="nombre">
  					</div>
  					<div class="form-group">
    					<label for="apellido"><i class="fa fa-user"></i> <?php echo $texto['apellido'];?></label>
    					<input type="text" class="form-control" name="apellido">
  					</div>
  					<div class="form-group">
    					<label for="telefono"><i class="fa fa-phone"></i> <?php echo $texto['telefono'];?></label>
    					<input type="text" class="form-control" name="apellido">
  					</div>
  					<div class="form-group">
  						<center>
  							<button type="submit" class="btn btn-hotel btn-xlarge">
								<span class="icon-ok"></span>
							</button>	
  						</center>
  					</div>
				</form>
			</div>
		</div>
		
		
	</div>