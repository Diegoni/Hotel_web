<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo extends CI_Controller {

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
		$this->load->view('backend/articulos.php');
		$this->load->view('backend/footer.php');
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

			//$crud->set_theme('datatables');
			$crud->set_table('articulos');
			
			$crud->columns(	'id_articulo',
							'titulo',
							'id_hotel',
							'id_categoria',
							'id_autor',
							'id_estado_articulo');
			
			$crud->display_as('id_articulo','ID')
				 ->display_as('articulo','Artículo')
				 ->display_as('titulo','Título')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_categoria','Categoría')
				 ->display_as('id_autor','Autor')
				 ->display_as('id_estado_articulo','Estado')
				 ->display_as('archivo_url','Archivo')
				 ->display_as('fecha_publicacion','Fecha publicación')
				 ->display_as('fecha_despublicacion','Fecha despublicación');
			
			$crud->set_subject('artículo');
			
			$crud->fields(	'titulo',
							'copete',
							'articulo',
							'fecha_publicacion', 
							'fecha_despublicacion', 
							'id_hotel',
							'id_autor',
							'id_categoria',
							'id_estado_articulo');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_categoria','categorias','categoria');
			$crud->set_relation('id_autor','usuarios','usuario');
			$crud->set_relation('id_estado_articulo','estados_articulo','estado_articulo');
					
			$crud->required_fields('articulo','id_hotel','fecha_publicacion', 'id_categoria');
			
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
			
			$crud->set_field_upload('archivo_url','assets/uploads/articulos');
			
			$crud->callback_after_insert(array($this, 'insert_articulos'));
			$crud->callback_after_update(array($this, 'update_articulos'));
			
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

			//$crud->set_theme('datatables');
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
 * 				Alta, baja y modificación de Estados Articulo
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_articulo(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('estados_articulo');
			
			$crud->columns(	'id_estado_articulo',
							'estado_articulo');
			
			$crud->display_as('id_estado_articulo','ID')
				 ->display_as('estado_articulo','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();				
						
			$crud->required_fields('estado_articulo');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Estados Categoria
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_categoria(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('estados_categoria');
			
			$crud->columns(	'id_estado_categoria',
							'estado_categoria');
			
			$crud->display_as('id_estado_categoria','ID')
				 ->display_as('estado_categoria','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();				
						
			$crud->required_fields('estado_categoria');
			
			$output = $crud->render();

			$this->_example_output($output);
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Funciones
 * 
 * ********************************************************************************
 **********************************************************************************/

	function insert_articulos($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
		if($datos['id_estado_articulo']==0){
			$id_estado_articulo=1;	
		}else{
			$id_estado_articulo=$datos['id_estado_articulo'];
		}	
		
	    $registro = array(
	        "id_articulo" => $id,
	        "fecha_alta" => date('Y-m-d H:i:s'),
	        "fecha_modificacion" => date('Y-m-d H:i:s'),
	        "id_usuario_alta" => $session_data['id_usuario'],
	        "id_usuario_modificacion" => $session_data['id_usuario'],
	        "id_estado_articulo" => $id_estado_articulo
	    );
	 
	    $this->db->update('articulos', $registro, array('id_articulo' => $id));
	 
	    return true;
	}
	
	
	function update_articulos($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
    	$registro = array(
        	"id_articulo" => $id,
        	"fecha_modificacion" => date('Y-m-d H:i:s'),
        	"id_usuario_modificacion" => $session_data['id_usuario']
        	
    	);
 
    	$this->db->update('articulos', $registro, array('id_articulo' => $id));
 
    	return true;
	}


}