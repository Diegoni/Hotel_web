	<div class="col-md-9">
		<div class="panel panel-hotel">
			<div class="panel-heading">Habitación</div>
		  	<div class="panel-body">
			<?php foreach ($habitaciones as $habitacion) { ?> 
			<div class="panel">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<?php	$imagenes_habitacion=$this->imagenes_habitacion_model->getImagenes($habitacion->id_habitacion); ?>
					<div class="carousel-inner">
						<?php 
						$i=0;
						foreach ($imagenes_habitacion as $imagenes) { ?>
						<a href="#" class="item <?php if($i==0){echo 'active';}?>" class="thumbnail">
							
								<img alt="slide" src="<?php echo base_url().'assets/uploads/articulos/'.$imagenes->imagen;?>" ">
															
						</a>
						<?php $i=$i+1?>
						<?php } ?>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
			<div class="panel">
				<div class="badger-left badger-hotel" data-badger="Descripción">
				<div class="descripcion"><?php echo $habitacion->descripcion;?></div>
				</div>
				
				<div class="badger-left badger-hotel" data-badger="Servicios">
				<div class="servicios">
					<ul class="list-unstyled">
					<?php foreach ($servicios as $servicio) {
						echo "<li><i class='fa fa-check'></i> ".$servicio->servicio."<br></li>";
					} ?>	
					</ul>
					
				</div>
				</div>
				
				<div class="badger-left badger-hotel" data-badger="Condiciones Comerciales">
					<dl class="dl-horizontal">
					  	<dt><i class='fa fa-user'></i> Adultos: </dt>
					  	<dd><?php echo $habitacion->adultos;?></dd>
					  	<dt><i class='fa fa-child'></i> Menores: </dt>
					  	<dd><?php echo $habitacion->menores;?></dd>
					</dl>
					<dl class="dl-horizontal">
						<dt><i class="fa fa-sign-in"></i> Entrada: </dt>
						<dd><?php echo date("H:i",strtotime($habitacion->entrada));?> Hs</dd>
						<dt><i class="fa fa-sign-out"></i> Salida: </dt>
						<dd><?php echo date("H:i",strtotime($habitacion->salida));?> Hs</dd>
					</dl>	
				</div>
								
				<div class="badger-left badger-hotel" data-badger="Ubicación">
					<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.3745900600725!2d-68.847059!3d-32.88826299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e5e8abae6963f75!2sGran+Carollo!5e0!3m2!1ses!2sar!4v1407167639519"></iframe>
        			
      				<div class="span4">
    					<h2>Como llegar</h2>
    					<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="calle" class="col-sm-2 control-label">Calle</label>
								<div class="col-sm-10">
									<input type="calle" class="form-control" id="calle">
								</div>
							</div>
							<div class="form-group">
								<label for="nro" class="col-sm-2 control-label">Número</label>
								<div class="col-sm-10">
									<input type="nro" class="form-control" id="calle">
								</div>
							</div>
							<div class="form-group">
								<label for="nro" class="col-sm-2 control-label">Provincia</label>
								<div class="col-sm-10">
									<select name="provincia" class="form-control" id="provincia">
										<?php foreach ($provincias as $provincia) { ?>
											<?php if($provincia->id_provincia==12){ ?>
												<option value="<?php echo $provincia->id_provincia; ?>" selected><?php echo $provincia->provincia; ?></option>		
											<?php }else{ ?>
												<option value="<?php echo $provincia->id_provincia; ?>"><?php echo $provincia->provincia; ?></option>
											<?php } ?>
										<?php } ?>										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nro" class="col-sm-2 control-label">Medio</label>
								<div class="col-sm-10">
									<select name="medio" class="form-control" id="medio">
										<option value="0">En coche</option>
										<option value="1">Transporte público</option>
										<option value="2">A pie</option>
										<option value="0">En bicicleta</option>
									</select>
								</div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <a class="btn btn-default">Consultar</a>
							    </div>
							</div>
						</form>
    				</div>
				</div>
				
				<div class="col-md-12">
					<center>
						<a href="javascript:window.history.back();" type="submit" class="btn btn-default btn-xlarge" title="volver" rel="tooltip">
							<span class="icon-chevron-left"></span>
						</a>
					</center>
				</div>
				<!--
				<div class="col-md-6">
					<?php echo form_open('reserva/datos');?>
					<input type="hidden" name="entrada" value="<?php echo $this->input->post('entrada') ?>">
					<input type="hidden" name="salida"  value="<?php echo $this->input->post('salida') ?>">
					<input type="hidden" name="adultos" value="<?php echo $this->input->post('adultos') ?>">
					<input type="hidden" name="menores" value="<?php echo $this->input->post('menores') ?>">
					<input type="hidden" name="habitacion" value="<?php echo $this->input->post('id') ?>">
					<button type="submit" class="btn btn-hotel btn-lg btn-block">Seleccionar</button>	 	
					<?php echo form_close(); ?>      
				</div>
				-->
				
				
			</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>							
