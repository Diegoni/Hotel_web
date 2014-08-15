<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habitacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('menu');
		$this->load->model('reserva_habitacion_model');
		$this->load->library('grocery_CRUD');
		$this->load->library('image_CRUD');
	}


	public function _example_output($output = null)
	{
		$reservas=buscarReservas();
		$mensajes=buscarMensajes();
		
		$db=array_merge($reservas, $mensajes);
					
		$this->load->view('backend/head.php',$output);
		$this->load->view('backend/menu.php', $db);	
		$this->load->view('backend/modal.php');
		$this->load->view('backend/habitaciones.php');
		$this->load->view('backend/footer.php');
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

			//$crud->set_theme('datatables');
			$crud->where('habitaciones.delete', 0);
			$crud->set_table('habitaciones');
			
			$crud->set_relation_n_n('servicios', 'habitacion_servicio', 'servicios', 'id_habitacion', 'id_servicio', 'servicio','prioridad',  'delete = 0');
			
			$crud->columns(	'id_habitacion',
							'habitacion',
							'id_hotel', 
							'id_estado_habitacion');
			
			$crud->display_as('id_habitacion','ID')
				 ->display_as('habitacion','Habitación')
				 ->display_as('descripcion','descripción')
				 ->display_as('cantidad','Cantidad')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_tipo_habitacion','Tipo')
				 ->display_as('id_tarifa','Tarifa')
				 ->display_as('id_estado_habitacion','Estado');
			
			$crud->fields(	'habitacion', 
							'descripcion',
							'adultos',
							'menores',
							'entrada',
							'salida',
							'cantidad',
							'id_estado_habitacion',
							'id_hotel',
							'id_tipo_habitacion',
							'id_tarifa',
							'servicios');
				 
			$crud->field_type('delete', 'hidden');
			
			$crud->set_subject('habitación');
			
			$crud->set_relation('id_tipo_habitacion','tipos_habitacion','tipo_habitacion', 'delete = 0');
			$crud->set_relation('id_hotel','hoteles','hotel', 'delete = 0');
			$crud->set_relation('id_tarifa','tarifas','{tarifa} {precio}', 'delete = 0');
			$crud->set_relation('id_estado_habitacion','estados_habitacion','estado_habitacion');
					
			$crud->required_fields(	'habitacion',
									'adultos', 
									'menores',
									'id_tipo_habitacion',
									'id_hotel',
									'id_tarifa');
			
			$crud->add_action('Galería', '', '','icon-images-gallery', array($this, 'buscar_galeria'));
			
			$_COOKIE['tabla']='habitaciones';
			$_COOKIE['id']='id_habitacion';
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));
			$crud->callback_before_insert(array($this, 'insert_control_fechas'));
			
			$output = $crud->render();

			$this->_example_output($output);
	}

	function buscar_galeria($id){
		return site_url('/galeria/imagenes_habitacion').'/'.$id;	
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de tipos de habitacion
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tipos_habitacion(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->where('delete', 0);
			$crud->set_table('tipos_habitacion');
			
			$crud->columns(	'id_tipo_habitacion',
							'tipo_habitacion');
			
			$crud->display_as('id_tipo_habitacion','ID')
				 ->display_as('tipo_habitacion','Tipo habitación');
			
			$crud->set_subject('tipo habitación');
			
			$crud->fields('tipo_habitacion');
							
			$crud->required_fields(	'tipo_habitacion');
			
			$_COOKIE['tabla']='tipos_habitacion';
			$_COOKIE['id']='id_tipo_habitacion';
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));
			
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

			//$crud->set_theme('datatables');
			$crud->where('tarifas.delete', 0);
			$crud->set_table('tarifas');
			
			$crud->columns(	'id_tarifa',
							'tarifa',
							'precio',
							'id_moneda');
			
			$crud->display_as('id_tarifa','ID')
				 ->display_as('tarifa','Tarifa')
				 ->display_as('precio','Precio')
				 ->display_as('id_moneda','Moneda');
				 
			$crud->fields(	'tarifa',
							'precio',
							'id_moneda');
			
			$crud->set_subject('tarifa');
			
			$crud->set_relation('id_moneda','monedas','moneda', 'delete = 0');
								
			$crud->required_fields(	'tarifa',
									'adultos', 
									'menores',
									'precio',
									'id_moneda');
									
			$_COOKIE['tabla']='tarifas';
			$_COOKIE['id']='id_tarifa';
			
			$crud->callback_after_insert(array($this, 'insert_log'));									
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));

			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de tarifas temporales
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function tarifas_temporales_abm(){
			$crud = new grocery_CRUD();
			
			$crud->where('tarifas_temporales.delete', 0);
			$crud->set_table('tarifas_temporales');
			
			$crud->set_relation_n_n('habitaciones', 'tarifa_habitacion', 'habitaciones', 'id_tarifa_temporal', 'id_habitacion', 'habitacion', 'prioridad',  'delete = 0');
			
			$crud->columns(	'id_tarifa_temporal',
							'habitaciones',
							'tarifa_temporal',
							'entrada',
							'salida',
							'id_tipo_tarifa',
							'valor');
							
			$crud->display_as('id_tarifa_temporal','ID')
				 ->display_as('habitaciones','Habitaciones')
				 ->display_as('tarifa_temporal','Tarifa temporal')
				 ->display_as('entrada','Entrada')
				 ->display_as('salida','Salida')
				 ->display_as('id_tipo_tarifa','Tipo')
				 ->display_as('valor','Valor')
				 ->display_as('fecha_modificacion','Fecha modificación');
			
			$crud->set_subject('tarifa temporal');
			
			$crud->fields('tarifa_temporal','entrada','salida','id_tipo_tarifa', 'valor', 'habitaciones');
			
			$crud->set_relation('id_tipo_tarifa','tipos_tarifa','tipo_tarifa', 'delete = 0');
			
			$crud->required_fields('id_tipo_tarifa','entrada','salida', 'tipo', 'valor');
			
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
			
			$_COOKIE['tabla']='tarifas_temporales';
			$_COOKIE['id']='id_tarifa_temporal';
						
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));
			$crud->callback_before_insert(array($this, 'insert_control_fechas'));
			
			$output = $crud->render();

			$this->_example_output($output);
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de monedas
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function monedas_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->where('monedas.delete', 0);
			$crud->set_table('monedas');
			
			$crud->columns(	'id_moneda',
							'moneda',
							'valor',
							'id_pais');
			
			$crud->display_as('id_moneda','ID')
				 ->display_as('moneda','Moneda')
				 ->display_as('id_pais','País')
				 ->display_as('simbolo','Símbolo')
				 ->display_as('imagen','Imágen');
			
			$crud->fields('moneda', 'abreviatura', 'simbolo', 'valor', 'imagen', 'id_pais');
			
			$crud->set_subject('moneda');
			
			$crud->set_relation('id_pais','paises','pais');
						
			$crud->required_fields(	'moneda');
			
			$crud->set_field_upload('imagen','assets/uploads/monedas');
			
			$_COOKIE['tabla']='monedas';
			$_COOKIE['id']='id_moneda';
						
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));
						
			$output = $crud->render();

			$this->_example_output($output);
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de servicios
 * 
 * ********************************************************************************
 **********************************************************************************/
	 
	public function servicios_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->where('delete', 0);
			$crud->set_table('servicios');
			
			$crud->columns(	'id_servicio',
							'servicio');
			
			$crud->display_as('id_servicio','ID')
				 ->display_as('servicio','Servicio');
			
			$crud->set_subject('servicio');
			
			$crud->fields('servicio');
								
			$crud->required_fields(	'servicio');
			
			$_COOKIE['tabla']='servicios';
			$_COOKIE['id']='id_servicio';
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));

			$output = $crud->render();

			$this->_example_output($output);
	}





