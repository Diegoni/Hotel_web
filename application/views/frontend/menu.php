<div class="container">	
	<div class="row">
	<div class="col-md-4">
		<center>
		<a href="<?php echo base_url().'index.php/inicio/inicio'; ?>">
		<?php foreach ($hoteles as $hotel) { ?>
			<img src="<?php echo base_url().'assets/uploads/logos/'.$hotel->logo_url;?>" alt="">
		<?php } ?>
		</a>
		</center>
	</div>	                
    <div class="col-md-8">
    	<ul class="nav nav-pills pull-right">
  			<li><a href="#">Home</a></li>
  			<li><a href="#">Profile</a></li>
  			<li><a href="#">Messages</a></li>
		</ul>
	</div>
	</div>