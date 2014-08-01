<div class="col-md-9">
	<div class="panel panel-default">
		<!--<div class="panel-heading">Habitación</div>-->
		<div class="panel-body">
			<?php $noches=restarFechasFormulario($this->input->post('salida'),$this->input->post('entrada'));?>
			<?php if($habitaciones){?>
			<h1 class="text-center">Seleccione su habitación</h1>
			<?php echo form_open('reserva/datos');?>
			<?php foreach ($habitaciones as $habitacion) { ?> 
			<div class="panel panel-default">
        		<div class="panel-body">
          			<div class="media col-md-3 well thumbnail">
						<div class="caption">
							<h4>Habitación</h4>
							<p>comentario</p>
							<p>
								<a href="#" class="btn btn-info btn-xs" rel="tooltip" title="Enviar por correo"><span class="icon-emailalt"></span></a>
								<a href="#" class="btn btn-default btn-xs" rel="tooltip" title="Ver fotos"><span class="icon-play"></span></a>
							</p>
						</div>
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<?php	$imagenes_habitacion=$this->imagenes_habitacion_model->getImagenes($habitacion->id_habitacion); ?>
							<div class="carousel-inner">
								<?php 
								$i=0;
								foreach ($imagenes_habitacion as $imagenes) { ?>
									<a href="#" class="item <?php if($i==0){echo 'active';}?>" class="thumbnail">								
										<img alt="slide" src="<?php echo base_url().'assets/uploads/articulos/'.$imagenes->imagen;?>" style="max-width: 160px; max-height: 120px;">
									</a>
									<?php $i=$i+1?>
								<?php } ?>
							</div>
									<!--
						      		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						        		<span class="glyphicon glyphicon-chevron-left"></span>
						      		</a>
						      		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						        		<span class="glyphicon glyphicon-chevron-right"></span>
						      		</a>
						      	-->
						</div>
					</div>
                	<div class="col-md-6">
						<h4 class="list-group-item-heading" data-toggle="modal" data-target="#<?php echo $habitacion->id_habitacion?>"> <?php echo $habitacion->habitacion; ?> </h4>
						<p class="list-group-item-text"> 
                    	 	<?php	echo $habitacion->descripcion;	?>
                    	 	<a href="<?php echo base_url().'index.php/habitacion/view/'.$habitacion->id_habitacion?>" class="btn btn-default" rel="tooltip" title="Leer más" target="_blank"><span class="icon-googleplusold"></span></a>       
                    	</p>
                	</div>
                	<div class="col-md-3 text-center">
                    	<h2><?php echo $habitacion->simbolo; ?> 
                    		<?php $precio=$noches*$habitacion->precio; ?>
							<?php echo number_format($precio, 2, ',', ' '); ?><small> <?php echo $habitacion->moneda; ?></small></h2>
                    	<button type="submit" name="habitacion" value="<?php echo $habitacion->id_habitacion; ?>" class="btn btn-primary btn-lg btn-block">Seleccionar</button>
                    	<div class="stars" >
                        	Adultos: <?php 
                        	for ($i=0; $i < $habitacion->adultos; $i++) { 
								echo "<i rel='tooltip' title='Máximo de adultos' class='fa fa-user'></i> ";
							}
                        	?>  
                    	</div>
                    		Menores: <?php 
                    		if( $habitacion->menores>0 ){
                    			for ($i=0; $i < $habitacion->menores; $i++) { 
									echo "<i rel='tooltip' title='Máximo de menores' class='fa fa-child'></i> ";
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
			<?php }else{ ?>
			<h1 class="text-center">No hay habitaciones disponibles</h1>
			<h3 class="text-center">Otras opciones disponibles</h3>
			<div class="col-xs-12">
			<div class="offer offer-primary">
				<div class="shape">
					<div class="shape-text">
						top								
					</div>
				</div>
				<div class="offer-content">
					<h3 class="lead">
						Habitación
					</h3>
					<p>Descripción</p>
				</div>
			</div>
			</div>
		
			<?php } ?>
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
					<th><i class="fa fa-moon-o"></i> Noches: </th>
					<td><?php echo $noches;?></td>
				</tr>
				<tr>
					<th><i class="fa fa-building"></i> Hotel: </th>
					<td>
						<?php
						foreach ($hotel as $hotel2) {
							echo $hotel2->hotel;
						} 
						?>
					</td>
					<th></th>
					<td></td>
				</tr>
			</table>
		</div>
	</div> 
</div>
</div>	
