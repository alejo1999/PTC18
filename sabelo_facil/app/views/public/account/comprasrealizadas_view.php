<div class="container">

    <h3 class="center" >Compras Realizadas </h3>

<div class="row">

<?php
foreach($ventasrealizadas as $ventas2){
    print("

    <div  class='col s12 m6 l4 text-black'>
        <div id='ventas' class='card  '>
            <div id='ventas' class='card-content white-text'>
            <span class='card-title'>Número de items : $ventas2[items]</span>
            <h5 class='black-text'>Fecha : $ventas2[fecha]</h5>
            </div>
            <div id='venta' class='card-action center'>
            <a class ='white-text ' href='miscompras.php?id=$ventas2[ID_venta]'>Ver Productos</a>
            </div>
        </div>
    </div>
    
    ");

}

?>


</div>

</div>