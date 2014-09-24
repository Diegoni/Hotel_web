<div class="col-md-8">
	<div class="panel panel-default">
		<!--<div class="panel-heading">Habitación</div>-->
		<div class="panel-body">
			<?php $noches=restarFechasFormulario($this->input->post('salida'),$this->input->post('entrada'));?>
			<div class="panel panel-default">
			<table class="table table-hover">
				<tr>
					<th><i class="fa fa-sign-in"></i> <?php echo $texto['entrada']?>: </th>
					<td><?php echo $this->input->post('entrada') ?></td>
					<th><i class="fa fa-sign-out"></i> <?php echo $texto['salida']?>: </th>
					<td><?php echo $this->input->post('salida') ?></td>
				</tr>
				<tr>
					<th><i class="fa fa-user"></i> <?php echo $texto['adultos']?>: </th>
					<td><?php echo $this->input->post('adultos') ?></td>
					<th><i class="fa fa-child"></i> <?php echo $texto['menores']?>: </th>
					<td><?php echo $this->input->post('menores') ?></td>
				</tr>
				<tr>
					<th><i class="fa fa-building"></i> <?php echo $texto['hotel']?>: </th>
					<td>
						<?php
						foreach ($hotel as $hotel2) {
							echo $hotel2->hotel;
							$id_hotel=$hotel2->id_hotel;
						} 
						?>
					</td>
					<th><i class="fa fa-moon-o"></i> <?php echo $texto['noches']?>: </th>
					<td><?php echo $noches;?></td>
				</tr>
			</table>
			</div>
			
			<?php if($habitaciones){?>
			<h1 class="text-center"><?php echo $texto['seleccione_habitacion']?></h1>
			<?php echo form_open('reserva/datos');?>
			<?php foreach ($habitaciones as $habitacion) { ?> 
			<div class="panel panel-hotel">
        		<div class="panel-body">
        			<div class="col-md-3 text-center">
        				<h2><small> <?php echo $habitacion->habitacion; ?> </small></h2>
        				<p class="list-group-item-text"> 
							<a href="<?php echo base_url().'index.php/habitacion/view/'.$habitacion->id_habitacion.'/'.$id_hotel;?>" class="btn btn-default btn-lg" title="<?php echo $texto['leer_mas']?>" rel="tooltip">
								<span class="icon-chevron-down"></span>
							</a>
							<a href="#" class="btn btn-default btn-lg" title="<?php echo $texto['email']?>" rel="tooltip" data-toggle="modal" data-target="#habitacion<?php echo $habitacion->id_habitacion?>">
								<span class="icon-share"></span>
							</a>
                    	</p>
        			</div>
          			<div class="media col-md-3 thumbnail">
          				<div class="caption">
							<h4><?php echo $texto['habitacion']?></h4>
							<!--<p>comentario</p>-->
							<p>
								<a href="<?php echo base_url().'index.php/habitacion/galeria/'.$habitacion->id_habitacion.'/'.$id_hotel?>" class="btn btn-default" rel="tooltip" title="<?php echo $texto['ver_fotos']?>"><span class="icon-play"></span></a>
							</p>
						</div>
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<?php	$imagenes_habitacion=$this->imagenes_habitacion_model->getImagenes($habitacion->id_habitacion); ?>
							<div class="carousel-inner">
								<?php 
								$i=0;
								foreach ($imagenes_habitacion as $imagenes) { ?>
									<a href="#" class="item <?php if($i==0){echo 'active';}?>" class="thumbnail">								
										<img alt="slide" src="<?php echo base_url().'assets/uploads/habitaciones/'.$imagenes->imagen;?>" style="max-width: 160px; max-height: 120px;">
									</a>
									<?php $i=$i+1?>
								<?php } ?>
							</div>
						</div>
					</div>
                	
			                	
                	<div class="col-md-3 text-center">
                		<?php
                		$precio=$habitacion->precio;
						$precio_con_descuento=0;
						
                		if(isset($tarifas)){
                			foreach ($tarifas as $tarifa) { 
								if($tarifa->id_habitacion==$habitacion->id_habitacion){
									$datos=array('id_tipo_tarifa'=>$tarifa->id_tipo_tarifa,
												 'valor'=>$tarifa->valor,
												 'precio'=>$habitacion->precio); 
									$precio=$this->tarifas_temporales_model->calcular_precio($datos);
									if($precio<$habitacion->precio){
										$precio_con_descuento=1;
									}
                				}							
							}	
                		} 
						?>
                		
                		<?php foreach ($cambios as $cambio) { ?>
						<?php if($precio_con_descuento==1){ ?>
						<del><h4><small> 
                				<?php echo $cambio->abreviatura ; ?>
                			</small>
                    			<?php echo $cambio->simbolo; ?>  
                    			<?php echo number_format($habitacion->precio/$cambio->valor*$noches, 2, ',', ' '); ?></h4></del>							
						<?php } ?>
						<?php if($precio/$cambio->valor*$noches>1000){
							echo "<h3>";
						}else{
							echo "<h2>";
						}; ?>                			
                		
                			<small> 
                				<?php echo $cambio->abreviatura ; ?>
                			</small>
                    			<?php echo $cambio->simbolo; ?>  
                    			<?php echo number_format($precio/$cambio->valor*$noches, 2, ',', ' '); ?>
                    			<input type="hidden" name="precio<?php echo $habitacion->id_habitacion ?>" value="<?php echo $precio ?>">
						<?php if($precio/$cambio->valor*$noches>1000){
							echo "</h3>";
						}else{
							echo "</h2>";
						}; ?>   
						<div class="stars" >
                        	<?php echo $texto['adultos']?>: <?php 
                        	for ($i=0; $i < $habitacion->adultos; $i++) { 
								echo "<i rel='tooltip' title='".$texto['maximo_adultos']."' class='fa fa-user'></i> ";
							}
                        	?>  
                    	</div>
                    		<?php echo $texto['menores']?>: <?php 
                    		if( $habitacion->menores>0 ){
                    			for ($i=0; $i < $habitacion->menores; $i++) { 
									echo "<i rel='tooltip' title='".$texto['maximo_menores']."' class='fa fa-child'></i> ";
								}	
                    		}else{
                    			echo $texto['sin_menores'];
                    		}
                    		?>
                    		<?php } ?>
                    </div>
                    <div class="col-md-3">
						<div class="form-group">
								<div class="col-sm-12">
									<h2><small> <?php echo $texto['cantidad'] ?></small></h2>
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
											<?php 
											if($cantidad==0){
												echo $texto['sin_disponibilidad'];
											}else{
												echo $i;
												if($i>0){
													echo "(".$cambio->simbolo." ".number_format($precio*$i/$cambio->valor*$noches, 2, ',', ' ').")";	
												}	
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
					<button type="submit" name="reservar" value="Seleccione una opción" class="btn btn-hotel boton-redondo">
						<span class="icon-ok"></span>
					</button>
					</center>
				</div>
				<div class="col-xs-4">
					<label id="habitaciones" class="pull-right"></label>
				</div>
					
				
				
         	
         	<?php echo form_close(); ?>
         	
        	<?php }else{ ?>
			<h1 class="text-center"><?php echo $texto['no_habitaciones'];?></h1>
			<h3 class="text-center"><?php echo $texto['otras_opciones'];?></h3>
			<div class="col-xs-12">
			<div class="offer offer-hotel">
				<div class="shape">
					<div class="shape-text">
						<span class="icon-star"></span>						
					</div>
				</div>
				<div class="offer-content">
					<?php foreach ($hoteles_menu as $hotel) { ?>
    			<?php if($id_hotel!=$hotel->id_hotel){ ?>
    			<a href="<?php echo base_url().'index.php/inicio/hotel/'.$hotel->id_hotel ?>" style="margin: 15px;">
    				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url;?>" class="logo_img_menu">
    			</a>
    			<?php } ?>
			<?php } ?>
				</div>
			</div>
			</div>
			</div>
			</div>
			
		
			<?php } ?>
			
		</div>
	</div> 

	












<!---------------------------------------------------------------------------------
-----------------------------------------------------------------------------------
					
						Modal habitaciones 

-----------------------------------------------------------------------------------
---------------------------------------------------------------------------------->	

<?php foreach ($habitaciones as $habitacion) { ?>
<div class="modal fade" id="habitacion<?php echo $habitacion->id_habitacion?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel"><?php echo $texto['habitacion']?> : <?php echo $habitacion->habitacion?></h4>
      		</div>
      		<form method="post" class="form-horizontal" role="form" accept-charset="utf-8" action="<?php echo base_url().'index.php/consulta/email_habitacion'?>"/>
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
  					<input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id_habitacion?>">				
  					<input type="hidden" name="habitacion" value="<?php echo $habitacion->habitacion?>">
      			</div>
      			
      			<div class="modal-footer">
      				<input type="hidden" name="id_hotel" value="<?php echo $id_hotel?>" >
        			<button type="button" class="btn btn-hotel boton-redondo-medium" data-dismiss="modal" title="<?php echo $texto['cerrar']?>"><span class="icon-remove"></span></button>
        			<button type="submit" class="btn btn-hotel boton-redondo-medium" title="<?php echo $texto['email']?>"><span class="icon-ok"></span></button>
      			</div>
      		</div>
      		</form>
    	</div>
  	</div>
</div>
<?php } ?>



<script>
	$(document).ready(function(){
		validarHabitacion();
 	});
</script>

