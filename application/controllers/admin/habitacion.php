<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habitacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		//$this->load->library('image_CRUD');
	}

	public function _example_output($output = null)
	{
			$this->load->view('backend/head.php',$output);	
			$this->load->view('backend/inicio.php',$output);
	}
	
	public function _example_output2($output = null)
	{
			$this->load->view('backend/head.php',$output);
			$this->load->view('backend/inicio.php',$output);
			$this->load->view('backend/bienvenida.php',$output);
	}

	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de habitaciones
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function habitaciones_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('habitaciones');
			
			$crud->columns(	'id_habitacion',
							'habitacion',
							'id_hotel');
			
			$crud->display_as('id_habitacion','ID')
				 ->display_as('habitacion','Habitación')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_tipo_habitacion','Tipo')
				 ->display_as('id_tarifa','Tarifa')
				 ->display_as('id_estado_habitacion','Estado');
			
			$crud->set_subject('habitación');
			
			$crud->set_relation('id_tipo_habitacion','tipos_habitacion','tipo_habitacion');
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tarifa','tarifas','tarifa');
			$crud->set_relation('id_estado_habitacion','estados_habitacion','estado_habitacion');
					
			$crud->required_fields(	'habitacion',
									'adultos', 
									'menores',
									'id_tipo_habitacion',
									'id_hotel',
									'id_tarifa');

			
			$output = $crud->render();

			$this->_example_output($output);
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de tipos de habitacion
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tipos_habitacion(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tipos_habitacion');
			
			$crud->columns(	'id_tipo_habitacion',
							'tipo_habitacion');
			
			$crud->display_as('id_tipo_habitacion','ID')
				 ->display_as('tipo_habitacion','Tipo habitación');
			
			$crud->set_subject('tipo habitación');
							
			$crud->required_fields(	'tipo_habitacion');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de tarifas
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tarifas_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tarifas');
			
			$crud->columns(	'id_tarifa',
							'tarifa',
							'precio',
							'id_moneda');
			
			$crud->display_as('id_tarifa','ID')
				 ->display_as('tarifa','Tarifa')
				 ->display_as('precio','Precio')
				 ->display_as('id_moneda','Moneda');
			
			$crud->set_subject('tarifa');
			
			$crud->set_relation('id_moneda','monedas','moneda');
								
			$crud->required_fields(	'tarifa',
									'adultos', 
									'menores',
									'precio',
									'id_moneda');

			$output = $crud->render();

			$this->_example_output($output);
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Estados Habitación
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_habitacion(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('estados_habitacion');
			
			$crud->columns(	'id_estado_habitacion',
							'estado_habitacion');
			
			$crud->display_as('id_estados_habitacion','ID')
				 ->display_as('estado_habitacion','Estado');
			
			$crud->set_subject('estado');
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_add();
			
						
			$crud->required_fields('estado_habitacion');
			
			$output = $crud->render();

			$this->_example_output($output);
	}


}