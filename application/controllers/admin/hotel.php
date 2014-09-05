<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

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
		$this->load->view('backend/hoteles.php');
		$this->load->view('backend/footer.php');
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

			$crud->where('hoteles.delete', 0);
			$crud->set_table('hoteles');
			
			$crud->columns(	'id_hotel',
							'hotel',
							'descripcion',
							'logo_url',
							'url');
			
			$crud->display_as('id_hotel','ID')
				 ->display_as('hotel','Hotel')
				 ->display_as('descripcion','Descripción')
				 ->display_as('url','Sitio');
			
			$crud->set_subject('hotel');
			
			$crud->fields('hotel', 'descripcion', 'logo_url', 'url', 'fondo_intro');
			
			$crud->required_fields('hotel','descripcion', 'url', 'fondo_intro');
			
			$crud->add_action('Teléfono', '', '','icon-phonealt', array($this,'buscar_telefonos'));
			$crud->add_action('Dirección', '', '','icon-homealt', array($this,'buscar_direcciones'));
			//$crud->add_action('Configuración', '', '','icon-mootools', array($this,'buscar_config'));
			
			$crud->set_field_upload('logo_url','assets/uploads/logos');
			$crud->set_field_upload('fondo_intro','assets/uploads/logos');
			
			$crud->field_type('delete', 'hidden');
			
			$_COOKIE['tabla']='hoteles';
			$_COOKIE['id']='id_hotel';	
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_insert(array($this, 'insert_config'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_hotel'));
			
			
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
 
 
	public function telefonos_hotel($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('telefonos_hotel.id_hotel',$id);
			}
			
			$crud->set_table('telefonos_hotel');
			
			$crud->columns(	'id_hotel',
							'telefono',
							'id_tipo');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('telefono','Teléfono')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('teléfono');
			
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
 
 
	public function emails_hotel($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			$crud->set_table('emails_hotel');
			
			$crud->columns(	'email',
							'id_tipo');
			
			$crud->display_as('email','Email')
				 ->display_as('id_tipo','Tipo')
				 ->display_as('mostrar','Mostrar en la web');
			
			$crud->field_type('mostrar', 'true_false');
			
			$crud->set_subject('email');
			
			//$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'email');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de 	s
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function direcciones_hotel($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('direcciones_hotel.id_hotel',$id);
			}
			
			$crud->set_table('direcciones_hotel');
			
			$crud->columns(	'id_hotel',
							'calle',
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
 
 
	public function config($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('config.id_hotel',$id);
			}
			
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

			//$crud->set_theme('datatables');
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
	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Detalle
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function config_email_reserva($id=NULL){
			$crud = new grocery_CRUD();
			
			if($id==1){
				$crud->where('config_email_reserva.id_tipo_correo', 1);
				$crud->where('config_email_reserva.delete', 0);
				$crud->set_relation_n_n('emails_reserva' , 'hotel_email_reserva', 'emails_hotel', 'id_config', 'id_email', '{email}', 'prioridad');
			}else{
				$crud->where('config_email_reserva.delete', 0);
				$crud->where('config_email_reserva.id_tipo_correo', 2);
			}
			
			$crud->set_table('config_email_reserva');
			
			$crud->columns(	'id_tipo_correo', 'id_hotel');
			
			$crud->display_as('id_config_email_reserva','ID')
				 ->display_as('id_nota','Nota')
				 ->display_as('habitacion ','Habitación')
				 ->display_as('telefono','Teléfono')
				 ->display_as('aerolinea','Aerolínea')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_tipo_correo','Tipo')				 
				 ->display_as('id_reserva','Reserva');
			
			$crud->set_subject('Email Reserva');
			
			$crud->field_type('id_tipo_correo', 'readonly');
			$crud->field_type('id_hotel', 'readonly');
			$crud->field_type('hotel', 'true_false'); 
		  	$crud->field_type('entrada', 'true_false'); 
		  	$crud->field_type('salida', 'true_false');  
		  	$crud->field_type('adultos', 'true_false');  
		  	$crud->field_type('menores', 'true_false');  
		  	$crud->field_type('cantidad', 'true_false');  
		  	$crud->field_type('habitacion', 'true_false');  
		  	$crud->field_type('nombre', 'true_false');  
		  	$crud->field_type('apellido', 'true_false');  
		  	$crud->field_type('email', 'true_false');  
		  	$crud->field_type('telefono', 'true_false');  
		  	$crud->field_type('tipo_tarjeta', 'true_false');  
		  	$crud->field_type('tarjeta', 'true_false');  
		  	$crud->field_type('pin', 'true_false');  
		  	$crud->field_type('vencimiento', 'true_false');  
		  	$crud->field_type('nro_de_vuelo', 'true_false');  
		  	$crud->field_type('horario_llegada', 'true_false');  
		  	$crud->field_type('aerolinea', 'true_false');  
		  	$crud->field_type('id_nota', 'true_false');  
		  	$crud->field_type('id_reserva', 'true_false');  
			$crud->field_type('precio', 'true_false');
			$crud->field_type('fecha', 'true_false');
			$crud->field_type('delete', 'hidden');
			
			 //$crud->callback_field('emails_reserva',array($this,'field_callback_1'));
			//$crud->unset_fields('emails_reserva');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo_correo','tipos_correo','tipo_correo');
		  	 
			$crud->unset_add();
			$crud->unset_delete();
			
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
 
 
	public function config_email_mensaje($id=NULL){
			$crud = new grocery_CRUD();
			
			if($id==1){
				$crud->where('config_email_mensaje.id_tipo_correo', 1);
				$crud->where('config_email_mensaje.delete', 0);
				$crud->set_relation_n_n('emails_mensaje', 'hotel_email_mensaje', 'emails_hotel', 'id_config', 'id_email', '{email}', 'prioridad');
			}else{
				$crud->where('config_email_mensaje.delete', 0);
				$crud->where('config_email_mensaje.id_tipo_correo', 2);
			}			

			$crud->set_table('config_email_mensaje');
			
			$crud->columns(	'id_tipo_correo', 'id_hotel');
			
			$crud->display_as('id_config_email_mensaje','ID')
				 ->display_as('habitacion ','Habitación')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_tipo_correo','Tipo')
				 ->display_as('telefono ','Teléfono');
			
			$crud->set_subject('Email Mensaje');
			
			$crud->field_type('id_tipo_correo', 'readonly');
			$crud->field_type('id_hotel', 'readonly');
			$crud->field_type('mensaje', 'true_false');
			$crud->field_type('hotel', 'true_false'); 
		  	$crud->field_type('nombre', 'true_false');  
		  	$crud->field_type('apellido', 'true_false');  
		  	$crud->field_type('email', 'true_false');  
		  	$crud->field_type('telefono', 'true_false');
			$crud->field_type('habitacion', 'true_false'); 
			$crud->field_type('fecha', 'true_false');
			$crud->field_type('delete', 'hidden');  
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo_correo','tipos_correo','tipo_correo');
		  	 
			$crud->unset_add();
			$crud->unset_delete();
			
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
 
 
	public function config_email_habitacion($id=NULL){
			$crud = new grocery_CRUD();
			
			if($id==1){
				$crud->where('config_email_habitacion.id_tipo_correo', 1);
				$crud->where('config_email_habitacion.delete', 0);
				$crud->set_relation_n_n('emails_habitacion', 'hotel_email_habitacion', 'emails_hotel', 'id_config', 'id_email', '{email}', 'prioridad');
			}else{
				$crud->where('config_email_habitacion.delete', 0);
				$crud->where('config_email_habitacion.id_tipo_correo', 2);
			}	

			$crud->set_table('config_email_habitacion');
			
			$crud->columns(	'id_tipo_correo', 'id_hotel');
			
			$crud->display_as('id_config_email_habitacion','ID')
				 ->display_as('habitacion','Habitación')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_tipo_correo','Tipo');
			
			$crud->set_subject('Email Mensaje');
			
			$crud->field_type('id_tipo_correo', 'readonly');
			$crud->field_type('id_hotel', 'readonly');
			$crud->field_type('mensaje', 'true_false');
			$crud->field_type('hotel', 'true_false'); 
		  	$crud->field_type('nombre', 'true_false');  
		  	$crud->field_type('apellido', 'true_false');  
		  	$crud->field_type('email', 'true_false');  
		  	$crud->field_type('habitacion', 'true_false');
			$crud->field_type('fecha', 'true_false');
			$crud->field_type('delete', 'hidden');   
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo_correo','tipos_correo','tipo_correo');
		  	 
			$crud->unset_add();
			$crud->unset_delete();
			
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
	function insert_config($datos, $id){
		$registro = array(
	        "id_tipo_correo" => 1,
	        "id_hotel" => $id,
	        "hotel" => 1,
	        "nombre" => 1,
	        "apellido" => 1,
	        "email" => 1,
	        "telefono" => 1,
	        "fecha" => 1
	    );
	 
	    $this->db->insert('config_email_reserva',$registro);
		$this->db->insert('config_email_mensaje',$registro);
		$this->db->insert('config_email_habitacion',$registro);
		
		$registro['id_tipo_correo'] = 2;
		
		$this->db->insert('config_email_reserva',$registro);
		$this->db->insert('config_email_mensaje',$registro);
		$this->db->insert('config_email_habitacion',$registro);
	 
	    return true;
	}


	public function delete_hotel($id){
			
		$this->db->update('config_email_reserva', array('config_email_reserva.delete' => 1), array('config_email_reserva.id_hotel' => $id));
		$this->db->update('config_email_mensaje', array('config_email_mensaje.delete' => 1), array('config_email_mensaje.id_hotel' => $id));
		$this->db->update('config_email_habitacion', array('config_email_habitacion.delete' => 1), array('config_email_habitacion.id_hotel' => $id));
		
		$session_data = $this->session->userdata('logged_in');
		
		$registro = array(
	        "tabla" => $_COOKIE['tabla'],
	        "id_tabla" => $id,
	        "id_accion" => 3,
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
 
    	$this->db->insert('logs_huespedes',$registro);
			
    	return $this->db->update($_COOKIE['tabla'], array('delete' => 1), array($_COOKIE['id'] => $id));
	}

	
	
	public function buscar_telefonos($id){
		$query = $this->db->query("SELECT * FROM telefonos_hotel WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/telefonos_hotel').'/'.$id;	
		}else{
			return site_url('admin/hotel/telefonos_hotel/add').'/'.$id;;
		}
	}



	public function buscar_emails($id){
		$query = $this->db->query("SELECT * FROM emails_hotel WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/emails_hotel').'/'.$id;	
		}else{
			return site_url('admin/hotel/emails_hotel/add').'/'.$id;;
		}
	}



	public function buscar_direcciones($id){
		$query = $this->db->query("SELECT * FROM direcciones_hotel WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/direcciones_hotel').'/'.$id;	
		}else{
			return site_url('admin/hotel/direcciones_hotel/add').'/'.$id;;
		}
	}
	
	
	
	public function buscar_config($id){
		$query = $this->db->query("SELECT * FROM config WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/config').'/'.$id;	
		}else{
			return site_url('admin/hotel/config/add').'/'.$id;;
		}
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Funciones logs
 * 
 * ********************************************************************************
 **********************************************************************************/

	
	function insert_control_fechas($datos, $id){
		if($datos['entrada']>$datos['salida']){
			return false;
		}else{
			return true;	
		} 
	}
	

	function insert_log($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
	    $registro = array(
	        "tabla" => $_COOKIE['tabla'],
	        "id_tabla" => $id,
	        "id_accion" => 1,
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
	 
	    $this->db->insert('logs_huespedes',$registro);
	 
	    return true;
	}
	
	
	function update_log($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
    	$registro = array(
	        "tabla" => $_COOKIE['tabla'],
	        "id_tabla" => $id,
	        "id_accion" => 2,
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
 
    	$this->db->insert('logs_huespedes',$registro);
 
    	return true;
	}
	
	
	public function delete_log($id){
    	$session_data = $this->session->userdata('logged_in');
		
		$registro = array(
	        "tabla" => $_COOKIE['tabla'],
	        "id_tabla" => $id,
	        "id_accion" => 3,
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
 
    	$this->db->insert('logs_huespedes',$registro);
			
    	return $this->db->update($_COOKIE['tabla'], array('delete' => 1), array($_COOKIE['id'] => $id));
	}

}
?>
