<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('mensajes_model');
		$this->load->model('articulos_model');
		$this->load->model('categorias_model');
		$this->load->model('tarifas_temporales_model');
		$this->load->model('configs_model');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function articulos($id, $id_hotel){
			
		if($id_hotel==NULL){
			redirect('','refresh');
		}else{
			$_COOKIE['id_hotel']=$id_hotel;
		}
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['configs']=$this->configs_model->getConfigs();
		$datos=array(	'dato'=> $id,
						'columna' => 'id_categoria');
		$db['articulos']=$this->articulos_model->getArticulos($datos);
		$db['categorias']=$this->categorias_model->getCategoria($id);
		$db['emails_hotel']=$this->hoteles_email_model->getEmails($id_hotel);
		$db['hoteles']=$this->hoteles_model->getHoteles($id_hotel);
		$db['hoteles_menu']=$this->hoteles_model->getHotelesAll();
					
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/categoria/articulos');
		$this->load->view('frontend/footer');
		
	}
	
}
