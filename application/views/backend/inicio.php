<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"href='<?php echo site_url('admin/inicio')?>'>Administración</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Artículos<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/inicio/articulos_abm')?>'>Artículos</a></li>
				<li><a  href='<?php echo site_url('admin/inicio/categorias_abm')?>'>Categorías</a></li>
          	</ul>
        </li>
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hoteles<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/inicio/hoteles_abm')?>'>Hoteles</a></li>
				<li><a  href='<?php echo site_url('admin/inicio/habitaciones_abm')?>'>Habitaciones</a></li>
				<li><a  href='<?php echo site_url('admin/inicio/tarifas_abm')?>'>Tarifas</a></li>
          	</ul>
        </li>
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Huesped<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/inicio/huespedes_abm')?>'>Huespedes</a></li>
          	</ul>
        </li>
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href='<?php echo site_url('inicio/inicio')?>' target="_blank">Sitio</a> </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



		<?php echo $output; ?>
    </div>
</body>
</html>
