<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Habitacion extends My_Controller {
	
	function __construct()
	{
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
		$this->load->model('modulos_idioma_model');
		$this->load->model('monedas_model');
		
		$this->load->helper('main');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function view($id=NULL, $id_hotel=NULL){
		$db = $this->cargar_datos($id_hotel);
				
		if($id	== NULL){
			$id	= $this->input->post('id');
		}
		
		$db['habitaciones']	= $this->habitaciones_model->getHabitacion($id);
		$db['traducciones']	= $this->modulos_idioma_model->getTraducciones($db['habitaciones'], 1);
		$db['servicios']	= $this->habitacion_servicio_model->getServicios($id);
		$db['t_servicios']	= $this->modulos_idioma_model->getTraducciones($db['servicios'], 5);
		$db['provincias']	= $this->provincias_model->getProvincias('032');
		
		$this->load_view($db, 'habitacion/view');
	}
	
	public function galeria($id=NULL, $id_hotel=NULL){		
		$db = $this->cargar_datos($id_hotel);
		
		$db['habitaciones']	= $this->habitaciones_model->getHabitacion($id);
		$db['servicios']	= $this->habitacion_servicio_model->getServicios($id);
	
		$this->load_view($db, 'habitacion/galeria');
	}
}