<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends My_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('hoteles_model');
		$this->load->model('mensajes_model');
		$this->load->model('articulos_model');
		$this->load->model('categorias_model');
		$this->load->model('tarifas_temporales_model');
		$this->load->model('modulos_idioma_model');
		$this->load->model('configs_model');
		
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function articulos($id, $id_hotel){
		$db = $this->cargar_datos($id_hotel);
		
		$datos = array(	
			'dato'			=> $id,
			'columna' 		=> 'id_categoria',
			'id_tipo'		=> 5
		);
		
		$db['articulos']	= $this->articulos_model->getArticulos($datos);
		$db['traducciones']	= $this->modulos_idioma_model->getTraducciones($db['articulos'], 2);
		$db['banner']		= $this->articulos_model->getBanner($datos);
		$db['categorias']	= $this->categorias_model->getCategoria($id);
		$db['t_categorias']	= $this->modulos_idioma_model->getTraducciones($db['categorias'], 4);
									
		$this->load_view($db, 'categoria/articulos');
	}
	
}
