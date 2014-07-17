<?php 
if($cantidad_categorias==3 || $cantidad_categorias==2 || $cantidad_categorias==1){ 
	echo "<div class='row'>";
	 	foreach ($articulos as $articulo) { ?>
			<div class="col-md-<?php echo 12/$cantidad_categorias?>">
				<div class="panel panel-default">
			  		<div class="panel-heading"><?php echo $articulo->categoria;?></div>
			  		<div class="panel-body">
			  			<?php if($articulo->archivo_url!=""){?>
			    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
			    		<?php } ?>
			    		<div class="text-banner">
			    			<?php echo $articulo->articulo; ?>
			    		</div>
					</div>
				</div>
			</div>			
	<?php }//cierra el foreach 
	echo "</div>";
}else if($cantidad_categorias==4 || $cantidad_categorias==6){  
	$i=0;
	foreach ($articulos as $articulo) { 
		if($i==0 || $cantidad_categorias*0.5==$i){
			echo "<div class='row'>";
		} ?>		
			<div class="col-md-<?php echo 24/$cantidad_categorias?>">
				<div class="panel panel-default">
			  		<div class="panel-heading"><?php echo $articulo->categoria;?></div>
			  		<div class="panel-body">
			  			<?php if($articulo->archivo_url!=""){?>
			    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
			    		<?php } ?>
			    		<div class="text-banner">
			    			<?php echo $articulo->articulo; ?>
			    		</div>
					</div>
				</div>
			</div>			
	<?php
		if(($cantidad_categorias*0.5)-1==$i || $cantidad_categorias-1==$i){
			echo "</div>";
		} 
	$i=$i+1;
	}//cierra el foreach 
} 
?>


	