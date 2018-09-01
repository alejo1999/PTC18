<?php
require_once("../../app/models/carrito.class.php");
try{
    $detalle = new Detalle;
        if(empty($_SESSION['id_cliente'])){
            Page::showMessage(4, "Inicia Sesion para poder ver tu carrito de compra",null);
        }else{
            if($detalle->setCliente($_SESSION['id_cliente'])){
                $carrito = $detalle->viewcarrito();
                if($carrito){
                    if($detalle->checkTotal()){
                        if(isset($_POST['pagofinal'])){
                            $_POST = $detalle->validateForm($_POST);
                            if($detalle->setCliente($_SESSION['id_cliente'])){
                                if($detalle->realizarcompra()){
                                    if($detalle->ventasactuales()){
                                        $newventa = ($detalle->getNventas());
                                        if($detalle->setId_venta($newventa)){
                                            if($detalle->setCliente($_SESSION['id_cliente'])){
                                                if($detalle->actualizarventa()){
                                                    Page::showMessage(1, "Compra realizada exitosamente","../../dashboard/Reportes/factura_public.php?nombre=$_SESSION[nombre]&apellido=$_SESSION[apellido]");
                                                }else{
                                                    Page::showMessage(2, "La Compra no se puede realizar",null);
                                                }
                                            }else{
                                                Page::showMessage(3, "Debe de Iniciar sesion",null);
                                            }
                                        }else{
                                            Page::showMessage(2, "Error al obtener el numero de venta",null);
                                        }
                                    }   
                                }else{
                                    Page::showMessage(2, "Error al obtener los datos del cliente ",null);
                                }
                            }else{

                            }
                            
                        }
                    }else{
                        Page::showMessage(2, "Error al obtener el total de la comprar",null);
                    }
                }else{
                    Page::showMessage(2, "Carrito vacio","index.php");
                }
            }else{
                Page::showMessage(3, "Inicia sesion",null);
            }
        }

}catch(Exception $error){
    Page::showMessage(3, $error->getMessage(), "index.php");
}
require_once("../../app/views/public/producto/carrito_view.php");
?>