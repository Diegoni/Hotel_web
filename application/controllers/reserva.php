<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('aerolineas_model');
		$this->load->model('ayudas_model');
		$this->load->model('configs_model');
		$this->load->model('disponibilidades_model');
		$this->load->model('habitaciones_model');
		$this->load->model('hoteles_model');
		$this->load->model('huespedes_model');
		$this->load->model('imagenes_habitacion_model');
		$this->load->model('monedas_model');
		$this->load->model('notas_model');
		$this->load->model('reserva_habitacion_model');
		$this->load->model('reservas_model');
		$this->load->model('tarifas_temporales_model');
		$this->load->model('tarjetas_model');
		$this->load->model('terminos_model');
		$this->load->model('tipos_habitacion_model');
		$this->load->model('tipos_tarjeta_model');
		$this->load->model('vuelos_model');
		$this->load->helper('main');
		$this->load->helper('form');		
	}
	
	
	public function habitacion(){
		$id_hotel=$this->input->post('hotel');
		
		if($id_hotel==NULL){
			 redirect('','refresh');
		}else{
			$_COOKIE['id_hotel']=$id_hotel;
		}
		
		
		$db['texto']=$this->idiomas_model->getIdioma();
		
		$consulta=array(
			'entrada'	=> $this->input->post('entrada'),
			'salida'	=> $this->input->post('salida'),
			'adultos'	=> $this->input->post('adultos'),
			'menores'	=> $this->input->post('menores'),
			'hotel'		=> $this->input->post('hotel'),						
		);
		
		$db['hoteles']=$this->hoteles_model->getHoteles($id_hotel);
		$db['hoteles_menu']=$this->hoteles_model->getHotelesAll();
		$db['hotel']=$this->hoteles_model->getHotel($this->input->post('hotel'));
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones($consulta);
		$db['reservas_habitacion']=$this->reserva_habitacion_model->getReservas_habitacion($db['habitaciones'], $consulta);
		$db['disponibilidades']=$this->disponibilidades_model->getDisponibilidad($db['habitaciones'], $consulta);
		$db['tarifas']=$this->tarifas_temporales_model->getTarifas($db['habitaciones'], $consulta);
		$db['step']=2;
		$db['monedas']=$this->monedas_model->getMonedas();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['emails_hotel']=$this->hoteles_email_model->getEmails($id_hotel	);
		
		if(!(isset($_COOKIE['moneda']))){
			$_COOKIE['moneda']=1;
		}
		
		$db['cambios']=$this->monedas_model->getMoneda($_COOKIE['moneda']);
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
		$id_hotel=$this->input->post('hotel');
		
		if($id_hotel==NULL){
			redirect('','refresh');
		}else{
			$_COOKIE['id_hotel']=$id_hotel;
		}
		
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$consulta=array(
			'entrada'		=> $this->input->post('entrada'),
			'salida'		=> $this->input->post('salida'),
			'adultos'		=> $this->input->post('adultos'),
			'menores'		=> $this->input->post('menores'),
			'hotel'			=> $this->input->post('hotel'),						
		);
							
		$db['hoteles']=$this->hoteles_model->getHoteles($id_hotel);
		$db['hoteles_menu']=$this->hoteles_model->getHotelesAll();
		$ayuda=array(
			'sector' 		=> 'datos',
			'id_idioma' 	=> $_COOKIE['idioma']
		);
		
		$db['ayudas']=$this->ayudas_model->getAyuda($ayuda);
		$db['habitaciones']=$this->habitaciones_model->getHabitaciones_post($consulta);
		$db['tipos_tarjeta']=$this->tipos_tarjeta_model->getTipos();
		$db['terminos']=$this->terminos_model->getTerminos();
		$db['aerolineas']=$this->aerolineas_model->getAerolineas();
		$db['emails_hotel']=$this->hoteles_email_model->getEmails($id_hotel);
		$db['step']=3;
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/reserva/ayuda');
		$this->load->view('frontend/reserva/steps');
		$this->load->view('frontend/reserva/datos');
		$this->load->view('frontend/footer');	
	}
	
	
	public function pago(){
		$id_hotel=$this->input->post('hotel');
		
		if($id_hotel==NULL){
			redirect('','refresh');
		}else{
			$_COOKIE['id_hotel']=$id_hotel;
		}
		
		$db['texto']=$this->idiomas_model->getIdioma();
		$db['idiomas']=$this->idiomas_model->getIdiomas();
		$db['hoteles']=$this->hoteles_model->getHoteles($id_hotel);
		$db['hoteles_menu']=$this->hoteles_model->getHotelesAll();
		
		$ayuda=array(
			'sector' 		=> 'pagos',
			'id_idioma' 	=> $_COOKIE['idioma']
		);
		
		$db['ayudas']=$this->ayudas_model->getAyuda($ayuda);
		$db['emails_hotel']=$this->hoteles_email_model->getEmails($id_hotel);
		$db['step']=4;
		
		$huesped=array(	
			'nombre'		=> $this->input->post('nombre'),
			'apellido'		=> $this->input->post('apellido'),
			'email'			=> $this->input->post('email'),
			'telefono'		=> $this->input->post('telefono'),
		);
		
		$id_huesped=$this->huespedes_model->insertHuesped($huesped);
		
		if($this->input->post('nota')!=""){
			$nota=array('nota'=> $this->input->post('nota'));
			$id_nota=$this->notas_model->insertNota($nota);
		}else{
			$id_nota=0;
		}
		
		$tarjeta=array(	
			'id_huesped' 	=> $id_huesped,
			'id_tipo_tarjeta'=> $this->input->post('tipo_tarjeta'),
			'tarjeta' 		=> $this->input->post('tarjeta'),
			'pin' 			=> $this->input->post('pin'),
			'vencimiento' 	=> $this->input->post('vencimiento')
		);
		
		$id_tarjeta=$this->tarjetas_model->insertTarjeta($tarjeta);
				
		$array_entrada = explode("/", $this->input->post('entrada')); 
		$entrada=$array_entrada[2]."/".$array_entrada[1]."/".$array_entrada[0];
		$array_salida = explode("/", $this->input->post('salida')); 
		$salida=$array_salida[2]."/".$array_salida[1]."/".$array_salida[0];
		$fecha= date('Y-m-d H:i:s');		
		
		$reserva=array(	
			'entrada' 		=> $entrada,
			'salida' 		=> $salida,
			'adultos'		=> $this->input->post('adultos'),
			'menores' 		=> $this->input->post('menores'),
			'id_huesped' 	=> $id_huesped,
			'id_nota' 		=> $id_nota,
			'id_estado_reserva'=> 1, 
			'fecha_alta' 	=> $fecha
		);
						
		
		$id_reserva=$this->reservas_model->insertReserva($reserva);
		
		$consulta=array(
			'entrada'		=> $this->input->post('entrada'),
			'salida'		=> $this->input->post('salida'),
			'adultos'		=> $this->input->post('adultos'),
			'menores'		=> $this->input->post('menores'),
			'hotel'			=> $this->input->post('hotel'),						
		);
		
		if(null !== $this->input->post('nro_de_vuelo') || null !== $this->input->post('horario_llegada')){
			$vuelo=array(
				'id_huesped'	=> $id_huesped,
				'nro_vuelo' 	=> $this->input->post('nro_de_vuelo'),
				'id_reserva'	=> $id_reserva,
				'horario_llegada'=> $this->input->post('horario_llegada'),
				'id_aerolinea' 	=> $this->input->post('aerolinea')
			);
		
			$id_vuelo=$this->vuelos_model->insertVuelo($vuelo);
		}else{
			$vuelo =array();
		}
		
		$habitaciones=$this->habitaciones_model->getHabitaciones_post($consulta);
		$db['habitaciones']=$this->reserva_habitacion_model->insertReserva_habitacion($id_reserva, $habitaciones);
		$db['reservas']=$this->reserva_habitacion_model->getReserva($id_reserva);
		$this->hoteles_email_model->correoReserva($huesped, $tarjeta, $this->reserva_habitacion_model->getReserva($id_reserva), $vuelo, 1);
		$this->hoteles_email_model->correoReserva($huesped, $tarjeta, $this->reserva_habitacion_model->getReserva($id_reserva), $vuelo, 2);
		
		$this->load->view('frontend/head', $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/reserva/ayuda');
		$this->load->view('frontend/reserva/steps');
		$this->load->view('frontend/reserva/pagos');
		$this->load->view('frontend/footer');

	}
	
	public function cambiar_moneda($id_moneda=NULL){
		setcookie("moneda", $id_moneda, time()+3600);
		echo '<script>javascript:window.history.back();</script>';

	}
	
	public function cambiar_idioma($id_idioma=NULL){
		setcookie("idioma", $id_idioma, time()+3600);
		echo '<script>javascript:window.history.back();</script>';

	}
}
