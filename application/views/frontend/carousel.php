
	<div class="col-md-9">
		<div class="panel panel-default">
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
				<?php } 
				}?>
			</div>
			
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