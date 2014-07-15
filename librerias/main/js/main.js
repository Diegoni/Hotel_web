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