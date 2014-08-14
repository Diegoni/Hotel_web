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
			$crud->set_table('habitaciones');
			
			$crud->set_relation_n_n('servicios', 'habitacion_servicio', 'servicios', 'id_habitacion', 'id_servicio', 'servicio','prioridad');
			
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
			
			$crud->add_action('Galería', '', '','icon-images-gallery', array($this,'buscar_galeria'));
			
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
			$crud->set_table('tipos_habitacion');
			
			$crud->columns(	'id_tipo_habitacion',
							'tipo_habitacion');
			
			$crud->display_as('id_tipo_habitacion','ID')
				 ->display_as('tipo_habitacion','Tipo habitación');
			
			$crud->set_subject('tipo habitación');
							
			$crud->required_fields(	'tipo_habitacion');
			
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
			
			$crud->set_relation('id_moneda','monedas','moneda');
								
			$crud->required_fields(	'tarifa',
									'adultos', 
									'menores',
									'precio',
									'id_moneda');
									
			$crud->callback_after_update(array($this, 'update_tarifas'));

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
			
			$crud->set_table('tarifas_temporales');
			
			$crud->set_relation_n_n('habitaciones', 'tarifa_habitacion', 'habitaciones', 'id_tarifa_temporal', 'id_habitacion', 'habitacion', 'prioridad');
			
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
			
			$crud->set_relation('id_tipo_tarifa','tipos_tarifa','tipo_tarifa');
			
			$crud->required_fields('id_tipo_tarifa','entrada','salida', 'tipo', 'valor');
			
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
						
			$crud->callback_after_insert(array($this, 'insert_after_tarifas_temporales'));
			$crud->callback_after_update(array($this, 'update_tarifas_temporales'));
			$crud->callback_before_insert(array($this, 'insert_before_tarifas_temporales'));
			
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
			$crud->set_table('servicios');
			
			$crud->columns(	'id_servicio',
							'servicio',
							'id_estado_servicio');
			
			$crud->display_as('id_servicio','ID')
				 ->display_as('servicio','Servicio')
				 ->display_as('id_estado_servicio','Estado');
			
			$crud->set_subject('servicio');
			
			$crud->set_relation('id_estado_servicio','estados_servicio','estado_servicio');
			
			$crud->add_fields('servicio');
								
			$crud->required_fields(	'servicio',
									'id_estado_servicio');

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

	function insert_after_tarifas_temporales($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
	    $registro = array(
	        "id_tarifa_temporal" => $id,
	        "fecha_alta" => date('Y-m-d H:i:s'),
	        "fecha_modificacion" => date('Y-m-d H:i:s'),
	        "id_usuario_alta" => $session_data['id_usuario'],
	        "id_usuario_modificacion" => $session_data['id_usuario']
	    );
	 
	    $this->db->update('tarifas_temporales', $registro, array('id_tarifa_temporal' => $id));
	 
	    return true;
	}
	
	
	function update_tarifas_temporales($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
    	$registro = array(
        	"id_tarifa_temporal" => $id,
        	"fecha_modificacion" => date('Y-m-d H:i:s'),
        	"id_usuario_modificacion" => $session_data['id_usuario']
    	);
 
    	$this->db->update('tarifas_temporales', $registro, array('id_tarifa_temporal' => $id));
 
    	return true;
	}
	
	
	function insert_before_tarifas_temporales($datos, $id){
		if($datos['entrada']>$datos['salida']){
			return false;
		}else{
			return true;	
		} 
	}
	
	
	function update_tarifas($datos, $id){
		$session_data = $this->session->userdata('logged_in');
		
    	$registro = array(
        	"id_tarifa" => $id,
        	"fecha_modificacion" => date('Y-m-d H:i:s'),
        	"id_usuario_modificacion" => $session_data['id_usuario']
    	);
 
    	$this->db->update('tarifas', $registro, array('id_tarifa' => $id));
 
    	return true;
	}

}