<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Inicio extends My_Controller {
	
	protected $_subject		= 'alarmas';
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('hoteles_model');
		$this->load->model('articulos_model');
		$this->load->model('categorias_model');
		$this->load->model('direcciones_hotel_model');
		$this->load->model('imagenes_carrusel_model');
		$this->load->model('habitaciones_model');
		$this->load->model('configs_model');
		$this->load->model('tipos_habitacion_model');
		$this->load->model('modulos_idioma_model');
		$this->load->model('configs_model');
		
		$this->load->helper('form');
		$this->load->helper('main');
		$this->load->helper('url');
	}
	
	
	public function index(){
		$db['hoteles']		= $this->hoteles_model->getHotelesIntro();
		$db['direcciones']	= $this->direcciones_hotel_model->getDirecciones();
		
		if($this->uri->segment(1) == ""){
			$db['texto']	= $this->idiomas_model->getIdioma('es');	
		} else {
			$db['texto']	= $this->idiomas_model->getIdioma($this->uri->segment(1));
		}
		
		$this->load->view('frontend/intro_carollo', $db);
	}
	

	public function hotel($id_hotel = NULL){
		$db = $this->cargar_datos($id_hotel);
		
		$db['imagenes_carrusel']	= $this->imagenes_carrusel_model->getImagenes($_COOKIE['id_hotel']);
		$db['articulos']			= $this->articulos_model->getArticulos_paginaprincipal($_COOKIE['id_hotel']);
		$db['traducciones']			= $this->modulos_idioma_model->getTraducciones($db['articulos'], 2);
		$db['cantidad_categorias']	= count($db['articulos']);
		$db['configs_articulos']	= $this->configs_model->getConfigArticulos();
		$db['tipos_habitacion']		= $this->tipos_habitacion_model->getTipos();
		$db['categorias']			= $this->categorias_model->getCategorias($_COOKIE['id_hotel']);
		$db['t_categorias']			= $this->modulos_idioma_model->getTraducciones($db['categorias'], 4);
		
		$this->load->view('frontend/head' , $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/carousel');
		//$this->load->view('frontend/hotel_descripcion');
		$this->load->view('frontend/banner');
		$this->load->view('frontend/footer');
	}
}