<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Hotel</title>
		
		<script src="<?php echo base_url().'librerias/jquery.js'?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'librerias/bootstrap/js/bootstrap.js'?>"></script>
		<script src="<?php echo base_url().'librerias/main/js/intro.js'?>" type="text/javascript"></script>
		
		<!--<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'librerias/intro/css/main.css'?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'librerias/bootstrap/css/bootstrap_front.css'?>" />
		

	</head>
	<body>
		<div class="container">
		<div class="row">

        <div class="col-sm-4 image-col">
			<?php foreach ($hoteles as $hotel) { ?> 
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>" class="imagen-logo"/>
			<?php } ?>
        </div>
        <div class="col-sm-4 image-col">
			<?php foreach ($hoteles as $hotel) { ?> 
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>" class="imagen-logo"/>
			<?php } ?>
        </div>
        <div class="col-sm-4 image-col">
			 
				<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url?>" class="imagen-logo"/>
			
        </div>
    	</div>
		</div><!-- /container -->
	</body>
</html>