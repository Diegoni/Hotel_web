<div class="container">	
	<div class="row">
	<div class="col-md-4">
		<center>
		<a href="<?php echo base_url().'index.php/inicio/inicio'; ?>">
		<?php foreach ($hoteles as $hotel) { ?>
			<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url;?>" alt="">
		<?php } ?>
		</a>
		</center>
	</div>	                
    <div class="col-md-8">
    	<ul class="nav nav-pills pull-right">
  			<li><a href="#" data-toggle="modal" data-target="#myModal">Consulta</a></li>
		</ul>
	</div>
	</div>
	

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Consulta</h4>
      		</div>
      		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/envio'?>" />
      		<div class="modal-body">
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Mensaje</label>
    				<div class="col-sm-10">
      				<textarea class="form-control" name="consulta" rows="3"></textarea>
    				</div>
  				</div>
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Email</label>
    				<div class="col-sm-10">
      				<input class="form-control" name="email" type="email">
    				</div>
  				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        		<button type="submit" class="btn btn-primary">Enviar consulta</button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>