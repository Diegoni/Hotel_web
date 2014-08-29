
/*****************************************************************************
 *****************************************************************************
 * Para trabajar con las Cookies
 *****************************************************************************
 ****************************************************************************/

function setCookie(cname,cvalue,exdays) {
	alert();
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user=getCookie("idioma");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
       user = prompt("Please enter your name:","");
       if (user != "" && user != null) {
           setCookie("idioma", user, 30);
       }
    }
}
/**************************************************************************
 **************************************************************************
 			Desabilitar la tecla f5
 ************************************************************************** 
 *************************************************************************/
 /*
 window.onload = function () {
        document.onkeydown = function (e) {
            return (e.which || e.keyCode) != 116;
        };
    }

/**************************************************************************
 **************************************************************************
 			Validar habitacion
 ************************************************************************** 
 *************************************************************************/

function validarHabitacion(){
	importe_total = 0;
	var idioma=getCookie("idioma");
	
	$(".habitacion").each(
		function(index, value) {
			importe_total = importe_total + eval($(this).val());
		}
	);
	
	if(importe_total==0){
		if(idioma==2){
			cadena="Make your selection";	
		}else if(idioma==3){
			cadena="Faites votre choix";	
		}else if(idioma==4){
			cadena="Faça sua seleção";	
		}else{
			cadena="Haga su selección";	
		}
		
		document.getElementById('habitaciones').innerHTML = cadena;
		$("#reservar").val(cadena);
		
		$('button[name="reservar"]').prop('disabled', true);
	}else{
		if(idioma==2){
			if(importe_total==1){
				habitacion=" room";
			}else{
				habitacion=" rooms";
			}	
			reservar="Book";
		}else if(idioma==3){
			if(importe_total==1){
				habitacion=" chambre";
			}else{
				habitacion=" chambres";
			}	
			reservar="Livre";	
		}else if(idioma==4){
			if(importe_total==1){
				habitacion=" quarto";
			}else{
				habitacion=" quartos";
			}	
			reservar="Livro";	
		}else{
			if(importe_total==1){
				habitacion=" habitación";
			}else{
				habitacion=" habitaciones";
			}
			reservar="Reservar";		
		}
		
		
		cadena= reservar+": "+importe_total+habitacion;
		document.getElementById('habitaciones').innerHTML = cadena;
		
   		$('button[name="reservar"]').prop('disabled', false);	
	}
	 	
}
    
 /**************************************************************************
 **************************************************************************
 			Ir arriba
 ************************************************************************** 
 *************************************************************************/
 
 $(document).ready(function(){
  
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
  
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
  
    });


 /**************************************************************************
 **************************************************************************
 			Favoritos
 ************************************************************************** 
 *************************************************************************/   



function agregar(){ 
//Para internet explorer
if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) { 
var url="http://www.tudireccion.com/"; //Cambia esta dirección por la de tu web
var titulo="El nombre de mi web"; //Cambia esta nombre por el de tu web
window.external.AddFavorite(url,titulo); 
} 
//Para Netscape y Firefox
else { 
if(navigator.appName == "Netscape") 
alert ("Presione Crtl+D para agregar a este sitio en sus Marcadores");  //Puedes personalizar este mensaje
} 
}

/**************************************************************************
 **************************************************************************
 			Mostrar title direrentes
 ************************************************************************** 
 *************************************************************************/

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});

/**************************************************************************
 **************************************************************************
 			Inicio del frontend
 ************************************************************************** 
 *************************************************************************/
$(document).ready(function(){
	$('.panel').hide();
	
	$('.panel').fadeIn( 1000 );
});

/**************************************************************************
 **************************************************************************
 			Inicio del backend
 ************************************************************************** 
 *************************************************************************/

$(document).ready(function(){
	$('.blockquote-primary').hide();
	$('.blockquote-success').hide();
	$('.blockquote-warning').hide();
	$('.blockquote-info').hide();
	$('.blockquote-default').hide();
	$('.aparecer').hide();
	
	
	$('.blockquote-primary').delay( 1000 ).fadeIn( 2000 );
	$('.blockquote-info').delay( 1000 ).fadeIn( 2000 );
	$('.blockquote-success').delay( 1000 ).fadeIn( 2000 );
	$('.blockquote-warning').delay( 1000 ).fadeIn( 2000 );
	$('.blockquote-default').delay( 1000 ).fadeIn( 2000 );
});



/**************************************************************************
 **************************************************************************
 			Mostrar y ocultar div
 ************************************************************************** 
 *************************************************************************/

$(document).ready(function(){
        $(".slidingDiv").hide();
        $(".show_hide").show();
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    });
 
});


/**************************************************************************
 **************************************************************************
 			Validador de formularios
 ************************************************************************** 
 *************************************************************************/


$(document).ready(function() {
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
		var $form = $(this).closest('form'),
            $group = $(this).closest('.input-group'),
			//$addon = $group.find('.input-group-addon'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('span'),
			state = false;
            
    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "email") {
			state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
		}else if($group.data('validate') == 'phone') {
			state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
		}else if ($group.data('validate') == "length") {
			state = $(this).val().length >= $group.data('length') ? true : false;
		}else if ($group.data('validate') == "number") {
			state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
		}

		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');
				$icon.attr('class', 'glyphicon glyphicon-ok');
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');
				$icon.attr('class', 'glyphicon glyphicon-remove');
		}
        
        if ($form.find('.input-group-addon.danger').length == 0) {
            $form.find('[type="submit"]').prop('disabled', false);
        }else{
            $form.find('[type="submit"]').prop('disabled', true);
        }
	});
    
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
    
    
});

/**************************************************************************
 **************************************************************************
 			Cambio de idioma en el seleccionar de fechas
 ************************************************************************** 
 *************************************************************************/
 
$(function($){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
});


/**************************************************************************
 **************************************************************************
 			Seleccionar fechas formulario de reserva
 ************************************************************************** 
 *************************************************************************/

$(function() {
    $( "#entrada" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      /*numberOfMonths: 2,*/
      minDate: 1, 
      maxDate: "+2M +15D", 
      onClose: function( selectedDate ) {
        $( "#salida" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#salida" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      /*numberOfMonths: 3,*/
      maxDate: "+4M +15D",
      onClose: function( selectedDate ) {
        $( "#entrada" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });



/**************************************************************************
 **************************************************************************
 			Carrusel
 ************************************************************************** 
 *************************************************************************/

$(document).ready(function() {
    $('.carousel').carousel({
        interval: 2000
    })
});

/**************************************************************************
 **************************************************************************
 			Desabilitar la tecla f5
 ************************************************************************** 
 *************************************************************************/

$(document).ready(function(){
     $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});