<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('mensajes_model');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function envio(){
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['hoteles']=$this->hoteles_model->getHoteles();
		
		$mensaje=array(	'titulo'=>'Consulta web',
						'fecha_envio' => date("Y-m-d h:i:s"),
						'mensaje'=>$this->input->post('consulta'),
						'emisor'=>$this->input->post('email'),
						'id_tipo_mensaje'=>1,
						'id_estado_mensaje'=>1);
		
		$db['mensajes']=$this->mensajes_model->insertMensaje($mensaje);
				
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/consulta/ayuda');
		$this->load->view('frontend/consulta/envio');
		$this->load->view('frontend/footer');
		
	}
	
}
