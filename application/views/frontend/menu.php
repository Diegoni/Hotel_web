<div class="container">	
	<div class="row menu">
	<div class="col-md-3">
		<center>
		<a href="<?php echo base_url().'index.php/inicio/inicio'; ?>" class="logo">
		<?php foreach ($hoteles as $hotel) { ?>
			<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url;?>" alt="">
		<?php } ?>
		</a>
		</center>
	</div>	                
    <div class="col-md-9">
    	<ul class="nav nav-pills pull-right">
  			<li><a href="#" data-toggle="modal" data-target="#email">Consulta</a></li>
  			<li><a href="<?php echo base_url().'index.php/admin/home/logout/'?>">Admin</a></li>
		</ul>
	</div>
	</div>
	

<!-- Modal -->
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
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
        		<button type="submit" class="btn btn-hotel">Enviar consulta</button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>



<div class="modal fade" id="telefono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel">Teléfonos</h4>
      		</div>
      		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/envio'?>" />
      		<div class="modal-body">
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Teléfono</label>
    				<div class="col-sm-10">
    					<img src="<?php echo base_url().'assets/uploads/banderas/argentina-icono-8268-48.png'?>" alt="">
      					(0261) - 4235666
    				</div>
  				</div>
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label">Skype</label>
    				<div class="col-sm-10">
      				<a href="skype:contact-mt?call" class="btn btn-default"><span>carollo_hotel</span></a>
    				</div>
  				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>