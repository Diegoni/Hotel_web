<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva extends My_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('aerolineas_model');
		$this->load->model('ayudas_model');
		$this->load->model('configs_model');
		$this->load->model('disponibilidades_model');
		$this->load->model('habitaciones_model');
		$this->load->model('hoteles_model');
		$this->load->model('hoteles_email_model');
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
		$this->load->model('modulos_idioma_model');
		
		$this->load->helper('main');
		$this->load->helper('form');		
	}
	
	
	public function habitacion(){
		$id_hotel = $this->input->post('hotel');
		
		$db = $this->cargar_datos($id_hotel);
		
		$consulta = array(
			'entrada'	=> $this->input->post('entrada'),
			'salida'	=> $this->input->post('salida'),
			'adultos'	=> $this->input->post('adultos'),
			'menores'	=> $this->input->post('menores'),
			'hotel'		=> $this->input->post('hotel'),						
		);
		
		$db['hotel']			= $this->hoteles_model->getHotel($this->input->post('hotel'));
		$db['habitaciones']		= $this->habitaciones_model->getHabitaciones($consulta);
		$db['traducciones']		= $this->modulos_idioma_model->getTraducciones($db['habitaciones'], 1);
		$db['reservas_habitacion'] = $this->reserva_habitacion_model->getReservas_habitacion($db['habitaciones'], $consulta);
		$db['disponibilidades']	=  $this->disponibilidades_model->getDisponibilidad($db['habitaciones'], $consulta);
		$db['tarifas']			= $this->tarifas_temporales_model->getTarifas($db['habitaciones'], $consulta);
		$db['step']				= 2;
		$db['monedas']			= $this->monedas_model->getMonedas();
		
		if(!(isset($_COOKIE['moneda'])))
		{
			$_COOKIE['moneda'] = 1;
		}
		
		$db['cambios']			= $this->monedas_model->getMoneda($_COOKIE['moneda']);
		$db['tipos_habitacion']	= $this->tipos_habitacion_model->getTipos();
		$db['tipo_habitacion']	= $this->tipos_habitacion_model->getTipo($this->input->post('tipo'));
		
		$this->load_view($db, 'reserva/habitacion');		
	}

	
	public function datos(){
		$id_hotel = $this->input->post('hotel');
		
		$db = $this->cargar_datos($id_hotel);
		
		$consulta = array(
			'entrada'		=> $this->input->post('entrada'),
			'salida'		=> $this->input->post('salida'),
			'adultos'		=> $this->input->post('adultos'),
			'menores'		=> $this->input->post('menores'),
			'hotel'			=> $this->input->post('hotel'),						
		);
		
		$db['habitaciones']	= $this->habitaciones_model->getHabitaciones_post($consulta);
		$db['tipos_tarjeta']= $this->tipos_tarjeta_model->getTipos();
		$db['terminos']		= $this->terminos_model->getTerminos();
		$db['aerolineas']	= $this->aerolineas_model->getAerolineas();
		$db['step']			= 3;
		
		
		$this->load_view($db, 'reserva/datos');	
	}
	
	
	public function pago(){
		$id_hotel = $this->input->post('hotel');
		
		$db = $this->cargar_datos($id_hotel);		
		
		$db['step']			= 4;
		
		$huesped = array(	
			'nombre'		=> $this->input->post('nombre'),
			'apellido'		=> $this->input->post('apellido'),
			'email'			=> $this->input->post('email'),
			'telefono'		=> $this->input->post('telefono'),
		);
		
		$id_huesped = $this->huespedes_model->insertHuesped($huesped);
		
		if($this->input->post('nota') != ""){
			$nota		= array('nota'=> $this->input->post('nota'));
			$id_nota	= $this->notas_model->insertNota($nota);
		} else {
			$id_nota	= 0;
		}
		
		$array_vencimiento	= explode("/", $this->input->post('vencimiento')); 
		//$vencimiento		= $array_vencimiento[2]."/".$array_vencimiento[1]."/".$array_vencimiento[0];
		$vencimiento		= $array_vencimiento[1]."/".$array_vencimiento[0]."/1";
		
		$tarjeta = array(	
			'id_huesped'		=> $id_huesped,
			'id_tipo_tarjeta'	=> $this->input->post('tipo_tarjeta'),
			'tarjeta'			=> $this->input->post('tarjeta'),
			'pin'				=> $this->input->post('pin'),
			'vencimiento'		=> $vencimiento
		);
		
		$id_tarjeta		= $this->tarjetas_model->insertTarjeta($tarjeta);
		
		$tipos_tarjetas	= $this->tipos_tarjeta_model->getTipo($this->input->post('tipo_tarjeta'));
			
		foreach ($tipos_tarjetas as $tipo) {
			$tarjeta['tipo_tarjeta'] = $tipo->tipo_tarjeta;
		}
				
		$array_entrada	= explode("/", $this->input->post('entrada')); 
		$entrada		= $array_entrada[2]."/".$array_entrada[1]."/".$array_entrada[0];
		$array_salida	= explode("/", $this->input->post('salida')); 
		$salida			= $array_salida[2]."/".$array_salida[1]."/".$array_salida[0];
		$fecha			= date('Y-m-d H:i:s');		
		
		$consulta = array(
			'entrada'		=> $this->input->post('entrada'),
			'salida'		=> $this->input->post('salida'),
			'adultos'		=> $this->input->post('adultos'),
			'menores'		=> $this->input->post('menores'),
			'hotel'			=> $this->input->post('hotel'),						
		);
		
		$habitaciones	= $this->habitaciones_model->getHabitaciones_post($consulta);
		
		$total = 0;	
		
		foreach ($habitaciones as $key => $value) {
			$total = $total + $this->input->post('precio'.$key) * $value;
			$precios_array[$key] = $this->input->post('precio'.$key); 
		}
				
		$reserva = array(	
			'entrada'			=> $entrada,
			'salida'			=> $salida,
			'adultos'			=> $this->input->post('adultos'),
			'menores'			=> $this->input->post('menores'),
			'id_huesped'		=> $id_huesped,
			'id_nota'			=> $id_nota,
			'id_estado_reserva'	=> 1, 
			'total'				=> $total,
			'fecha_alta'		=> $fecha
		);
						
		
		$id_reserva		= $this->reservas_model->insertReserva($reserva);
		
		
		if("" !== $this->input->post('nro_de_vuelo') || "" !== $this->input->post('horario_llegada'))
		{/*
			echo $this->input->post('horario_llegada');
			$vuelo=array(
				'id_huesped'		=> $id_huesped,
				'nro_vuelo' 		=> $this->input->post('nro_de_vuelo'),
				'id_reserva'		=> $id_reserva,
				'horario_llegada'	=> $this->input->post('horario_llegada'),
				'id_aerolinea' 		=> $this->input->post('aerolinea')
			);
		
			$id_vuelo	= $this->vuelos_model->insertVuelo($vuelo);
			$aerolineas	= $this->aerolineas_model->getAerolinea($this->input->post('aerolinea'));
			
			foreach ($aerolineas as $aerolinea) {
				$vuelo['aerolinea'] = $aerolinea->aerolinea;
			}
		*/
			$vuelo = array();
		}else{
			$vuelo = array();
		}
				
		$db['habitaciones']	= $this->reserva_habitacion_model->insertReserva_habitacion($id_reserva, $habitaciones);
		$db['reservas']		= $this->reserva_habitacion_model->getReserva($id_reserva);
									
		$this->hoteles_email_model->correoReserva($huesped, $tarjeta, $this->reserva_habitacion_model->getReserva($id_reserva), $precios_array, $vuelo, 1);
		//$this->hoteles_email_model->correoReserva($huesped, $tarjeta, $this->reserva_habitacion_model->getReserva($id_reserva), $precios_array, $vuelo, 2);
		
		$db['mensaje']		= $this->hoteles_email_model->correoReserva($huesped, $tarjeta, $this->reserva_habitacion_model->getReserva($id_reserva), $precios_array, $vuelo, 2);
		
		$this->load_view($db, 'reserva/pagos');	
	}

	
	public function cambiar_moneda($id_moneda = NULL)
	{
		setcookie("moneda", $id_moneda, time()+3600);
		echo '<script>javascript:window.history.back();</script>';
	}
	
	
	public function cambiar_idioma($id_idioma=NULL)
	{
		setcookie("idioma", $id_idioma, time()+3600);
		echo '<script>javascript:window.history.back();</script>';
	}
}
