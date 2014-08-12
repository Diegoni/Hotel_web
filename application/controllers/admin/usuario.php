<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('menu');
		$this->load->model('reserva_habitacion_model');
		$this->load->model('mensajes_model');
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
		$this->load->view('backend/usuarios.php');
		$this->load->view('backend/footer.php');
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

			//$crud->set_theme('datatables');
			$crud->set_table('usuarios');
			
			$crud->columns(	'id_usuario',
							'usuario',
							'id_acceso');
							
			$crud->field_type('pass', 'password');
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
			
			$crud->display_as('id_usuario','ID')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('usuario','Usuario')
				 ->display_as('id_acceso','Acceso')
				 ->display_as('fecha_alta','Fecha alta')
				 ->display_as('fecha_modificacion','Fecha modificación')
				 ->display_as('pass','Password')
				 ->display_as('id_estado_usuario','Estado');
			
			$crud->set_subject('usuario');
								
			$crud->set_relation('id_estado_usuario','estados_usuario','estado_usuario');
			$crud->set_relation('id_acceso','accesos','acceso');
			$crud->set_relation('id_hotel','hoteles','hotel');
			
			$crud->add_fields('usuario','pass', 'id_acceso', 'id_hotel');
			$crud->edit_fields('usuario','pass', 'id_acceso', 'id_hotel', 'fecha_alta', 'fecha_modificacion');
			
			$crud->required_fields(	'usuario',
									'pass',
									'id_acceso',
									'id_hotel');
								
			$crud->add_action('Teléfono', '', '','fa fa-phone', array($this,'buscar_telefonos'));
			$crud->add_action('Email', '', '','icon-emailalt', array($this,'buscar_emails'));
			$crud->add_action('Dirección', '', '','icon-homealt', array($this,'buscar_direcciones'));
			
			$crud->callback_after_insert(array($this, 'insert_usuario'));
    		$crud->callback_after_update(array($this, 'update_usuario'));
			
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
 
 
	public function telefonos_usuario($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('telefonos_usuario.id_usuario',$id);
			}
			
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
 
 
	public function emails_usuario($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('emails_usuario.id_usuario',$id);
			}
			
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
 
 
	public function direcciones_usuario($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('direcciones_usuario.id_usuario',$id);
			}
			
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
 * 				Alta, baja y modificación de Estados usuario
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_usuario(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('estados_usuario');
			
			$crud->columns(	'id_estado_usuario',
							'estado_usuario');
			
			$crud->display_as('id_estados_usuario','ID')
				 ->display_as('estado_usuario','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();	
			
						
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

			//$crud->set_theme('datatables');
			
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

			//$crud->set_theme('datatables');
			$crud->set_table('detalles_acceso');
			
			$crud->columns(	'id_acceso',
							'id_categoria',
							'crear',
							'escribir',
							'modificar',
							'borrar');
							
			$crud->change_field_type('crear', 'true_false');
			$crud->change_field_type('escribir', 'true_false');
			$crud->change_field_type('modificar', 'true_false');
			$crud->change_field_type('borrar', 'true_false');
			
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
 
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Funciones
 * 
 * ********************************************************************************
 **********************************************************************************/
	
	function insert_usuario($datos, $id){
		$insert = array(
        	"id_usuario" => $id,
        	"fecha_alta" => date('Y-m-d H:i:s'),
        	"fecha_modificacion" => date('Y-m-d H:i:s')
    	);

		$this->db->update('usuarios', $insert, array('id_usuario' => $id));
	}
	
	
	
	function update_usuario($datos, $id){
		$update = array(
        	"id_usuario" => $id,
        	"fecha_modificacion" => date('Y-m-d H:i:s')
    	);

		$this->db->update('usuarios', $update, array('id_usuario' => $id));
	}

	
	
	public function buscar_telefonos($id){
		$query = $this->db->query("SELECT * FROM telefonos_usuario WHERE id_usuario='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/usuario/telefonos_usuario').'/'.$id;	
		}else{
			return site_url('admin/usuario/telefonos_usuario/add').'/'.$id;;
		}
	}

	
	
	public function buscar_emails($id){
		$query = $this->db->query("SELECT * FROM emails_usuario WHERE id_usuario='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/usuario/emails_usuario').'/'.$id;	
		}else{
			return site_url('admin/usuario/emails_usuario/add').'/'.$id;;
		}
	}

	
	
	public function buscar_direcciones($id){
		$query = $this->db->query("SELECT * FROM direcciones_usuario WHERE id_usuario='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/usuario/direcciones_usuario').'/'.$id;	
		}else{
			return site_url('admin/usuario/direcciones_usuario/add').'/'.$id;;
		}
	}
	


}