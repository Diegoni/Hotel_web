<?php 
function step($step, $id){
			if($step==$id) {
				$cadena='active';
			}else if($step>$id){
				$cadena='complete';
			}else{
				$cadena='disabled';
			}
	
	return $cadena;
} ?>
<div class="col-md-9">
	<div class="panel panel-default">
	<div class="row bs-wizard" style="border-bottom:0;">
	<div class="col-xs-3 bs-wizard-step <?php echo step($step, 1);?>">
		<div class="text-center bs-wizard-stepnum">Fecha</div>
		<div class="progress">
			<div class="progress-bar"></div>
		</div>
		<a href="#" class="bs-wizard-dot"></a>
	</div>
                
	<div class="col-xs-3 bs-wizard-step <?php echo step($step, 2);?>">
		<div class="text-center bs-wizard-stepnum">Habitación</div>
		<div class="progress">
			<div class="progress-bar"></div>
		</div>
		<a href="#" class="bs-wizard-dot"></a>
	</div>
                
	<div class="col-xs-3 bs-wizard-step <?php echo step($step, 3);?>">
		<div class="text-center bs-wizard-stepnum">Datos personales</div>
		<div class="progress">
			<div class="progress-bar"></div>
		</div>
		<a href="#" class="bs-wizard-dot"></a>
	</div>
                
	<div class="col-xs-3 bs-wizard-step <?php echo step($step, 4);?>">
		<div class="text-center bs-wizard-stepnum">Confirmación</div>
		<div class="progress">
			<div class="progress-bar"></div>
		</div>
		<a href="#" class="bs-wizard-dot"></a>
	</div>
</div>	
</div>
</div>