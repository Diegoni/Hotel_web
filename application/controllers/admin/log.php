<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('menu');
		$this->load->model('reserva_habitacion_model');
		$this->load->library('grocery_CRUD');
		//$this->load->library('image_CRUD');
		
	}


	public function _example_output($output = null)
	{
		$reservas=buscarReservas();
		$mensajes=buscarMensajes();
		
		$db=array_merge($reservas, $mensajes);
					
		$this->load->view('backend/head.php',$output);
		$this->load->view('backend/menu.php', $db);	
		$this->load->view('backend/modal.php');
		$this->load->view('backend/logs.php');
		$this->load->view('backend/footer.php');
	}
	

	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de artículos
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_articulos_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_articulos');
			
			$crud->columns(	'id_log_articulo',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_articulo','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('artículo');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de habitaciones
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_habitaciones_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_habitaciones');
			
			$crud->columns(	'id_log_habitacion',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_habitacion','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('habitación');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de hoteles
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_hoteles_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_hoteles');
			
			$crud->columns(	'id_log_hotel',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_hotel','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('hotel');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de huespedes
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_huespedes_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_huespedes');
			
			$crud->columns(	'id_log_huesped',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_hueped','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('hotel');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de mensajes
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_mensajes_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_mensajes');
			
			$crud->columns(	'id_log_mensaje',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_mensaje','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('mensaje');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de otros
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_otros_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_otros');
			
			$crud->columns(	'id_log_otro',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_otro','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('otro');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de reservas
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_reservas_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_reservas');
			
			$crud->columns(	'id_log_reserva',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_reserva','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('reserva');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Logs de usuarios
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function logs_usuarios_abm(){
			$crud = new grocery_CRUD();
			
			$crud->set_table('logs_usuarios');
			
			$crud->columns(	'id_log_usuario',
							'tabla',
							'id_tabla',
							'id_accion',
							'fecha', 
							'id_usuario');
			
			$crud->display_as('id_log_usuario','ID')
				 ->display_as('tabla','Tabla')
				 ->display_as('id_tabla','Registro')
				 ->display_as('id_accion','Acción')
				 ->display_as('fecha','Fecha')
				 ->display_as('id_usuario','Usuario');
			
			$crud->set_subject('usuario');
			
			$crud->unset_add();
            $crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			
			$crud->set_relation('id_accion','accion','accion');
			$crud->set_relation('id_usuario','usuarios','usuario');
						
			$output = $crud->render();

			$this->_example_output($output);
	}

}