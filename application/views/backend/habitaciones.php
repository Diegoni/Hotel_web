<div class="container">
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-success">
  			<div class="panel-heading">
  				<span class="icon-bed"></span> Habitaciones
  			</div>
  			<div class="panel-body">
    			<ul class="nav nav-pills nav-stacked">
	            	<li><a  href='<?php echo site_url('admin/habitacion/habitaciones_abm')?>'>Habitaciones</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tarifas_abm')?>'>Tarifas</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tarifas_temporales_abm')?>'>Tarifas temporales</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/monedas_abm')?>'>Monedas</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/servicios_abm')?>'>Servicios</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tipos_habitacion')?>'>Tipos de habitación</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tipo_tarifa_abm')?>'>Tipos tarifa</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/estados_habitacion')?>'>Estados habitación</a></li>
          		</ul>
  			</div>
		</div>
	</div>

	<div class="col-md-10">
		<div class="panel panel-success">
  			<div class="panel-heading">
  				<span class="icon-bed"></span> Habitaciones
  			</div>
  			<div class="panel-body">
  				<?php 
  				if($this->uri->segment(4)=='tarifas_temporales_abm'){
  				?>
  					<a href="<?php echo base_url()?>index.php/es/admin/habitacion/tarifas_temporales_formulario/" title="Añadir tarifa temporal" class="add-anchor add_button btn btn-default">
						<div class="fbutton">
							<div>
								<i class="fa fa-plus-square-o"></i> 
								Añadir tarifa temporal				
							</div>
						</div>
            		</a>
  				<?php	
  				}
  				?>
    			<?php echo $output; ?>
  			</div>
		</div>
    </div>
</div>    


