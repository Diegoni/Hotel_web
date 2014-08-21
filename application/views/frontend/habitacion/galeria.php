	<div class="col-md-9">
		<div class="panel panel-hotel">
			<div class="panel-heading">Habitación</div>
		  	<div class="panel-body">
				<div class='list-group'>
					<?php foreach ($habitaciones as $habitacion) {
						$id=$habitacion->id_habitacion;
					}?>
					<?php	$imagenes_habitacion=$this->imagenes_habitacion_model->getImagenes($id); ?>
					<?php	foreach ($imagenes_habitacion as $imagenes) { ?>
		            <div class='col-md-6'>
		                <a class="fancybox" rel="ligthbox" href="<?php echo base_url().'assets/uploads/articulos/'.$imagenes->imagen;?>">
		                    <img class="img-responsive gris" alt="" src="<?php echo base_url().'assets/uploads/articulos/'.$imagenes->imagen;?>" />
		                    <div class='text-right'>
		                        <small class='text-muted'><?php echo $imagenes->descripcion;?></small>
		                    </div>
		                </a>
		            </div> 
		            <?php } ?>
				</div>
			</div>
			<div class="panel-body">
					<center>
						<a href="javascript:window.history.back();" type="submit" class="btn btn-default btn-xlarge" title="volver" rel="tooltip">
							<span class="icon-chevron-left"></span>
						</a>
					</center>
			</div>
		</div>
	</div>							
</div>
