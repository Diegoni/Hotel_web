<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
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
		$this->load->view('backend/otros.php');
		$this->load->view('backend/footer.php');
	}
	
	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de departamentos
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function departamentos_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('departamentos');
			
			$crud->columns(	'id_departamento',
							'departamento',
							'id_provincia');
			
			$crud->display_as('id_departamento','ID')
				 ->display_as('departamento','Departamento')
				 ->display_as('id_provincia','Provincia');
			
			$crud->set_subject('departamento');
			
			$crud->set_relation('id_provincia','provincias','provincia');
			
			$crud->required_fields(	'id_departamento',
									'departamento', 
									'id_provincia');
			
			$output = $crud->render();

			$this->_example_output($output);
	}



/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de provincias
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function provincias_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('provincias');
			
			$crud->columns(	'id_provincia',
							'provincia',
							'id_pais');
			
			$crud->display_as('id_provincia','ID')
				 ->display_as('provincia','Provincia')
				 ->display_as('id_pais','País');
			
			$crud->set_subject('provincia');
			
			$crud->set_relation('id_pais','paises','pais');
			
			$crud->required_fields(	'id_provincia',
									'provincia', 
									'id_pais');
			
			$output = $crud->render();

			$this->_example_output($output);
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de paises
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function paises_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('paises');
			
			$crud->columns(	'id_pais',
							'pais');
			
			$crud->display_as('id_pais','ID')
				 ->display_as('pais','País');
			
			$crud->set_subject('país');
			
			
			$crud->required_fields(	'pais');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de monedas
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function monedas_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('monedas');
			
			$crud->columns(	'id_moneda',
							'moneda',
							'valor',
							'id_pais');
			
			$crud->display_as('id_moneda','ID')
				 ->display_as('moneda','Moneda')
				 ->display_as('id_pais','País');
			
			$crud->set_subject('moneda');
			
			$crud->set_relation('id_pais','paises','pais');
			
			
			$crud->required_fields(	'moneda');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de tipos 
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tipos_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('tipos');
			
			$crud->columns(	'id_tipo',
							'tipo');
			
			$crud->display_as('id_tipo','ID')
				 ->display_as('tipo','Tipo');
			
			$crud->set_subject('tipo');
							
			$crud->required_fields(	'tipo');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de ubicación
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function ubicacion_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('ubicacion');
			
			$crud->columns(	'id_ubicacion',
							'ubicacion');
			
			$crud->display_as('id_ubicacion','ID')
				 ->display_as('ubicacion','Ubicación');
			
			$crud->set_subject('ubicación');
						
			$crud->required_fields('ubicacion');
			
			$output = $crud->render();

			$this->_example_output($output);
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de términos
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function terminos_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('terminos');
			
			$crud->columns(	'id_termino',
							'termino');
			
			$crud->display_as('id_termino','ID')
				 ->display_as('termino','Término');
			
			$crud->set_subject('término');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();
						
			$crud->required_fields(	'termino');
			
			$output = $crud->render();

			$this->_example_output($output);
	}

	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de ubicación
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function ayudas_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('ayudas');
			
			$crud->columns(	'id_ayuda',
							'titulo',
							'ayuda');
			
			$crud->display_as('id_ayuda','ID')
				 ->display_as('titulo','Título')
				 ->display_as('ayuda','Ayuda');
			
			$crud->edit_fields('titulo', 'ayuda');
			
			$crud->set_subject('ayuda');
						
			$crud->required_fields('titulo', 'ayuda');
			
			$crud->unset_delete();
			$crud->unset_add();
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
}