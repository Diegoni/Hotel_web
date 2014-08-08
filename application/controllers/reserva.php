<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('habitaciones_model');
		$this->load->model('huespedes_model');
		$this->load->model('reservas_model');
		$this->load->model('notas_model');
		$this->load->model('ayudas_model');
		$this->load->model('configs_model');
		$this->load->model('tipos_habitacion_model');
		$this->load->model('imagenes_habitacion_model');
		$this->load->model('reserva_habitacion_model');
		$this->load->model('terminos_model');
		$this->load->helper('main');
		$this->load->helper('form');
      	$this->load->helper('url');
	}
	
	
	public function habitacion(){
		$consulta=array('entrada'=>$this->input->post('entrada'),
						'salida'=>$this->input->post('salida'),
						'adultos'=>$this->input->post('adultos'),
						'menores'=>$this->input->post('menores'),
						'hotel'=>$this->input->post('hotel'),						
						);
		
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['hotel']=$this->hoteles_model->getHotel($this->input->post('hotel'));
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones($consulta);
		$db['reservas']=$this->reservas_model->getReservas($consulta);
		$db['step']=2;
		$db['configs']=$this->configs_model->getConfigs();
		$db['tipos_habitacion']=$this->tipos_habitacion_model->getTipos();
		$db['tipo_habitacion']=$this->tipos_habitacion_model->getTipo($this->input->post('tipo'));
		
				
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/reserva/steps');
		$this->load->view('frontend/reserva/habitacion');
		$this->load->view('frontend/footer');
		
	}
	
	public function datos(){
		$consulta=array('entrada'=>$this->input->post('entrada'),
						'salida'=>$this->input->post('salida'),
						'adultos'=>$this->input->post('adultos'),
						'menores'=>$this->input->post('menores'),
						'hotel'=>$this->input->post('hotel'),						
						);
							
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['ayudas']=$this->ayudas_model->getAyuda('datos');
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones_post($consulta);
		$db['terminos']=$this->terminos_model->getTerminos();
		$db['step']=3;
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/reserva/ayuda');
		$this->load->view('frontend/reserva/steps');
		$this->load->view('frontend/reserva/datos');
		$this->load->view('frontend/footer');	
	}
	
	
	public function pago(){
		$db['hoteles']=$this->hoteles_model->getHoteles();
		$db['ayudas']=$this->ayudas_model->getAyuda('pagos');
		$db['step']=4;
		
		$huesped=array(	'nombre'=> $this->input->post('nombre'),
						'apellido'=> $this->input->post('apellido'),
						'email'=> $this->input->post('email'),
						'telefono'=> $this->input->post('telefono'),
						);
		
		$id_huesped=$this->huespedes_model->insertHuesped($huesped);
		
		if($this->input->post('nota')!=""){
			$nota=array('nota'=> $this->input->post('nota'));
			$id_nota=$this->notas_model->insertNota($nota);
		}else{
			$id_nota=0;
		}
		
		
		$array_entrada = explode("/", $this->input->post('entrada')); 
		$entrada=$array_entrada[2]."/".$array_entrada[1]."/".$array_entrada[0];
		$array_salida = explode("/", $this->input->post('salida')); 
		$salida=$array_salida[2]."/".$array_salida[1]."/".$array_salida[0];
		$fecha= date('Y-m-d H:i:s');		
		
		$reserva=array(	'entrada' => $entrada,
						'salida' => $salida,
						'adultos' => $this->input->post('adultos'),
						'menores' => $this->input->post('menores'),
						'id_huesped' => $id_huesped,
						'id_nota' => $id_nota,
						'id_estado_reserva'=> 1, 
						'fecha_alta' => $fecha,
						'fecha_modificacion' => $fecha
						);
						
		
		$id_reserva=$this->reservas_model->insertReserva($reserva);
		
		$consulta=array('entrada'=>$this->input->post('entrada'),
						'salida'=>$this->input->post('salida'),
						'adultos'=>$this->input->post('adultos'),
						'menores'=>$this->input->post('menores'),
						'hotel'=>$this->input->post('hotel'),						
						);
		
		
		$habitaciones=$this->habitaciones_model->getHabitaciones_post($consulta);
		$db['habitaciones']=$this->reserva_habitacion_model->insertReserva_habitacion($id_reserva, $habitaciones);
		$db['reservas']=$this->reserva_habitacion_model->getReserva($id_reserva);
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/reserva/ayuda');
		$this->load->view('frontend/reserva/steps');
		$this->load->view('frontend/reserva/pagos');
		$this->load->view('frontend/footer');
		
	}
}
