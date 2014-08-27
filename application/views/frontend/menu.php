<div class="container">	
	<div class="row menu">
	<div class="col-md-3">
		<center>
		<a href="<?php echo base_url().'index.php/inicio/inicio'; ?>" class="logo">
		<?php  
			foreach ($hoteles as $hotel) {
				$logo_url=array();
				if (!(in_array($hotel->logo_url, $logo_url))) {
					$logo_url[]=$hotel->logo_url;	
				} 
  		}?>
			<img src="<?php echo base_url().'assets/uploads/logos/'.$logo_url[0];?>" alt="">
		</a>
		</center>
	</div>	                
    <div class="col-md-9">
    	<ul class="nav nav-pills pull-right">
  			<li><a href="#" data-toggle="modal" data-target="#email"><?php echo $texto['consulta']?></a></li>
  			<li>
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			    	<?php echo $texto['idiomas']?>
			  	</a>
			  	<ul class="dropdown-menu" role="menu">
			    <?php foreach ($idiomas as $idioma) { ?>
						<input class="moneda" 
						name="boton1" type="image" 
						title="<?php echo $idioma->idioma;?>" rel="tooltip" 
						src="<?php echo base_url().'assets/uploads/idiomas/'.$idioma->imagen;?>" 
						onclick="document.cookie = 'idioma=<?php echo $idioma->id_idioma ?>', location.reload()">
				<?php } ?>

			  	</ul>
			</li>
  			<li><a href="<?php echo base_url().'index.php/admin/home/logout/'?>">Admin</a></li>
		</ul>
	</div>
	</div>
	

<!---------------------------------------------------------------------------------
-----------------------------------------------------------------------------------
					
							Modal consulta

-----------------------------------------------------------------------------------
---------------------------------------------------------------------------------->	


<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel"><?php echo $texto['consulta']?></h4>
      		</div>
      		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/envio'?>" />
      		<div class="modal-body">
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label"><?php echo $texto['mensaje']?></label>
    				<div class="col-sm-10">
      				<textarea class="form-control" name="consulta" rows="3"></textarea>
    				</div>
  				</div>
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label"><?php echo $texto['email']?></label>
    				<div class="col-sm-10">
      				<input class="form-control" name="email" type="email">
    				</div>
  				</div>
  				
  				<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label"><?php echo $texto['nombre']?></label>
    				<div class="col-sm-10">
    				<input type="text" class="form-control" name="nombre">
    				</div>
  				</div>
  				<div class="form-group">
    				<label for="apellido" class="col-sm-2 control-label"><?php echo $texto['apellido']?></label>
    				<div class="col-sm-10">
    				<input type="text" class="form-control" name="apellido">
    				</div>
  				</div>
  				<div class="form-group">
    				<label for="telefono"class="col-sm-2 control-label" ><?php echo $texto['telefono']?></label>
    				<div class="col-sm-10">
    				<input type="text" class="form-control" name="apellido">
    				</div>
  				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $texto['cerrar']?></button>
        		<button type="submit" class="btn btn-hotel"><?php echo $texto['enviar_consulta']?></button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>





<?php 
  					$telefono=array();
					$direccion=array();
					$email=array();
  					foreach ($hoteles as $hotel) {
  						if (!(in_array($hotel->telefono, $telefono))) {
    						$telefono[]=$hotel->telefono;	
						} 
						if (!(in_array($hotel->nro." - ".$hotel->calle." - ".$hotel->provincia, $direccion))) {
							$direccion[]=$hotel->nro." - ".$hotel->calle." - ".$hotel->provincia;
						}	
						if (!(in_array($hotel->email, $email))) {
							$email[]=$hotel->email;
						}
} ?>	



<!---------------------------------------------------------------------------------
-----------------------------------------------------------------------------------
					
						Modal telefono 

-----------------------------------------------------------------------------------
---------------------------------------------------------------------------------->	


<div class="modal fade" id="telefono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel"><?php echo $texto['telefono']?></h4>
      		</div>
      		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/envio'?>" />
      		<div class="modal-body">
      			<div class="form-group">
    				<label for="nombre" class="col-sm-2 control-label"><?php echo $texto['telefono']?></label>
    				<div class="col-sm-10">
    					<?php 
						foreach ($telefono as $key => $value) {
							echo $value."<br>";
						}
						?>
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
        		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $texto['cerrar']?></button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>


<!---------------------------------------------------------------------------------
-----------------------------------------------------------------------------------
					
						Modal dirección 

-----------------------------------------------------------------------------------
---------------------------------------------------------------------------------->	


<div class="modal fade" id="direccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel"><?php echo $texto['direccion']?></h4>
      		</div>
      		<div class="modal-body">
      			<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.3745900600725!2d-68.847059!3d-32.88826299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e5e8abae6963f75!2sGran+Carollo!5e0!3m2!1ses!2sar!4v1407167639519"></iframe>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $texto['cerrar']?></button>
      		</div>
      		</form>
    	</div>
  	</div>
</div>