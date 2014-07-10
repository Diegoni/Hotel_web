<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Huesped extends CI_Controller {

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
 * 				Alta, baja y modificación de huesped
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function huespedes_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('huespedes');
			
			$crud->columns(	'id_huesped',
							'nombre',
							'apellido');
			
			$crud->display_as('id_huesped','ID')
				 ->display_as('nombre','Nombre')
				 ->display_as('apellido','Apellido')
				 ->display_as('dni','D.N.I.')
				 ->display_as('fecha_alta','Fecha Alta')
				 ->display_as('pass','Password')
				 ->display_as('id_estado_huesped','Estado');
			
			$crud->set_subject('huesped');
			
			$crud->set_relation('id_estado_huesped','estados_huesped','estado_huesped');
			
			$crud->add_fields('nombre','apellido','dni');
			
			$crud->required_fields(	'nombre',
									'apellido', 
									'dni');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de teléfonos
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function telefonos_huesped(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('telefonos_huesped');
			
			$crud->columns(	'id_huesped',
							'telefono',
							'id_tipo');
			
			$crud->display_as('id_huesped','Huésped')
				 ->display_as('telefono','Teléfono')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('teléfono');
			
			$crud->set_relation('id_huesped','huespedes','{apellido} {nombre}');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_huesped',
									'telefono');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Emails
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function emails_huesped(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('emails_huesped');
			
			$crud->columns(	'id_huesped',
							'email',
							'id_tipo');
			
			$crud->display_as('id_huesped','Huésped')
				 ->display_as('email','Email')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('email');
			
			$crud->set_relation('id_huesped','huespedes','{apellido} {nombre}');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_huesped',
									'email');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Direcciones
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function direcciones_huesped(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('direcciones_huesped');
			
			$crud->columns(	'id_huesped',
							'calle',
							'nro',
							'id_departamento',
							'id_provincia');
			
			$crud->display_as('id_huesped','Huésped')
				 ->display_as('id_departamento','Dep.')
				 ->display_as('id_provincia','Prov.')
				 ->display_as('id_pais','País')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('dirección');
			
			$crud->set_relation('id_huesped','huespedes','{apellido} {nombre}');
			$crud->set_relation('id_departamento','departamentos','departamento');
			$crud->set_relation('id_provincia','provincias','provincia');
			$crud->set_relation('id_pais','paises','pais');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_huesped',
									'calle',
									'nro',
									'id_provincia');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
		

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de tarjetas
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tarjetas_huesped(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tarjetas');
			
			$crud->columns(	'id_huesped',
							'tarjeta',
							'id_tipo_tarjeta');
			
			$crud->display_as('id_huesped','Huésped')
				 ->display_as('id_tipo_tarjeta','Tipo');
			
			$crud->set_subject('tarjeta');
			
			$crud->set_relation('id_huesped','huespedes','{apellido} {nombre}');
			$crud->set_relation('id_tipo_tarjeta','tipos_tarjeta','tipo_tarjeta');
						
			$crud->required_fields(	'id_huesped',
									'tarjeta',
									'id_tipo_tarjeta');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Tipos de tarjeta
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tipos_tarjeta(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tipos_tarjeta');
			
			$crud->columns(	'id_tipo_tarjeta',
							'tipo_tarjeta');
			
			$crud->display_as('id_tipos_tarjeta','ID')
				 ->display_as('tipos_tarjeta','Tipo');
			
			$crud->set_subject('tipo');
			
						
			$crud->required_fields('tipo_tarjeta');
			
			$output = $crud->render();

			$this->_example_output($output);
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Estados Huesped
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_huesped(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('estados_huesped');
			
			$crud->columns(	'id_estado_huesped',
							'estado_huesped');
			
			$crud->display_as('id_estados_huesped','ID')
				 ->display_as('estado_huesped','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			//$crud->unset_add();
			
						
			$crud->required_fields('estado_huesped');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
		


}