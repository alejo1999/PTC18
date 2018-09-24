<?php
require_once("../../app/models/venta.class.php");
try{
    $ventas = new Venta;

    if(isset($_SESSION['id_cliente'])){
        if($ventas->setCliente($_SESSION['id_cliente'])){
            
                $ventasrealizadas = $ventas->ventasrealizadas();

                if($ventasrealizadas){
                    require_once("../../app/views/public/account/comprasrealizadas_view.php");
                }else{
                    Page::showMessage(2,"No tienes compras realizadas","../cuenta/acceder.php");

                }
        }else{
            Page::showMessage(2,"Necesitamos que estes logeado","../cuenta/acceder.php");
        }

     
    }else{
        Page::showMessage(2,"necesitas iniciar sesion","../cuenta/acceder.php");
    }
    
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
?>