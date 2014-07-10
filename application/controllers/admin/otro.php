<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otro extends CI_Controller {

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
 * 				Alta, baja y modificación de departamentos
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function departamentos_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
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

			$crud->set_theme('datatables');
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

			$crud->set_theme('datatables');
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

			$crud->set_theme('datatables');
			$crud->set_table('monedas');
			
			$crud->columns(	'id_moneda',
							'moneda',
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
}