<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habitacion extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('habitaciones_model');
		$this->load->model('huespedes_model');
		$this->load->model('reservas_model');
		$this->load->model('notas_model');
		$this->load->model('ayudas_model');
		$this->load->model('configs_model');
		$this->load->model('habitacion_servicio_model');
		$this->load->model('tipos_habitacion_model');
		$this->load->model('provincias_model');
		$this->load->model('imagenes_habitacion_model');
		$this->load->helper('main');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function view($id=NULL){
		if($id==NULL){
			$id=$this->input->post('id');
		}
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['habitaciones']=$this->habitaciones_model->getHabitacion($id);
		$db['servicios']=$this->habitacion_servicio_model->getServicios($id);
		$db['provincias']=$this->provincias_model->getProvincias('032');
		$db['configs']=$this->configs_model->getConfigs();
								
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_consulta');
		$this->load->view('frontend/habitacion/view');
		$this->load->view('frontend/footer');
		
	}
	
	
}
