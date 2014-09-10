<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoteles extends CI_Controller {
	
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
		$this->load->model('imagenes_hotel_model');
		$this->load->model('monedas_model');
		$this->load->helper('main');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function galeria($id=NULL){
		if($id==NULL){
			$id=$this->input->post('id');
		}
		
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['habitaciones']=$this->hoteles_model->getHotel($id);
		$db['configs']=$this->configs_model->getConfigs();
		$db['emails_hotel']=$this->hoteles_email_model->getEmails(2);
								
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/hoteles/galeria');
		$this->load->view('frontend/footer');
		
	}
	
	public function habitaciones(){
		$db['texto']=$this->idiomas_model->getIdioma();
		
		$consulta=array('hotel'	=> 2);
		
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['hotel']=$this->hoteles_model->getHotel(2);
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones($consulta);
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['emails_hotel']=$this->hoteles_email_model->getEmails(2);
		
		if(!(isset($_COOKIE['moneda']))){
			$_COOKIE['moneda']=1;
		}
		
		$db['cambios']=$this->monedas_model->getMoneda($_COOKIE['moneda']);
		$db['configs']=$this->configs_model->getConfigs();
		$db['tipos_habitacion']=$this->tipos_habitacion_model->getTipos();
		$db['tipo_habitacion']=$this->tipos_habitacion_model->getTipo($this->input->post('tipo'));
		
				
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/hoteles/habitacion');
		$this->load->view('frontend/footer');
		
	}
	
	
	
}
