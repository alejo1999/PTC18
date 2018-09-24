$.extend( true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false
} );
 
 
$(document).ready(function() {
    $('#mi_tabla').DataTable();
} );