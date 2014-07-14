<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeria extends CI_Controller {

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
			$this->load->view('backend/menu.php',$output);	
			$this->load->view('backend/galerias.php',$output);
			$this->load->view('backend/footer.php',$output);
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
 * 				Alta, baja y modificación de galeria
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function galeria_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('galerias');
			
			$crud->columns(	'id_galeria',
							'galeria',
							'id_articulo');
			
			$crud->display_as('id_galeria','ID')
				 ->display_as('galeria','Galería')
				 ->display_as('id_articulo','Artículo');
			
			$crud->set_subject('galería');
			
			$crud->set_relation('id_articulo','articulos','titulo');
					
			$crud->required_fields(	'galeria',
									'id_articulo');

			
			$output = $crud->render();

			$this->_example_output($output);
	}




}