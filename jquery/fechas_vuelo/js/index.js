$(function(){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
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

    $("input").checkboxradio();
    $( "#radio-1" ).on( "change", function() {
        $("#calendar").empty();
        $("#calendar").append($("<p>").text("Fecha de Salida:").append($("<input>").attr("id", "datepicker")));
        $("#datepicker").datepicker({ minDate: +1, maxDate: "+1M" });
    });
    
    $( "#radio-2" ).on( "change", function() {
        $("#calendar").empty();
        $("#calendar").append($("<p>").text("Fecha de Salida:").append($("<input>").attr("id", "datepickerIda")));
        $("#calendar").append($("<p>").text("Fecha de Vuelta:").append($("<input>").attr("id", "datepickerVuelta")));
        $("#datepickerIda").datepicker({ minDate: +1, maxDate: "+1M" });
        $("#datepickerVuelta").datepicker();

    });
});