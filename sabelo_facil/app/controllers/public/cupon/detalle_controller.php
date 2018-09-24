<?php
require_once("../../app/models/cupon.class.php");
require_once("../../app/models/venta.class.php");
require_once("../../app/models/carritocupon.class.php");
//require_once("config.php");
require_once("../../app/libraries/Pagadito.php");
try{
	if(isset($_GET['id'])){

		$cupon = new Cupon;
		
        $carritocupon = new Detallecupones;
        
		if($cupon->setId($_GET['id'])){
			if($cupon->readCupones()){
                require_once("../../app/views/public/cupon/detalle_view.php");
			}else{
				throw new Exception("Cupon inexistente");
			}
		}else{
			throw new Exception("Cupon incorrecto");
		}
	}else{
		throw new Exception("Seleccione Cupon");
	}

	
	if(isset($_POST['anadircarrito'])){
		$_POST = $carritocupon->validateForm($_POST);
		if($carritocupon->setCliente($_SESSION['id_cliente'])){
			if($carritocupon->setid_cupon($_GET['id'])){
				
					if($carritocupon->setCantidad($_POST['cantidad'])){
						$subtotalito = (($carritocupon->getCantidad())*($cupon->getPrecio()));
						
						if($carritocupon->setSubtotal($subtotalito)){
							// $carritocuponlleno = $carritocupon->validar_repetido();
							// if($carritocuponlleno){
							// 	Page::showMessage(3,"Este producto ya existe en su carrito solo se aumentara la cantidad seleccionada ",null);
							// 	if($carritocupon->validar_repetido2()){
							// 		$cantidadnueva = (($carritocupon->getCantidad())+($_POST['cantidad']));
							// 		$subtotalnuevo = (($cantidadnueva)*($cupon->getPrecio()));
							// 		if($carritocupon->setCantidad($cantidadnueva)){
							// 			if($carritocupon->setSubtotal($subtotalnuevo)){
							// 				if($carritocupon->modificarrepetido()){
							// 					Page::showMessage(1,"Este producto ya existe en su carrito solo se aumentara la cantidad seleccionada","carrito.php");
							// 					alert("producto añadido repetido");
							// 				}else{
							// 					Page::showMessage(2,"ocurrio un problema al modificar producto en el carrito",null);
							// 				}
							// 			}else{
							// 				Page::showMessage(2,"nuevo Subtotal incorrecto",null);
							// 			}
							// 		}else{
							// 			Page::showMessage(2,"nueva cantidad incorrecto",null);
							// 		}
							// 	}else{
							// 		Page::showMessage(2,"Error al obtener cantidad anterior",null);
							// 	}
							// }else{

								$correlativocupon = $cupon->getAbreviatura();
								echo($correlativocupon);
								echo("<br>");
								if($carritocupon->setCorrelativo($correlativocupon)){

									 $data = $carritocupon->checkcorrelativo();

									 $correlativonuevo1 = count($data);

										echo($correlativonuevo1);
										
										echo("<br>");

										$correlativonuevo2 = $correlativonuevo1 + 1;
										echo($correlativonuevo2);
										echo("<br>");
										$corf = $correlativocupon.$correlativonuevo2;

										echo($corf);

										if($carritocupon->setCorrelativo($corf)){
											if($carritocupon->createcarrito()){
												Page::showMessage(1, "Cupon añadido correctamente", null);
											}else{
												Page::showMessage(2,"producto no agregado al carrito x",null);
											}
										}else{

										}

									
									

									
								}else{

								}


								


								
							// }
						}else{
							Page::showMessage(2,"Subtotal incorrecto",null);
						}
					}else{
						Page::showMessage(2,"La cantidad Seleccionada es incorrecta",null);
					}
				
			}else{
				Page::showMessage(3,"Por favor selecciona  un producto",null);
			}
		}else{
			Page::showMessage(2, "No esta iniciada la sesion",null);
		}
	}


}catch(Exception $error){
	Page::showMessage(3, $error->getMessage(), "index.php");
}
?>