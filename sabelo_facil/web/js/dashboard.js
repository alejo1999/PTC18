$(document).ready(function(){
    $('.button-collapse').sideNav();
    $('.dropdown-button').dropdown();
    $('.materialboxed').materialbox();
    $('select').material_select();
    $('.tooltipped').tooltip({delay: 50, position: 'bottom'});
    
    $('.datepicker').pickadate({
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vir', 'Sab'],
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Hoy',
        max: 'Today',
        clear: 'Limpiar',
        close: 'Aceptar',
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: false ,// Close upon selecting a date,
        container: undefined, // ex. 'body' will append picker to body
        
      });
});


//Editar el SIDE NAV DE MATERIALIZE
$(document).ready(function(){
    $(".button-collapse").sideNav();
  $('.button-collapse').sideNav({
      menuWidth: 350, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, 
      draggable: true, 
      onOpen: function(el) {  }, 
    }
  );
        
  });


  function cerrar_sesion(){
    window.location.href='../../dashboard/account/logout.php';
  }
