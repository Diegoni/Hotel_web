<div class="container">
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-danger">
  			<div class="panel-heading">
  				<span class="icon-clipboard-paste"></span> Otros
  			</div>
  			<div class="panel-body">
    			<ul class="nav nav-pills nav-stacked">
	            	<li><a  href='<?php echo site_url('admin/otro/departamentos_abm')?>'>Departamentos</a></li>
	            	<li><a  href='<?php echo site_url('admin/otro/provincias_abm')?>'>Provincias</a></li>
	            	<li><a  href='<?php echo site_url('admin/otro/paises_abm')?>'>Países</a></li>
	            	<li><a  href='<?php echo site_url('admin/otro/monedas_abm')?>'>Monedas</a></li>
					<li><a  href='<?php echo site_url('admin/otro/tipos_abm')?>'>Tipos</a></li>
					<li><a  href='<?php echo site_url('admin/otro/ubicacion_abm')?>'>Ubicaciones de la página</a></li>
					<li><a  href='<?php echo site_url('admin/otro/ayudas_abm')?>'>Ayudas de la página</a></li>
          		</ul>
  			</div>
		</div>
	</div>

	<div class="col-md-10">
		<div class="panel panel-danger">
  			<div class="panel-heading">
  				<span class="icon-clipboard-paste"></span> Otros
  			</div>
  			<div class="panel-body">
    			<?php echo $output; ?>
  			</div>
		</div>
    </div>
</div>    


