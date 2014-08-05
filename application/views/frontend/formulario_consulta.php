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
    					<label for="mensaje"><i class="fa fa-user"></i> Mensaje</label>
    					<input type="email" class="form-control" id="exampleInputEmail1">
  					</div>
  					<div class="form-group">
  						<button type="submit" class="btn btn-hotel btn-lg btn-block">Enviar</button>
  					</div>
				</form>
			</div>
		</div>
		
		
	</div>