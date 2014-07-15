<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('imagenes_carrusel_model');
      	$this->load->helper('url');
	}
	

	public function index()
	{
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['imagenes_carrusel']=$this->imagenes_carrusel_model->getImagenes();
		

		$this->load->view('frontend/head');
		$this->load->view('frontend/menu', $db);
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/carousel');
		$this->load->view('frontend/hotel_descripcion');
		$this->load->view('frontend/banner');
		$this->load->view('frontend/footer');
	}
}
