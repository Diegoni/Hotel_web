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
		$this->load->view('backend/menu.php',$output);	
		$this->load->view('backend/huespedes.php',$output);
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
							'apellido',
							'id_tipo_huesped');
			
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
					
			$crud->display_as('id_huesped','ID')
				 ->display_as('nombre','Nombre')
				 ->display_as('apellido','Apellido')
				 ->display_as('dni','D.N.I.')
				 ->display_as('fecha_alta','Fecha alta')
				 ->display_as('fecha_modificacion','Fecha modificación')
				 ->display_as('pass','Password')
				 ->display_as('id_tipo_huesped','Tipo')
				 ->display_as('id_estado_huesped','Estado');
			
			$crud->set_subject('huesped');
			
			$crud->set_relation('id_estado_huesped','estados_huesped','estado_huesped');
			$crud->set_relation('id_tipo_huesped','tipos_huesped','tipo_huesped');
			
			$crud->add_fields('nombre','apellido','dni', 'id_tipo_huesped', 'telefono', 'email');
			$crud->edit_fields('nombre','apellido','dni', 'id_tipo_huesped', 'fecha_alta', 'fecha_modificacion');
						
			$crud->required_fields(	'nombre',
									'apellido', 
									'dni');
									
			$crud->add_action('Teléfono', '', '','fa fa-phone', array($this,'buscar_telefonos'));
			$crud->add_action('Email', '', '','icon-emailalt', array($this,'buscar_emails'));
			$crud->add_action('Dirección', '', '','icon-homealt', array($this,'buscar_direcciones'));
			$crud->add_action('Tarjetas', '', '','icon-creditcard', array($this,'buscar_tarjetas'));
			
			$crud->callback_insert(array($this,'insert_huesped'));
			$crud->callback_before_update(array($this,'update_huesped'));
			
			$crud->unset_read();
	
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
 
 
	public function telefonos_huesped($id=NULL){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('telefonos_huesped.id_huesped',$id);
			}
			
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
			
			$crud->unset_back_to_list();
			
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
 
 
	public function emails_huesped($id=NULL){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('emails_huesped.id_huesped',$id);
			}
			
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
									
			$crud->unset_back_to_list();									
			
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
 
 
	public function direcciones_huesped($id=NULL){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('direcciones_huesped.id_huesped',$id);
			}
			
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
									
			$crud->unset_back_to_list();									
			
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
 
 
	public function tarjetas_huesped($id=NULL){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('tarjetas.id_huesped',$id);
			}
			
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
									
			$crud->unset_back_to_list();									
			
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
 * 				Alta, baja y modificación de Tipos Huesped
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tipos_huesped(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tipos_huesped');
			
			$crud->columns(	'id_tipo_huesped',
							'tipo_huesped');
			
			$crud->display_as('id_tipo_huesped','ID')
				 ->display_as('tipo_huesped','Tipo');
			
			$crud->set_subject('tipo');
						
			$crud->required_fields('tipo_huesped');
			
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
			$crud->unset_add();
			$crud->unset_read();
			
						
			$crud->required_fields('estado_huesped');
			
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


	function insert_huesped($datos){
		$fecha= date('Y-m-d H:i:s');
		
	    $huesped = array(
	        "nombre" => $datos['nombre'],
	        "apellido" => $datos['apellido'],
	        "dni" => $datos['dni'],
	        "id_tipo_huesped" => $datos['id_tipo_huesped'],
	        "fecha_alta" => $fecha,
	        "fecha_modificacion" => $fecha
	    );
	 
	    $this->db->insert('huespedes', $huesped);
		
		$id_huesped=$this->db->insert_id();
		
		if(isset($datos['telefono'])){		
			$telefono = array(
	        	"id_huesped" => $id_huesped,
	        	"telefono" => $datos['telefono']
	    	);
		
			$this->db->insert('telefonos_huesped',$telefono);
		}
		
		if(isset($datos['email'])){
			$email = array(
	        	"id_huesped" => $id_huesped,
	        	"email" => $datos['email']
	    	);
		
			$this->db->insert('emails_huesped',$email);			
		}
		
	    return true;
	}
	


	function update_huesped($datos, $id){
		$update = array(
        	"id_huesped" => $id,
        	"fecha_modificacion" => date('Y-m-d H:i:s')
    	);

		$this->db->update('huespedes', $update, array('id_huesped' => $id));
	}
	
	
	
	function buscar_telefonos($id){
		$query = $this->db->query("SELECT * FROM telefonos_huesped WHERE id_huesped='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/huesped/telefonos_huesped').'/'.$id;	
		}else{
			return site_url('admin/huesped/telefonos_huesped/add').'/'.$id;;
		}
	}



	function buscar_emails($id){
		$query = $this->db->query("SELECT * FROM emails_huesped WHERE id_huesped='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/huesped/emails_huesped').'/'.$id;	
		}else{
			return site_url('admin/huesped/emails_huesped/add').'/'.$id;;
		}
	}



	function buscar_direcciones($id){
		$query = $this->db->query("SELECT * FROM direcciones_huesped WHERE id_huesped='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/huesped/direcciones_huesped').'/'.$id;	
		}else{
			return site_url('admin/huesped/direcciones_huesped/add').'/'.$id;;
		}
	}
	
	
	
	function buscar_tarjetas($id){
		$query = $this->db->query("SELECT * FROM tarjetas WHERE id_huesped='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/huesped/tarjetas_huesped').'/'.$id;	
		}else{
			return site_url('admin/huesped/tarjetas_huesped/add').'/'.$id;;
		}
	}
		


}