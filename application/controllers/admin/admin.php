<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('back');

		$this->load->library('grocery_CRUD');
	}

	public function _admin_output($output = null)
	{
		$this->load->view(getBackDir().'menu.php',$output);
		$this->load->view(getBackDir().'body.php',$output);
	}

	public function index()
	{
		$this->_admin_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	
	
/**************************************************************************************
 ************************************************************************************** 
 * 				
 * 					Alta baja y modificación de Articulos
 *  
 **************************************************************************************
 **************************************************************************************/	
	
	public function articulos_abm()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('articulos');
			$crud->fields('titulo', 'copete' ,  'articulo' ,'fecha_alta', 'fecha_publicacion', 'fecha_despublicacion', 'id_hotel', 'id_autor', 'id_categoria', 'id_estado_articulo');
			
			$crud->columns('titulo','fecha_alta','id_categoria', 'id_hotel');
			
			$crud->display_as('id_categoria','Categoria')					 
				 ->display_as('id_hotel','Hotel')
				 ->display_as('titulo','Título');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_autor','usuarios','usuario');
			$crud->set_relation('id_categoria','categorias','categoria');
			$crud->set_relation('id_estado_articulo','estados_articulo','estado_articulo');

			$output = $crud->render();
			$this->_admin_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

}