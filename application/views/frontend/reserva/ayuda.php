
<div class="row">
	<div class="col-md-3">
		<?php foreach ($ayudas as $ayuda) { ?>
		<div class="panel panel-default">
	  		<div class="panel-heading"><?php echo $ayuda->titulo; ?></div>
	  		<div class="panel-body"> 			
				<?php echo $ayuda->ayuda; ?>
			</div>
		</div>
		<?php } ?>
	</div>
	