<div class="container">
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-default">
  			<div class="panel-heading">
  				<span class="icon-burstmode"></span> Galerías
  			</div>
  			<div class="panel-body">
    			<ul class="nav nav-pills nav-stacked">
           			<li><a  href='<?php echo site_url('admin/galeria/galeria_abm')?>'>Galerías</a></li>
					<li><a  href='<?php echo site_url('galeria/imagenes_galeria')?>'>Imágenes galería</a></li>
					<li><a  href='<?php echo site_url('galeria/imagenes_carrusel')?>'>Imágenes carrusel</a></li>
				</ul>
  			</div>
		</div>
	</div>

	<div class="col-md-10">
		<div class="panel panel-default">
  			<div class="panel-heading">
  				<span class="icon-burstmode"></span> Galerías
  			</div>
  			<div class="panel-body">
    			<?php echo $output; ?>
  			</div>
		</div>
    </div>
</div>    

