<?php
require_once("../../app/models/carrito.class.php");
try{
	//cantidad de registros por página
	// $por_pagina=4;
	// if (isset($_GET["pagina"])) {
	// $pagina = $_GET["pagina"];
	// }
	// else {
	// $pagina=1;
	// }
	// la pagina inicia en 0 y se multiplica $por_pagina
	// $empieza = ($pagina-1) * $por_pagina;
	
	$carrito = new Detalle;
	if(isset($_GET['id'])){
		if($carrito->setId_venta($_GET['id'])){
            if($carrito->setCliente($_SESSION['id_cliente'])){
                $carritos = $carrito->detalle_venta();
                if($carritos){
                    if($carrito->checkTotalventa()){
                        require_once("../../app/views/public/account/detalle_venta_view.php");

                    }else{

                    }
                }else{
                    Page::showMessage(3,"no hay productos a mostrar","../productos/index.php");
                }
            }else{
                Page::showMessage(3,"Inicia sesion","../cuenta/acceder.php");

            }
		}else{
			throw new Exception("Compra incorrecta");
		}
	}else{
		throw new Exception("Seleccione compra");
	}
}catch(Exception $error){
	Page::showMessage(3, $error->getMessage(), "index.php");
}
?>