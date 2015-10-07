<?php 
if(!isset($output)){
?>
<script type="text/javascript" src="<?php echo base_url().'librerias/jquery.js'?>"></script>
<link href="<?php echo base_url().'librerias/bootstrap/css/bootstrap_back.css'?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url().'librerias/font/css/font-awesome.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'librerias/font2/css/whhg.css'?>" rel="stylesheet">

<script src="<?php echo base_url().'librerias/bootstrap/js/bootstrap.js'?>"></script>
<!--<script src="<?php echo base_url().'librerias/main/js/main.js'?>"></script>-->
<link href="<?php echo base_url().'librerias/main/css/main.css'?>" rel="stylesheet">

<!--------------------------------------------------------------------
----------------------------------------------------------------------
						Chosen
----------------------------------------------------------------------
--------------------------------------------------------------------->
<link href="<?php echo base_url().'librerias/chosen/chosen.css'?>" rel="stylesheet">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
<script src="<?php echo base_url().'librerias/ui/jquery-ui.js'?>"></script>
<script src="<?php echo base_url().'assets/grocery_crud/texteditor/ckeditor/ckeditor.js'?>"></script>
<script src="<?php echo base_url().'librerias/DataTables/media/js/jquery.dataTables.js'?>"></script>
<link href="<?php echo base_url().'librerias/DataTables/media/css/jquery.dataTables.min.css'?>" rel="stylesheet">
<?php 
}
?>

<div class="container">
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-warning">
  			<div class="panel-heading">
  				<span class="icon-emailalt"></span> Mensajes
  			</div>
  			<div class="panel-body">
    			<ul class="nav nav-pills nav-stacked">
            		<li><a  href='<?php echo site_url('admin/mensaje/mensajes')?>'>Mensajes</a></li>
					<!--<li><a  href='<?php echo site_url('admin/mensaje/tipos_mensaje')?>'>Tipos de mensaje</a></li>-->
					<li><a  href='<?php echo site_url('admin/mensaje/estados_mensaje')?>'>Estados mensaje</a></li>
          		</ul>
  			</div>
		</div>
	</div>

	<div class="col-md-10">
		<div class="panel panel-warning">
  			<div class="panel-heading">
  				<span class="icon-emailalt"></span> Mensajes
  			</div>
  			<div class="panel-body">
  				<?php 
  				if(isset($output)){
  					echo $output;	
  				}else if($mensajes_db){ ?>
  					<table class="table table-hover" cellspacing="0" cellpadding="0" border="0" id="example">
						<thead>
							<tr>
								<th></th>
								<th>ID</th>
								<th>Mensaje</th>
								<th>Email</th>
								<th>Fecha</th>
								<th>Mensaje</th>
								<th>Hotel</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<form method="post">
							<?php
							$mensaje = "'Esta seguro que queres eliminar este registro'";
							
							foreach ($mensajes_db as $row) {
		  						echo "<tr>";	
								echo '<td><input name="delete[]" type="checkbox" value="'.$row->id_mensaje.'"></td>';
		  						echo "<td>".$row->id_mensaje."</td>";
								echo "<td>".$row->titulo."</td>";
								echo "<td>".$row->emisor."</td>";
								echo "<td>".$row->fecha_envio."</td>";
								echo "<td>".$row->estado_mensaje."</td>";
								echo "<td>".$row->hotel."</td>";
								
								
								echo '<td>
										<div style="display: inline-flex;">
										<a href="'.base_url().'index.php/es/admin/mensaje/mensajes/'.$row->id_mensaje.'" title="Eliminar mensaje" onclick="return confirm('.$mensaje.');" class="delete-row btn btn-danger btn-xs" style="margin-right: 4px;">
                    							<span class="icon-circledelete"></span>
                    					  	</a> 
                                          	<a href="'.base_url().'index.php/es/admin/mensaje/mensajes_abm/edit/'.$row->id_mensaje.'" title="Editar mensaje" class="edit_button btn btn-primary btn-xs" style="margin-right: 4px;">
												<span class="icon-edit"></span>
										  	</a> 
											<a href="'.base_url().'index.php/es/admin/mensaje/mensajes_abm/read/'.$row->id_mensaje.'" title="View mensaje" class="edit_button btn btn-info btn-xs">
												<span class="icon-folder-open"></span>
											</a>
										</div>';
								echo "</tr>";
							}
							?>
							<input type="submit" class="btn btn-danger pull-right" onclick="return confirm(<?php echo $mensaje?>)" value="Eliminar"/>
							</form>
						</tbody>	
  					<?php
  				}
  				?>
  			</div>
		</div>
    </div>
</div>    


<script>
$(document).ready(function() {
  	$('#example').DataTable();
} );
</script>