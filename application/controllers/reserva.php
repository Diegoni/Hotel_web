<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('habitaciones_model');
		$this->load->model('paises_model');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function habitacion(){
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones();
		$reserva=array(	'entrada' => $this->input->post('entrada'),
						'salida' => $this->input->post('salida'),
						'adultos' => $this->input->post('adultos'),
						'menores' => $this->input->post('menores'),
						);		
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/reserva/habitacion');
		$this->load->view('frontend/reserva/modal_habitaciones');
		$this->load->view('frontend/footer');
		
	}
	
	public function datos(){
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones();
		$db['paises']=$this->paises_model->getPaises();
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/reserva/ayuda');
		$this->load->view('frontend/reserva/datos');
		$this->load->view('frontend/footer');
		
	}
	
	public function pago(){
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones();
		$db['paises']=$this->paises_model->getPaises();
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/reserva/ayuda');
		$this->load->view('frontend/reserva/datos');
		$this->load->view('frontend/footer');
		
	}
}