/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Tipos de tarifa
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function tipo_tarifa_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('tipos_tarifa');
			
			$crud->columns(	'id_tipo_tarifa',
							'tipo_tarifa');
			
			$crud->display_as('id_tipo_tarifa','ID')
				 ->display_as('tipo_tarifa','Estado');
			
			$crud->set_subject('tipo');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();	
			
			$_COOKIE['tabla']='tipos_tarifa';
			$_COOKIE['id']='id_tipo_tarifa';	
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));		
						
			$crud->required_fields('tipo_tarifa');
			
			$output = $crud->render();

			$this->_example_output($output);
	}

	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Estados Habitación
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_habitacion(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('estados_habitacion');
			
			$crud->columns(	'id_estado_habitacion',
							'estado_habitacion');
			
			$crud->display_as('id_estado_habitacion','ID')
				 ->display_as('estado_habitacion','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();				
						
			$_COOKIE['tabla']='estados_habitacion';
			$_COOKIE['id']='id_estado_habitacion';	
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));		
			
			$crud->required_fields('estado_habitacion');
						
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
	        "accion" => 'insert',
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
	 
	    $this->db->insert('logs_habitaciones',$registro);
	 
	    return true;
	}
	
	
	function update_log($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
    	$registro = array(
	        "tabla" => $_COOKIE['tabla'],
	        "id_tabla" => $id,
	        "accion" => 'update',
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
 
    	$this->db->insert('logs_habitaciones',$registro);
 
    	return true;
	}
	
	
	public function delete_log($id){
    	$session_data = $this->session->userdata('logged_in');
		
		$registro = array(
	        "tabla" => $_COOKIE['tabla'],
	        "id_tabla" => $id,
	        "accion" => 'delete',
	        "fecha" => date('Y-m-d H:i:s'),
	        "id_usuario" => $session_data['id_usuario']
	    );
 
    	$this->db->insert('logs_habitaciones',$registro);
			
    	return $this->db->update($_COOKIE['tabla'], array('delete' => 1), array($_COOKIE['id'] => $id));
	}
	

}