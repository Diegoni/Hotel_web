<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('mensajes_model');
		$this->load->model('configs_model');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function envio(){
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['emails_hotel']=$this->hoteles_email_model->getEmails(2);
		$db['hoteles']=$this->hoteles_model->getHoteles(2);
		$db['configs']=$this->configs_model->getConfigs();
		
		$mensaje=array(	'titulo'=>'Consulta web',
						'fecha_envio' => date("Y-m-d h:i:s"),
						'mensaje'=>$this->input->post('consulta'),
						'emisor'=>$this->input->post('email'),
						'nombre'=>$this->input->post('nombre'),
						'apellido'=>$this->input->post('apellido'),
						'telefono'=>$this->input->post('telefono'),
						'id_tipo_mensaje'=>1,
						'id_estado_mensaje'=>1,
						'id_hotel'=>2);
		
		$db['mensajes']=$this->mensajes_model->insertMensaje($mensaje);
		$this->hoteles_email_model->correoMensaje($mensaje,1);
		$this->hoteles_email_model->correoMensaje($mensaje,2);
						
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/consulta/envio');
		$this->load->view('frontend/footer');
		
	}

	public function email_habitacion(){
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['emails_hotel']=$this->hoteles_email_model->getEmails(2);
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['configs']=$this->configs_model->getConfigs();
		
		$mensaje=array(	'titulo'=>'Envió de habitacion ID: '.$this->input->post('id_habitacion'),
						'fecha_envio' => date("Y-m-d h:i:s"),
						'mensaje'=>$this->input->post('consulta'),
						'emisor'=>$this->input->post('email'),
						'nombre'=>$this->input->post('nombre'),
						'apellido'=>$this->input->post('apellido'),
						'id_tipo_mensaje'=>2,
						'id_estado_mensaje'=>1,
						'id_hotel'=>2);
		$habitacion=array(	'habitacion'=>$this->input->post('habitacion'),
							'id_habitacion'=>$this->input->post('id_habitacion'));
		
		$db['mensajes']=$this->mensajes_model->insertMensaje($mensaje);
		$this->hoteles_email_model->correoHabitacion($mensaje, $habitacion, 1);
		$this->hoteles_email_model->correoHabitacion($mensaje, $habitacion, 2);
		
				
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/consulta/envio_habitacion');
		$this->load->view('frontend/footer');
		
	}
	
}
