<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeria extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		/* ------------------ */
		
		$this->load->helper('url'); //Just for the examples, this is not required thought for the library
		
		$this->load->library('image_CRUD');
	}
	
	function _example_output($output = null)
	{
		$this->load->view('backend/head.php',$output);
		$this->load->view('backend/menu.php',$output);	
		$this->load->view('backend/galerias.php',$output);
		$this->load->view('backend/footer.php',$output);
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de imagenes galeria
 * 
 * ********************************************************************************
 **********************************************************************************/
	
	function imagenes_galeria()
	{
		$image_crud = new image_CRUD();
	
		$image_crud->set_primary_key_field('id_imagen');
		$image_crud->set_url_field('imagen');
		$image_crud->set_title_field('descripcion');
		$image_crud->set_table('imagenes_galeria')
		->set_ordering_field('orden')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de imagenes carrusel
 * 
 * ********************************************************************************
 **********************************************************************************/
	
	function imagenes_carrusel()
	{
		$image_crud = new image_CRUD();
	
		$image_crud->set_primary_key_field('id_imagen');
		$image_crud->set_url_field('imagen');
		$image_crud->set_title_field('descripcion');
		$image_crud->set_table('imagenes_carrusel')
		->set_ordering_field('orden')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}	
	

}