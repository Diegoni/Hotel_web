<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
 * 				Alta, baja y modificación de artículos
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function articulos_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('articulos');
			
			$crud->columns(	'id_articulo',
							'titulo',
							'id_hotel',
							'id_categoria',
							'id_autor',
							'id_estado_articulo');
			
			$crud->display_as('id_articulo','ID')
				 ->display_as('titulo','Título')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_categoria','Categoría')
				 ->display_as('id_autor','Autor')
				 ->display_as('id_estado_articulo','Estado')				 ;
			
			$crud->set_subject('artículo');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_categoria','categorias','categoria');
			$crud->set_relation('id_autor','usuarios','usuario');
					
			$crud->required_fields('articulo','id_hotel','fecha_publicacion');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de categorías
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function categorias_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('categorias');
			
			$crud->columns(	'id_categoria',
							'categoria',
							'id_ubicacion',
							'id_estado_categoria');
			
			$crud->display_as('id_categoria','ID')
				 ->display_as('categoria','Categoría')
				 ->display_as('id_ubicacion','Ubicación')
				 ->display_as('id_estado_categoria','Estado');
			
			$crud->set_subject('categoría');
			
			$crud->set_relation('id_ubicacion','ubicacion','ubicacion');
			$crud->set_relation('id_estado_categoria','estados_categoria','estado_categoria');
					
			$crud->required_fields('categoria','id_ubicacion');
			
			$output = $crud->render();

			$this->_example_output($output);
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
				 ->display_as('pass','Password');
			
			$crud->set_subject('huesped');
			
			$crud->required_fields(	'nombre',
									'apellido', 
									'dni');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
		


}