<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Hotel</title>
		
		<script src="<?php echo base_url().'librerias/jquery.js'?>" type="text/javascript"></script>
		<!--<script src="<?php echo base_url().'librerias/intro/js/carollo.js'?>" type="text/javascript"></script>-->
		<link href="<?php echo base_url().'librerias/bootstrap/js/bootstrap.js'?>" rel="stylesheet" type="text/css"/>
		<script src="<?php echo base_url().'librerias/ui/jquery-ui.js'?>" type="text/javascript"></script>
		
		<link href="<?php echo base_url().'librerias/intro/css/carollo.css'?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url().'librerias/bootstrap/css/bootstrap_front_carollo.css'?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url().'librerias/ui/jquery-ui.css'?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url().'librerias/main/css/main.css'?>" rel="stylesheet" type="text/css"/>
		<script type="text/javascript">
		$(document).ready(function() {
    		setTimeout(function() {
        		$(".content").fadeOut(1500);
    		},500);
		});
		</script>
		<script type="text/javascript">
		$(document).ready(function() {   
    		setTimeout(function() {
        		$(".content2").fadeIn(1500);
    		},500);
		});
		</script>
	</head>
	
	<body>
		<div class="content">
			<img src="<?php echo base_url().'assets/uploads/logos/gold.png'?>" class="center" id="logo"/>
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