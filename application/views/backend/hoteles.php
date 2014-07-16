<div class="container">
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-success">
  			<div class="panel-heading">
  				<i class="fa fa-university"></i> Hoteles
  			</div>
  			<div class="panel-body">
    			<ul class="nav nav-pills nav-stacked">
	            	<li><a  href='<?php echo site_url('admin/hotel/hoteles_abm')?>'>Hoteles</a></li>
					<li><a  href='<?php echo site_url('admin/hotel/telefonos_hotel')?>'>Teléfonos</a></li>
	            	<li><a  href='<?php echo site_url('admin/hotel/emails_hotel')?>'>Emails</a></li>
	            	<li><a  href='<?php echo site_url('admin/hotel/direcciones_hotel')?>'>Direcciones</a></li>
	            	<li><a  href='<?php echo site_url('admin/hotel/config')?>'>Configuración</a></li>
	            	<li><a  href='<?php echo site_url('admin/hotel/detalle_config')?>'>Configuración avanzada</a></li>
            	</ul>
  			</div>
		</div>
	</div>

	<div class="col-md-10">
		<div class="panel panel-success">
  			<div class="panel-heading">
  				<i class="fa fa-university"></i> Hoteles
  			</div>
  			<div class="panel-body">
    			<?php echo $output; ?>
  			</div>
		</div>
    </div>
</div>    


