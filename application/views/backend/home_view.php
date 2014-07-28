<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="aparecer">
   			<h2 class="bs-docs-featurette-title">Bienvenido  <?php echo $usuario; ?>!</h2>
   			<p class="lead">Sistema de gestión de hoteles</p>
   		</div>
   	</div>
</div>
<div class="row">
        <div class="col-md-6">
            <div class="blockquote-box blockquote-primary clearfix">
                <div class="square pull-left">
                	<a  href='<?php echo site_url('admin/reserva/reservas_abm')?>'>
                    <span class="icon-tagalt-pricealt icon-lg"></span>
                   	</a>
                </div>
                <h4>
                    Reservas</h4>
                <p>
                    Descripción de reservas
                </p>
            </div>
           	<div class="blockquote-box blockquote-info clearfix">
                <div class="square pull-left">
                	<a  href='<?php echo site_url('admin/huesped/huespedes_abm')?>'>
                    <i class="icon-user icon-lg"></i>
                   	</a>
                </div>
                <h4>
                    Huéspedes</h4>
                <p>
                    Descripción de huéspedes
                </p>
            </div>
            <div class="blockquote-box blockquote-success clearfix">
                <div class="square pull-left">
                	<a  href='<?php echo site_url('admin/habitacion/habitaciones_abm')?>'>
                    <span class="icon-bed icon-lg"></span>
                   	</a>
                </div>
                <h4>
                    Habitaciones</h4>
                <p>
                    Descripción de habitaciones
                </p>
            </div>
        </div>
        <div class="col-md-6">
           <div class="blockquote-box blockquote-success clearfix">
                <div class="square pull-left">
                	<a  href='<?php echo site_url('admin/hotel/hoteles_abm')?>'>
                    <i class="icon-office-building icon-lg"></i>
                   	</a>
                </div>
                <h4>
                    Hoteles</h4>
                <p>
                    Descripción de hoteles
                </p>
            </div>
            <div class="blockquote-box blockquote-warning clearfix">
                <div class="square pull-left">
                	<a  href='<?php echo site_url('admin/mensaje/mensajes_abm')?>'>
                    <span class="icon-emailalt icon-lg"></span>
                   	</a>
                </div>
                <h4>
                    Mensajes</h4>
                <p>
                    Descripción de mensajes
                </p>
            </div>
            <div class="blockquote-box blockquote-default clearfix">
                <div class="square pull-left">
                	<a  href='<?php echo site_url('admin/articulo/articulos_abm')?>'>
                    <i class="icon-document icon-lg"></i>
                   	</a>
                </div>
                <h4>
                    Artículos</h4>
                <p>
                    Descripción de artículos
                </p>
            </div>
        </div>
    </div>
</div>
   
</body>
</html>