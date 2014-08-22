  	<aside class="flotante">
    	<div class="btn-toolbar">
			<div class="btn-group">
				<a href="javascript:agregar()" class="btn btn-default btn-lg" title='Agregar a favoritos'><i class="icon-favoritefile"></i></a>
		      	<a href="#" class="btn btn-default btn-lg" title='Enviar consulta' data-toggle="modal" data-target="#email"><i class="icon-emailalt"></i></a>
		      	<a href="#" class="btn btn-default btn-lg" title='Teléfonos' data-toggle="modal" data-target="#telefono"><i class="icon-phonealt"></i></a>
		      	<a href="#" class="btn btn-default btn-lg" title='Dirección' data-toggle="modal" data-target="#direccion"><i class="icon-map-marker"></i></a>
		      	<a href="#" class="scrollup btn btn-default btn-lg" title='Ir arriba'><span class="icon-arrow-up"></span></a>
		  	</div>
		</div>      
	</aside>
  	  	
  	
  	<div class="row">
  		<div class="col-md-12">
  			<div class="panel panel-default">
  				<div class="panel-body">
  					
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
					<h4 class="footer-text"><i class="fa fa-phone"></i>
						<?php 
						foreach ($telefono as $key => $value) {
							echo $value."<br>";
						}
						?>
					</h4>
   					<h4 class="footer-text"><i class="fa fa-map-marker"></i> 
						<?php 
						foreach ($direccion as $key => $value) {
							echo $value."<br>";
						}
						?>
					</h4>
   					<h4 class="footer-text"><i class="fa fa-envelope-o"></i>
						<?php 
						foreach ($email as $key => $value) {
							echo $value."<br>";
						}
						?>
					</h4>
   						
    			</div>
			</div>
  		</div>
  	</div>
	 		
    
</div><!-- cierra el <div class="container"> -->


</body>
</html>
