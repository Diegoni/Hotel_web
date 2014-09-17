<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Hotel</title>
		
		<script src="<?php echo base_url().'librerias/jquery.js'?>" type="text/javascript"></script>
		<!--<script src="<?php echo base_url().'librerias/intro/js/carollo.js'?>" type="text/javascript"></script>-->
		<link href="<?php echo base_url().'librerias/bootstrap/js/bootstrap.js'?>" rel="stylesheet" type="text/css"/>
		<script src="<?php echo base_url().'librerias/ui/jquery-ui.js'?>" type="text/javascript"></script>
			
		<link href="<?php echo base_url().'librerias/bootstrap/css/bootstrap_front_carollo.css'?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url().'librerias/ui/jquery-ui.css'?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url().'librerias/main/css/main.css'?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url().'librerias/intro/css/carollo.css'?>" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url().'librerias/intro/css/style.css'?>" />
		<script type="text/javascript">
		$(document).ready(function() {
    		setTimeout(function() {
        		$(".content").fadeOut(1500);
    		},500);
		});
		
		$(document).ready(function() {   
    		setTimeout(function() {
        		$(".content2").fadeIn(1500);
    		},500);
		});
		
		$(document).ready(function(){
			$('.container').fadeIn( 1000 );
		});
		
		$(document).ready(function() {   
			if (document.body){
				var ancho = (document.body.clientWidth);
			}else{
				var ancho = (window.innerWidth);
			}
			if(ancho<1000){
				$(".provincias").hide();
			}
		});
		</script>
		<script src="<?php echo base_url().'librerias/sparkles/dist/jquery-canvas-sparkles.js' ?>"></script>
		
	<script>
	$(document).ready(function() {
		$(".container").sparkle({
			color: ["#2eafea","#e56604"],
			count: 30,
			overlap: 0,
			speed: 1,
			minSize: 4,
			maxSize: 7,
			direction: "both"
		});
	});
	
	$('#demo3').shiningImage({
		direction : 'y',
		color : '#75FFA5',
		opacity : 0.25,
		playOnLoad: false,
		scale : 0.7,
		speed : 100,
		delay : 3000
	});
	</script>
	</head>
	
	<body onload="$('#demo3').data('shiningImage').shine();" 
		  onload="$('#demo3').data('shiningImage').stopshine();"">
	 	<div class="content">
			<img src="<?php echo base_url().'assets/uploads/logos/gold.png'?>" class="center" id="logo" />
		</div>
		
	<div class="content2" style="display:none;">
	<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 tabla">
			<?php 
			$mendoza=array();
			foreach ($hoteles as $hotel) {
				if($hotel->id_provincia==12 && count($mendoza)==0){
					$mendoza[]=$hotel->id_hotel; 
			?>
			<a href="<?php echo base_url().'index.php/inicio/hotel/'.$hotel->id_hotel ?>">
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>"	class="logo-hotel"/>
			</a>
			<?php 
				}
			} 
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 tabla">
			<?php 
			foreach ($hoteles as $hotel) {
				if($hotel->id_provincia==18){ 
			?>
			<a href="<?php echo base_url().'index.php/inicio/hotel/'.$hotel->id_hotel ?>">
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>"	class="logo-hotel"/>
			</a>
			<?php 
				}
			} 
			?>
		</div>
		<div class="col-md-4 tabla">
			<?php 
			foreach ($hoteles as $hotel) {
				if($hotel->id_provincia==12 && count($mendoza)==1 && !in_array($hotel->id_hotel, $mendoza)){
					$mendoza[]=$hotel->id_hotel; 
			?>
			<a href="<?php echo base_url().'index.php/inicio/hotel/'.$hotel->id_hotel ?>">
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>"	class="logo-hotel"/>
			</a>
			<?php 
				}
			} 
			?>
		</div>
		<div class="col-md-4 tabla">
			<?php 
			foreach ($hoteles as $hotel) {
				if($hotel->id_provincia==17){ 
			?>
			<a href="<?php echo base_url().'index.php/inicio/hotel/'.$hotel->id_hotel ?>">
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>"	class="logo-hotel"/>
			</a>
			<?php 
				}
			} 
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 tabla">
			<?php 
			foreach ($hoteles as $hotel) {
				if($hotel->id_provincia==12 && count($mendoza)==2 && !in_array($hotel->id_hotel, $mendoza)){
					$mendoza[]=$hotel->id_hotel; 
			?>
			<a href="<?php echo base_url().'index.php/inicio/hotel/'.$hotel->id_hotel ?>"  class="medalla">
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>"	class="logo-hotel"/>
			</a>
			<?php 
				}
			} 
			?>
		</div>
	</div>	
	<div class="row provincias">
		<div class="col-md-4 tabla">
			<p class="provincia">San Luis</p>
		</div>
		<div class="col-md-4 tabla">
			<p class="provincia">Mendoza</p>
		</div>
		<div class="col-md-4 tabla">
			<p class="provincia">San Juan</p>
		</div>
	</div>
	</div>
	</div>
	</body>
</html>