<?php $id_hotel=$_COOKIE['id_hotel']; ?>
	<div class="col-md-8">
		<div class="panel panel-hotel">
			<div class="panel-heading" style="padding: 14px 10px;">
				<a class="panel-menu" href="<?php echo base_url().'index.php/hoteles/habitaciones/'.$id_hotel; ?>">
					<?php echo $texto['habitaciones'] ?>
				</a>
				<?php 
				$i=0;
				if(!empty($categorias)){
				foreach ($categorias as $categoria) { 
					if($i<3){?>
					<a class="panel-menu" href="<?php echo base_url().'index.php/categoria/articulos/'.$categoria->id_categoria.'/'.$id_hotel; ?>">
						<?php echo $categoria->categoria ?>
					</a>	
				<?php 
					}
				$i=$i+1;
				}} ?>
				<a class="panel-menu" href="<?php echo base_url().'index.php/hoteles/galeria/'.$id_hotel; ?>">
					<?php echo $texto['galeria'] ?>
				</a>
				<a class="panel-menu" href="<?php echo base_url().'index.php/hoteles/como_llegar/'.$id_hotel; ?>">
					<?php echo $texto['como_llegar'] ?>
				</a>
			</div>
	  	<div class="panel-body">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
			<!-- indicadores del carrusel -->
			<ol class="carousel-indicators">
				<?php 
				$i=0;
				if($imagenes_carrusel){
				foreach ($imagenes_carrusel as $imagenes) { ?>
				<li data-target="#carousel-example-generic" data-slide-to="<?php echo $imagenes->orden-1;?>" class="<?php if($i==0){echo 'active';}?>"></li>
				<?php $i=$i+1?>
				<?php } ?>
			</ol>
			
			<!-- imagenes del carrusel -->
			<div class="carousel-inner">
				<?php 
				$i=0;
				foreach ($imagenes_carrusel as $imagenes) { ?>
				<div class="item <?php if($i==0){echo 'active';}?>">
          			<img alt="slide" src="<?php echo base_url().'assets/uploads/carrusel/'.$imagenes->imagen;?>">
					<div class="carousel-caption">
						<p><?php echo $imagenes->descripcion;?></p>
					</div>
        		</div>
        		<?php $i=$i+1?>
				<?php } ?>
			</div>
			<?php } ?>
			<!-- direcciones del carrusel -->
      		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        		<span class="glyphicon glyphicon-chevron-left"></span>
      		</a>
      		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        		<span class="glyphicon glyphicon-chevron-right"></span>
      		</a>
      		
    	</div>
    	</div>
    	</div>
	</div>
</div>	