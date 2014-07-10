<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

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
 * 				Alta, baja y modificación de hoteles
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function hoteles_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('hoteles');
			
			$crud->columns(	'id_hotel',
							'hotel',
							'descripcion',
							'url');
			
			$crud->display_as('id_hotel','ID')
				 ->display_as('hotel','Hotel')
				 ->display_as('descripcion','Descripción')
				 ->display_as('url','Sitio');
			
			$crud->set_subject('hotel');
			
			$crud->required_fields('hotel','descripcion', 'url');
			
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
 
 
	public function telefonos_hotel(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('telefonos_hotel');
			
			$crud->columns(	'id_hotel',
							'telefono',
							'id_tipo');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('telefono','Teléfono')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('teléfonos');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_hotel',
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
 
 
	public function emails_hotel(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('emails_hotel');
			
			$crud->columns(	'id_hotel',
							'email',
							'id_tipo');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('email','Email')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('email');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_hotel',
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
 
 
	public function direcciones_hotel(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('direcciones_hotel');
			
			$crud->columns(	'id_hotel',
							'calle',
							'nro',
							'id_departamento',
							'id_provincia');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('id_departamento','Dep.')
				 ->display_as('id_provincia','Prov.')
				 ->display_as('id_pais','País');
			
			$crud->set_subject('dirección');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_departamento','departamentos','departamento');
			$crud->set_relation('id_provincia','provincias','provincia');
			$crud->set_relation('id_pais','paises','pais');
			
			$crud->required_fields(	'id_hotel',
									'calle',
									'nro',
									'id_provincia');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
	

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Config
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function config(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('config');
			
			$crud->columns(	'id_hotel',
							'css',
							'mostrar_tarifa');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('css','Estilo')
				 ->display_as('mostrar_tarifa','Tarifas');
			
			$crud->set_subject('config');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			
			$crud->required_fields(	'id_hotel',
									'css',
									'mostrar_tarifa');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
		

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Detalle
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function detalle_config(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('detalles_config');
			
			$crud->columns(	'id_config',
							'id_categoria',
							'usar');
			
			$crud->display_as('id_config','Config')
				 ->display_as('id_categoria','Categoria')
				 ->display_as('usar','Usar');
			
			$crud->set_subject('detalle');
			
			$crud->set_relation('id_config','config','id_config');
			$crud->set_relation('id_categoria','categorias','categoria');
			
			$crud->required_fields(	'id_config',
									'id_categoria',
									'usar');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
		



}