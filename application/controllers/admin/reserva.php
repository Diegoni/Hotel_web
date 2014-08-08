<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('menu');
		$this->load->model('reservas_model');
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
			$crud->set_table('reservas');
			
			$crud->set_relation_n_n('habitaciones', 'reserva_habitacion', 'habitaciones', 'id_reserva', 'id_habitacion', 'habitacion','prioridad');
			
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
				 ->display_as('fecha_alta','Fecha alta')
				 ->display_as('fecha_modificacion','Última modificación') ;
			
			$crud->set_subject('reserva');
			
			//$crud->set_relation('id_habitacion','habitaciones','habitacion');
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
 * 				Alta, baja y modificación de Estados las reservas
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_reserva(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('estados_reserva');
			
			$crud->columns(	'id_estado_reserva',
							'estado_reserva');
			
			$crud->display_as('id_estados_reserva','ID')
				 ->display_as('estado_reserva','Estado');
			
			$crud->set_subject('estado');
			$crud->unset_delete();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_read();			
						
			$crud->required_fields('estado_reserva');
			
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
	
	function update_reserva($datos, $id){
    	$reserva = array(
        	"id_reserva" => $id,
        	"fecha_modificacion" => date('Y-m-d H:i:s')
    	);
 
    	$this->db->update('reservas', $reserva, array('id_reserva' => $id));
 
    	return true;
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
			}
				
		}
		redirect('admin/reserva/reservas_abm/success', 'refresh');		
	}
	
	
}