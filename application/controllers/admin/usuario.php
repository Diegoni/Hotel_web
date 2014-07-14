<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
			$this->load->view('backend/usuarios.php',$output);
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
 * 				Alta, baja y modificación de usuario
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function usuarios_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('usuarios');
			
			$crud->columns(	'id_usuario',
							'usuario',
							'id_acceso');
			
			$crud->display_as('id_usuario','ID')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('usuario','Usuario')
				 ->display_as('id_acceso','Acceso')
				 ->display_as('fecha_alta','Fecha Alta')
				 ->display_as('pass','Password')
				 ->display_as('id_estado_usuario','Estado');
			
			$crud->set_subject('usuario');
			
			$crud->set_relation('id_estado_usuario','estados_usuario','estado_usuario');
			$crud->set_relation('id_acceso','accesos','acceso');
			$crud->set_relation('id_hotel','hoteles','hotel');
			
			$crud->add_fields('usuario','pass','id_acceso', 'id_hotel', 'id_estado_usuario');
			
			$crud->required_fields(	'usuario',
									'pass', 
									'id_acceso',
									'id_hotel');
			
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
 
 
	public function telefonos_usuario(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('telefonos_usuario');
			
			$crud->columns(	'id_usuario',
							'telefono',
							'id_tipo');
			
			$crud->display_as('id_usuario','Usuario')
				 ->display_as('telefono','Teléfono')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('teléfono');
			
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_usuario',
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
 
 
	public function emails_usuario(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('emails_usuario');
			
			$crud->columns(	'id_usuario',
							'email',
							'id_tipo');
			
			$crud->display_as('id_usuario','Usuario')
				 ->display_as('email','Email')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('email');
			
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_usuario',
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
 
 
	public function direcciones_usuario(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('direcciones_usuario');
			
			$crud->columns(	'id_usuario',
							'calle',
							'nro',
							'id_departamento',
							'id_provincia');
			
			$crud->display_as('id_usuario','Usuario')
				 ->display_as('id_departamento','Dep.')
				 ->display_as('id_provincia','Prov.')
				 ->display_as('id_pais','País')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('dirección');
			
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_relation('id_departamento','departamentos','departamento');
			$crud->set_relation('id_provincia','provincias','provincia');
			$crud->set_relation('id_pais','paises','pais');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_usuario',
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
 
 
	public function tarjetas_usuario(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tarjetas');
			
			$crud->columns(	'id_usuario',
							'tarjeta',
							'id_tipo_tarjeta');
			
			$crud->display_as('id_usuario','Usuario')
				 ->display_as('id_tipo_tarjeta','Tipo');
			
			$crud->set_subject('tarjeta');
			
			$crud->set_relation('id_usuario','usuarios','usuario');
			$crud->set_relation('id_tipo_tarjeta','tipos_tarjeta','tipo_tarjeta');
						
			$crud->required_fields(	'id_usuario',
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
 * 				Alta, baja y modificación de Estados usuario
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_usuario(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('estados_usuario');
			
			$crud->columns(	'id_estado_usuario',
							'estado_usuario');
			
			$crud->display_as('id_estados_usuario','ID')
				 ->display_as('estado_usuario','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			//$crud->unset_add();
			
						
			$crud->required_fields('estado_usuario');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
		


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de accesos
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function accesos_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('accesos');
			
			$crud->columns(	'id_acceso',
							'acceso');
			
			$crud->display_as('id_accesos','ID')
				 ->display_as('acceso','Acceso');
			
			$crud->set_subject('acceso');
			
			$crud->required_fields(	'acceso');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de detalle acceso
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function detalle_accesos(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('detalles_acceso');
			
			$crud->columns(	'id_acceso',
							'id_categoria',
							'crear',
							'escribir',
							'modificar',
							'borrar');
			
			$crud->display_as('id_acceso','Accesos')
				 ->display_as('id_categoria','Categoria')
				 ->display_as('crear','Crear')
				 ->display_as('escribir','Escribir')
				 ->display_as('modificar','Modificar')
				 ->display_as('borrar','Borrar');
			
			$crud->set_subject('detalle acceso');
			
			$crud->set_relation('id_acceso','accesos','acceso');
			$crud->set_relation('id_categoria','categorias','categoria');
			
			$crud->required_fields(	'id_acceso', 'id_categoria');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	


}