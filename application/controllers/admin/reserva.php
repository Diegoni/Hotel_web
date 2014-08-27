<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('menu');
		$this->load->model('reserva_habitacion_model');
		$this->load->model('reservas_model');
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
		$this->load->view('backend/reservas.php');
		$this->load->view('backend/footer.php');
	}

	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de reservas
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function reservas_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->where('reservas.delete', 0);
			$crud->set_table('reservas');
			
			$crud->set_relation_n_n('habitaciones', 'reserva_habitacion', 'habitaciones', 'id_reserva', 'id_habitacion', '{habitacion} - {id_hotel}', 'prioridad',  'delete = 0');
			
			$crud->columns(	'id_reserva',
							'habitaciones',
							'id_huesped',
							'entrada',
							'salida',
							'id_estado_reserva');
							
			$crud->display_as('id_reserva','ID')
				 ->display_as('id_habitacion','Habitación')
				 ->display_as('id_huesped','Huesped')
				 ->display_as('entrada','Entrada')
				 ->display_as('salida','Salida')
				 ->display_as('adultos','Adultos')				 
				 ->display_as('menores','Menores')
				 ->display_as('id_nota','Nota')
				 ->display_as('id_estado_reserva','Estado')
				 ->display_as('fecha_alta','Fecha alta');
			
			$crud->fields(	'id_huesped',
							'entrada',
							'salida',
							'adultos',
							'menores',
							'id_nota',
							'id_estado_reserva',
							'fecha_alta',
							'habitaciones');
			
			$crud->set_subject('reserva');
			
			$crud->field_type('fecha_alta', 'readonly');
			
			//$crud->set_relation('id_habitacion','habitaciones','habitacion');
			$crud->set_relation('id_huesped','huespedes','{apellido} {nombre}');
			$crud->set_relation('id_nota','notas','nota');
			$crud->set_relation('id_estado_reserva','estados_reserva','estado_reserva');		
						
			$crud->required_fields('id_habitacion','id_huesped','entrada', 'salida', 'adultos', 'menores');
			
			$_COOKIE['tabla']='reservas';
			$_COOKIE['id']='id_reserva';	
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));	
			
			$output = $crud->render();

			$this->_example_output($output);
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de reservas
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function reservas_nuevas(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->where('reservas.id_estado_reserva', 1);
			$crud->set_table('reservas');
			
			$crud->columns(	'id_reserva',
							'id_habitacion',
							'id_huesped',
							'entrada',
							'salida',
							'id_estado_reserva');
							
			$crud->display_as('id_reserva','ID')
				 ->display_as('id_habitacion','Habitación')
				 ->display_as('id_huesped','Huesped')
				 ->display_as('entrada','Entrada')
				 ->display_as('salida','Salida')
				 ->display_as('adultos','Adultos')				 
				 ->display_as('menores','Menores')
				 ->display_as('id_nota','Nota')
				 ->display_as('id_estado_reserva','Estado')
				 ->display_as('fecha_alta','Fecha alta')
				 ->display_as('fecha_modificacion','Última modificación') ;
			
			$crud->set_subject('reserva');
			
			$crud->set_relation('id_habitacion','habitaciones','habitacion');
			$crud->set_relation('id_huesped','huespedes','{apellido} {nombre}');
			$crud->set_relation('id_nota','notas','nota');
			$crud->set_relation('id_estado_reserva','estados_reserva','estado_reserva');
					
			$crud->required_fields('id_habitacion','id_huesped','entrada', 'salida', 'adultos', 'menores');
			
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
			
			$crud->callback_after_update(array($this, 'update_reserva'));
			
			$output = $crud->render();

			$this->_example_output($output);
	}



	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de disponibilidades
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function disponibilidades_abm(){
			$crud = new grocery_CRUD();
			
			$crud->where('disponibilidades.delete', 0);
			
			$crud->set_table('disponibilidades');
			
			$crud->set_relation_n_n('habitaciones', 'disponibilidad_habitacion', 'habitaciones', 'id_disponibilidad', 'id_habitacion', '{habitacion} - {id_hotel}', 'prioridad', 'delete = 0');
			
			$crud->columns(	'id_disponibilidad',
							'habitaciones',
							'disponibilidad',
							'entrada',
							'salida');
							
			$crud->display_as('id_disponibilidad','ID')
				 ->display_as('disponibilidad','Descripción')
				 ->display_as('entrada','Comienzo')
				 ->display_as('salida','Final')
				 ->display_as('habitaciones','Habitaciones');
			
			$crud->set_subject('cierre de ventas');
			
			$crud->fields('disponibilidad','entrada','salida', 'habitaciones');					
			$crud->required_fields('disponibilidad','entrada','salida', 'id_habitacion');
			
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('fecha_modificacion', 'readonly');
			
			$_COOKIE['tabla']='disponibilidades';
			$_COOKIE['id']='id_disponibilidad';	
			
			$crud->callback_after_insert(array($this, 'insert_log'));
			$crud->callback_after_update(array($this, 'update_log'));
			$crud->callback_delete(array($this,'delete_log'));	
			
			$output = $crud->render();

			$this->_example_output($output);
	}





/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Estados las reservas
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_reserva(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('estados_reserva');
			
			$crud->columns(	'id_estado_reserva',
							'estado_reserva', 
							'reserva_lugar');
			
			$crud->display_as('id_estado_reserva','ID')
				 ->display_as('estado_reserva','Estado')
				 ->display_as('reserva_lugar','Reserva lugar');
				 
			$crud->field_type('reserva_lugar', 'true_false');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();
			
			$_COOKIE['tabla']='estados_reserva';
			$_COOKIE['id']='id_estado_reserva';	
			
			$crud->callback_after_update(array($this, 'update_log'));
							
						
			$crud->required_fields('estado_reserva');
			
			$output = $crud->render();

			$this->_example_output($output);
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
	 
	    $this->db->insert('logs_reservas',$registro);
	 
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
 
    	$this->db->insert('logs_reservas',$registro);
 
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
 
    	$this->db->insert('logs_reservas',$registro);
			
    	return $this->db->update($_COOKIE['tabla'], array('delete' => 1), array($_COOKIE['id'] => $id));
	}

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Actulizar nuevas
 * 
 * ********************************************************************************
 **********************************************************************************/
	
	
	function actualizar_nuevas(){
		$cant_reservas=$this->reservas_model->getCantNuevas();	
		if($cant_reservas>0){
			$reservas=$this->reservas_model->getNuevas();
		
			foreach ($reservas as $reserva) {
				$id=$reserva->id_reserva;
				if($id>0){
					$reserva = array(
        				"id_reserva" => $this->input->post('id_reserva'.$id),
        				"id_estado_reserva" => $this->input->post('estado'.$id)
    				);	
				}else{
					//echo "cero";
				}
				
 
				$this->db->update('reservas', $reserva, array('id_reserva' => $id));
				$_COOKIE['tabla']='reservas';
				$_COOKIE['id']='id_reserva';
				
				$this->update_log($reserva, $id);
			}
				
		}
		redirect('admin/reserva/reservas_abm/success', 'refresh');		
	}
	
	
}