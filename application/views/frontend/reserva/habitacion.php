<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="wizard">
    			<a class="current"><span class="badge">1</span> Fecha</a>
    			<a class="current"><span class="badge">2</span> Consultar precios</a>
    			<a ><span class="badge badge-inverse">3</span> Datos personales</a>
    			<a><span class="badge">4</span> Confirmación</a> 
			</div>
		</div>
	  	<div class="panel-body">
	  		
	  		
	  		 <h1 class="text-center">Seleccione su habitación</h1>
	  		 
	  		 
	  		 
      			<?php echo form_open('reserva/datos');?>
				<?php foreach ($habitaciones as $habitacion) { ?> 
        			<div class="list-group">
          				<a href="#" class="list-group-item">
                		<div class="media col-md-3">
                    		<figure class="pull-left">
                        		<img class="media-object img-rounded img-responsive" src="http://placehold.it/350x250" alt="placehold.it/350x250" >
                    		</figure>
                		</div>
                		<div class="col-md-6">
                    		<h4 class="list-group-item-heading" data-toggle="modal" data-target="#<?php echo $habitacion->id_habitacion?>"> <?php echo $habitacion->habitacion; ?> </h4>
                    		<p class="list-group-item-text"> 
                    	 		<?php echo $habitacion->descripcion; ?>       
                    		</p>
                		</div>
                		<div class="col-md-3 text-center">
                    		<h2><?php echo $habitacion->simbolo; ?> <?php echo number_format($habitacion->precio, 2, ',', ' '); ?><small> <?php echo $habitacion->moneda; ?></small></h2>
                    		<button type="submit" name="habitacion" value="<?php echo $habitacion->id_habitacion; ?>" class="btn btn-primary btn-lg btn-block">Seleccionar</button>
                    		<div class="stars">
                        		Adultos: <?php echo $habitacion->adultos; ?>  
                    		</div>
                    		<p> Menores: <?php echo $habitacion->menores; ?> </p>
                		</div>
          				</a>
         			</div>
			        <input type="hidden" name="entrada" value="<?php echo $this->input->post('entrada') ?>">
					<input type="hidden" name="salida"  value="<?php echo $this->input->post('salida') ?>">
					<input type="hidden" name="adultos" value="<?php echo $this->input->post('adultos') ?>">
					<input type="hidden" name="menores" value="<?php echo $this->input->post('menores') ?>">
        		<?php } ?>			
        		<?php echo form_close(); ?>
				
					<table class="table table-hover">
						<tr>
							<th><i class="fa fa-sign-in"></i> Entrada: </th>
							<td><?php echo $this->input->post('entrada') ?></td>
							<th><i class="fa fa-sign-out"></i> Salida: </th>
							<td><?php echo $this->input->post('salida') ?></td>
						</tr>
						<tr>
							<th><i class="fa fa-user"></i> Adultos: </th>
							<td><?php echo $this->input->post('adultos') ?></td>
							<th><i class="fa fa-child"></i> Menores: </th>
							<td><?php echo $this->input->post('menores') ?></td>
						</tr>
					</table>
			</div>
		</div> 
	</div>
</div>	
