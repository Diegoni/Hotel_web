<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('articulos_model');
		$this->load->model('imagenes_carrusel_model');
		$this->load->model('habitaciones_model');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	

	public function index(){
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['imagenes_carrusel']=$this->imagenes_carrusel_model->getImagenes();
		$db['articulos']=$this->articulos_model->getArticulos();
		$db['cantidad_categorias']=$this->articulos_model->getCategorias();
		

		$this->load->view('frontend/head' , $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/carousel');
		//$this->load->view('frontend/hotel_descripcion');
		//$this->load->view('frontend/banner');
		$this->load->view('frontend/footer');
	}

}
