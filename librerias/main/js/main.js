$(document).ready(function(){
	$('.blockquote-primary').hide();
	$('.blockquote-success').hide();
	$('.blockquote-warning').hide();
	$('.blockquote-info').hide();
	$('.blockquote-default').hide();
	$('.aparecer').hide();
	
	$('.aparecer').fadeIn( 2000 );
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
