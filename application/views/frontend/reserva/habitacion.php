<div class="col-md-9">
	<div class="panel panel-default">
		<!--<div class="panel-heading">Habitación</div>-->
		<div class="panel-body">
			<?php $noches=restarFechasFormulario($this->input->post('salida'),$this->input->post('entrada'));?>
			<div class="panel panel-default">
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
				<tr>
					<th><i class="fa fa-building"></i> Hotel: </th>
					<td>
						<?php
						foreach ($hotel as $hotel2) {
							echo $hotel2->hotel;
						} 
						?>
					</td>
					<th><i class="fa fa-moon-o"></i> Noches: </th>
					<td><?php echo $noches;?></td>
				</tr>
			</table>
			</div>
			
			<?php if($habitaciones){?>
			<h1 class="text-center">Seleccione su habitación</h1>
			<?php echo form_open('reserva/datos');?>
			<?php foreach ($habitaciones as $habitacion) { ?> 
			<div class="panel panel-default">
        		<div class="panel-body">
        			<div class="col-md-3 text-center">
        				<h2><small> <?php echo $habitacion->habitacion; ?> </small></h2>
        				<p class="list-group-item-text"> 
							<a href="<?php echo base_url().'index.php/habitacion/view/'.$habitacion->id_habitacion;?>" class="btn btn-default btn-lg" title="Leer más" rel="tooltip">
								<span class="icon-chevron-down"></span>
							</a>
                    	</p>
        			</div>
          			<div class="media col-md-3 thumbnail">
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
						</div>
					</div>
                	
			                	
                	<div class="col-md-3 text-center">
                		<?php foreach ($cambios as $cambio) { ?>
						<h2><small> <?php echo $cambio->abreviatura ; ?></small>
                    		<?php echo $cambio->simbolo; ?> 
                    		<?php echo number_format($habitacion->precio/$cambio->valor, 2, ',', ' '); ?></h2>
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
                    		}else{
                    			echo "sin menores";
                    		}
                    		?>
                    		<?php } ?>
                    </div>
                    <div class="col-md-3">
						<div class="form-group">
								<div class="col-sm-12">
									<h2><small> Cantidad </small></h2>
									<?php
									$cantidad=$habitacion->cantidad;
									
									if(isset($reservas_habitacion)){
										foreach ($reservas_habitacion as $disp) {
											if($habitacion->id_habitacion==$disp->id_habitacion){
												$cantidad=$cantidad-$disp->cantidad; 
											}
										}	
									}
									
									if(isset($disponibilidades)){
										foreach ($disponibilidades as $disponibilidad) {
											if($habitacion->id_habitacion==$disponibilidad->id_habitacion){	
												$cantidad=0;
											}
										}
									}																			
									 
									
									?>
									<select name="habitacion<?php echo $habitacion->id_habitacion?>" class="form-control habitacion" onChange="validarHabitacion()">
										<?php for ($i=0; $i <= $cantidad; $i++) { ?>
										<option value="<?php echo $i;?>">
											<?php echo $i;
											if($i>0){
												echo "($ ".number_format($precio=$noches*$habitacion->precio*$i/$cambio->valor, 2, ',', ' ').")";	
											} 											 
											?>
										</option>
										<?php }?>
									</select>
								</div>
							</div>
						
                	</div>	
                </div>
         	</div>
         	<?php } ?>	
         	
         		<input type="hidden" name="entrada" value="<?php echo $this->input->post('entrada') ?>">
				<input type="hidden" name="salida" value="<?php echo $this->input->post('salida') ?>">
				<input type="hidden" name="adultos" value="<?php echo $this->input->post('adultos') ?>">
				<input type="hidden" name="menores" value="<?php echo $this->input->post('menores') ?>">
				<input type="hidden" name="hotel" value="<?php echo $this->input->post('hotel') ?>">
				
				<div class="col-xs-4">
				</div>
				<div class="col-xs-4">
					<center>
					<button type="submit" name="reservar" value="Seleccione una opción" class="btn btn-hotel btn-xlarge">
						<span class="icon-chevron-right"></span>
					</button>
					</center>
				</div>
				<div class="col-xs-4">
					<label id="habitaciones" class="pull-right"></label>
				</div>
					
				
				
         	
         	<?php echo form_close(); ?>
         	
        	<?php }else{ ?>
			<h1 class="text-center">No hay habitaciones disponibles</h1>
			<h3 class="text-center">Otras opciones disponibles</h3>
			<div class="col-xs-12">
			<div class="offer offer-hotel">
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
			
		</div>
	</div> 
</div>
</div>	

<script>
	$(document).ready(function(){
		validarHabitacion();
 	});
</script>
