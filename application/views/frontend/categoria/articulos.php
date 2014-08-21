
	<div class='col-md-9'>
				<div class="panel panel-hotel">
					<?php
			  		foreach ($categorias as $categoria) { ?>
			  		<div class="panel-heading"><?php echo $categoria->categoria;?></div>
			  		<?php } ?>
			  		<?php
			  		foreach ($articulos as $articulo) { ?>
			  		<div class="panel-body">
			  			<div class="badger-left badger-hotel" data-badger="<?php echo $articulo->titulo ?>">
							<div class="descripcion">
								<blockquote>
								  <?php
					  			if($articulo->archivo_url!=""){?>
					    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
					    		<?php } ?>
					    		<div class="text-banner">
					    			<?php echo $articulo->articulo; ?>
					    		</div>
								</blockquote>
							</div>
						</div>
						<small>Fecha publicación : <?php echo date("d-m-Y" ,strtotime($articulo->fecha_publicacion));?></small>						
					</div>
					
					<?php } ?>
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



	