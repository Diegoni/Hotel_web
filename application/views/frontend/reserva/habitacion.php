<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">Habitación</div>
	  	<div class="panel-body">
	  		<h1 class="text-center">Seleccione su habitación</h1>
	  		<?php echo form_open('reserva/datos');?>
				<?php foreach ($habitaciones as $habitacion) { ?> 
        			<div class="panel panel-default">
        				<div class="panel-body">
          				<div class="media col-md-3">
                    		<figure class="pull-left">
                        		<img class="media-object img-rounded img-responsive" src="<?php echo base_url().'librerias/main/css/350x250.gif'?>" alt="placehold.it/350x250" >
                    		</figure>
                		</div>
                		<div class="col-md-6">
                    		<h4 class="list-group-item-heading" data-toggle="modal" data-target="#<?php echo $habitacion->id_habitacion?>"> <?php echo $habitacion->habitacion; ?> </h4>
                    		<p class="list-group-item-text"> 
                    	 		<?php echo $habitacion->descripcion; ?>       
                    		</p>
                		</div>
                		<div class="col-md-3 text-center">
                    		<h2><?php echo $habitacion->simbolo; ?> 
                    			<?php $noches=$this->input->post('salida')-$this->input->post('entrada') ?>
                    			<?php $precio=$noches*$habitacion->precio; ?>
								<?php echo number_format($precio, 2, ',', ' '); ?><small> <?php echo $habitacion->moneda; ?></small></h2>
                    		<button type="submit" name="habitacion" value="<?php echo $habitacion->id_habitacion; ?>" class="btn btn-primary btn-lg btn-block">Seleccionar</button>
                    		<div class="stars">
                        		Adultos: <?php 
                        		for ($i=0; $i < $habitacion->adultos; $i++) { 
									echo "<i class='fa fa-user'></i> ";
								}
                        		?>  
                    		</div>
                    		Menores: <?php 
                    			if( $habitacion->menores>0 ){
                    				for ($i=0; $i < $habitacion->menores; $i++) { 
										echo "<i class='fa fa-child'></i> ";
									}	
                    			}
                    			?>
                    			
                    		</div>	
                		</div>
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
							<th><i class="fa fa-user"></i> Tipo: </th>
									
							<td>
								<?php
								foreach ($tipo_habitacion as $tipo) {
									echo $tipo->tipo_habitacion;
								} 
								?>
							</td>
							<th><i class="fa fa-building"></i> Hotel: </th>
							<td>
								<?php
								foreach ($hotel as $hotel2) {
									echo $hotel2->hotel;
								} 
								?>
							</td>
						</tr>
					</table>
			</div>
		</div> 
	</div>
</div>	
