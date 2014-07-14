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
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a title="Administración" class="navbar-brand"href='<?php echo site_url('admin/inicio')?>'>Admin.</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-tagalt-pricealt"></span> Reservas<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/inicio/reservas')?>'>Reservas</a></li>
				<li><a  href='<?php echo site_url('admin/inicio/estados_reserva')?>'>Estados reserva</a></li>
          	</ul>
        </li>
        
        
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Huéspedes<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/huesped/huespedes_abm')?>'>Huéspedes</a></li>
            	<li><a  href='<?php echo site_url('admin/huesped/telefonos_huesped')?>'>Teléfonos</a></li>
            	<li><a  href='<?php echo site_url('admin/huesped/emails_huesped')?>'>Emails</a></li>
            	<li><a  href='<?php echo site_url('admin/huesped/direcciones_huesped')?>'>Direcciones</a></li>
            	<li><a  href='<?php echo site_url('admin/huesped/tarjetas_huesped')?>'>Tarjetas</a></li>
            	<li><a  href='<?php echo site_url('admin/huesped/tipos_tarjeta')?>'>Tipos de tarjeta</a></li>
            	<li><a  href='<?php echo site_url('admin/huesped/estados_huesped')?>'>Estados huésped</a></li>
          	</ul>
        </li>
        
        
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-bed"></span> Habitaciones<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/habitacion/habitaciones_abm')?>'>Habitaciones</a></li>
				<li><a  href='<?php echo site_url('admin/habitacion/tipos_habitacion')?>'>Tipos de habitación</a></li>
				<li><a  href='<?php echo site_url('admin/habitacion/tarifas_abm')?>'>Tarifas</a></li>
				<li><a  href='<?php echo site_url('admin/habitacion/estados_habitacion')?>'>Estados habitación</a></li>
          	</ul>
        </li>
		
		
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-university"></i> Hoteles<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/hotel/hoteles_abm')?>'>Hoteles</a></li>
				<li><a  href='<?php echo site_url('admin/hotel/telefonos_hotel')?>'>Teléfonos</a></li>
            	<li><a  href='<?php echo site_url('admin/hotel/emails_hotel')?>'>Emails</a></li>
            	<li><a  href='<?php echo site_url('admin/hotel/direcciones_hotel')?>'>Direcciones</a></li>
				<li class="divider"></li>
            	<li><a  href='<?php echo site_url('admin/hotel/config')?>'>Configuración</a></li>
            	<li><a  href='<?php echo site_url('admin/hotel/detalle_config')?>'>Configuración avanzada</a></li>
            </ul>
        </li>
        
        
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-emailalt"></span> Mensajes<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/mensaje/mensajes_abm')?>'>Mensajes</a></li>
				<li><a  href='<?php echo site_url('admin/mensaje/tipos_mensaje')?>'>Tipos de mensaje</a></li>
				<li><a  href='<?php echo site_url('admin/mensaje/estados_mensaje')?>'>Estados mensaje</a></li>
          	</ul>
        </li>
        
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text-o"></i> Artículos<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/articulo/articulos_abm')?>'>Artículos</a></li>
				<li><a  href='<?php echo site_url('admin/articulo/estados_articulo')?>'>Estados artículo</a></li>
				<li class="divider"></li>
				<li><a  href='<?php echo site_url('admin/articulo/categorias_abm')?>'>Categorías</a></li>
				
          	</ul>
        </li>
        
        
        
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-burstmode"></span> Galerías<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/galeria/galeria_abm')?>'>Galerías</a></li>
				<li><a  href='<?php echo site_url('galeria/imagenes_galeria')?>'>Imágenes galería</a></li>
				<li class="divider"></li>
				<li><a  href='<?php echo site_url('galeria/imagenes_carrusel')?>'>Imágenes carrusel</a></li>
          	</ul>
        </li>
        
        
        
        <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-workshirt"></span> Usuarios<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a href='<?php echo site_url('admin/usuario/usuarios_abm')?>'>Usuarios</a></li>
            	<li><a href='<?php echo site_url('admin/usuario/telefonos_usuario')?>'>Teléfonos</a></li>
            	<li><a href='<?php echo site_url('admin/usuario/emails_usuario')?>'>Emails</a></li>
            	<li><a href='<?php echo site_url('admin/usuario/direcciones_usuario')?>'>Direcciones</a></li>
            	<li><a href='<?php echo site_url('admin/usuario/estados_usuario')?>'>Estados usuario</a></li>
            	<li class="divider"></li>
				<li><a href='<?php echo site_url('admin/usuario/accesos_abm')?>'>Accesos</a></li>
				<li><a href='<?php echo site_url('admin/usuario/detalle_accesos')?>'>Detalle accesos</a></li>
          	</ul>
        </li>
        
        
        
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-clipboard-paste"></span> Otros<b class="caret"></b></a>
			<ul class="dropdown-menu">
            	<li><a  href='<?php echo site_url('admin/otro/departamentos_abm')?>'>Departamentos</a></li>
            	<li><a  href='<?php echo site_url('admin/otro/provincias_abm')?>'>Provincias</a></li>
            	<li><a  href='<?php echo site_url('admin/otro/paises_abm')?>'>Países</a></li>
            	<li class="divider"></li>
            	<li><a  href='<?php echo site_url('admin/otro/monedas_abm')?>'>Monedas</a></li>
				<li class="divider"></li>
				<li><a  href='<?php echo site_url('admin/otro/tipos_abm')?>'>Tipos</a></li>
				<li class="divider"></li>
				<li><a  href='<?php echo site_url('admin/otro/ubicacion_abm')?>'>Ubicaciones de la página</a></li>
          	</ul>
        </li>
        
       
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href='<?php echo site_url('inicio/inicio')?>' target="_blank">Sitio</a> </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
