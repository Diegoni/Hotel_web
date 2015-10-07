<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Consulta extends My_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('hoteles_model');
		$this->load->model('mensajes_model');
		$this->load->model('configs_model');
		
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	
	public function envio(){
		$id_hotel		= $this->input->post('id_hotel');
		
		$db = $this->cargar_datos($id_hotel);
		
		$mensaje = array(	
			'titulo'			=> 'Consulta web',
			'fecha_envio' 		=> date("Y-m-d h:i:s"),
			'mensaje'			=> $this->input->post('consulta'),
			'emisor'			=> $this->input->post('email'),
			'nombre'			=> $this->input->post('nombre'),
			'apellido'			=> $this->input->post('apellido'),
			'telefono'			=> $this->input->post('telefono'),
			'id_tipo_mensaje'	=> 1,
			'id_estado_mensaje'	=> 1,
			'id_hotel'			=> $id_hotel
		);
		
		$db['mensajes']		= $this->mensajes_model->insertMensaje($mensaje);
		
		$hoteles = $this->hoteles_model->getHotel($id_hotel);
		
		foreach ($hoteles as $hotel) {
			$hotel = $hotel->hotel;
		}
		
		$mensaje['hotel'] = $hotel;
		$this->hoteles_email_model->correoMensaje($mensaje,1);
		$this->hoteles_email_model->correoMensaje($mensaje,2);
				
		$this->load_view($db, 'consulta/envio');		
	}



	public function email_habitacion(){
		$id_hotel = $this->input->post('id_hotel');
					
		$db = $this->cargar_datos($id_hotel);
		
		$mensaje = array(	
			'titulo'			=> 'Envió de habitacion ID: '.$this->input->post('id_habitacion'),
			'fecha_envio' 		=> date("Y-m-d h:i:s"),
			'mensaje'			=> $this->input->post('consulta'),
			'emisor'			=> $this->input->post('email'),
			'nombre'			=> $this->input->post('nombre'),
			'apellido'			=> $this->input->post('apellido'),
			'id_tipo_mensaje'	=> 2,
			'id_estado_mensaje'	=> 1,
			'id_hotel'			=> $id_hotel
		);
						
		$habitacion = array(	
			'habitacion'		=> $this->input->post('habitacion'),
			'id_habitacion'		=> $this->input->post('id_habitacion')
		);
		
		$db['mensajes']		= $this->mensajes_model->insertMensaje($mensaje);
		
		$hoteles	= $this->hoteles_model->getHotel($id_hotel);
		
		foreach ($hoteles as $hotel) {
			$hotel	= $hotel->hotel;
		}
		
		$mensaje['hotel']	= $hotel;
		$this->hoteles_email_model->correoHabitacion($mensaje, $habitacion, 1);
		$this->hoteles_email_model->correoHabitacion($mensaje, $habitacion, 2);
		
		$this->load_view($db, 'consulta/envio_habitacion');		
	}
	
}