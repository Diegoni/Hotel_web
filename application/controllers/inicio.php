<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
			parent::__construct();
      		$this->load->helper('url');
	}
	

	public function index()
	{
		$this->load->view('frontend/head');
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/carousel');
		$this->load->view('frontend/hotel_descripcion');
		$this->load->view('frontend/banner');
		$this->load->view('frontend/footer');
	}
}
