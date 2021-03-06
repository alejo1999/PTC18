<?php
require_once("../../app/models/cupon.class.php");
try{
    if(isset($_GET['id'])){
        $cupon = new Cupon;
        if($cupon->setId($_GET['id'])){
            if($cupon->readCupones()){
                if(isset($_POST['actualizar'])){
                    $_POST = $cupon->validateForm($_POST);
                    if($cupon->setNombre($_POST['nombre'])){
                        if($cupon->setPrecio($_POST['precio'])){
                            if($cupon->setDescripcion($_POST['descripcion'])){

                                if($cupon->setExistencia($_POST['existencia'])){

                                    if($cupon->setFechainicio($_POST['fecha_inicio'])){
                                        if($cupon->setFechafinal($_POST['fecha_final'])){

                                            if($cupon->setcomercio($_POST['comercio'])){
                                                if($cupon->setLimite(isset($_POST['limite'])?1:0)){
                                                    if($cupon->setCategoria($_POST['categoria'])){
                                                        if($cupon->setEstado(isset($_POST['estado'])?1:0)){
                                                            if($cupon->updateCupon()){
                                                                Page::showMessage(1, "Cupon modificado", "index.php");
                                                            }else{
                                                                throw new Exception(Database::getException());
                                                            }
                                                        }else{
                                                            throw new Exception("Estado incorrecto");
                                                        }
                                                    }else{
                                                        throw new Exception("Seleccione una categoría");
                                                    }
                                                }else{
            
                                                }
                                            }else{
        
                                            }
                                        }else{
    
                                        }
                                    }else{

                                    }
                                    
                                }else{
                                    throw new Exception("existencia incorrecta");
                                }
                                
                            }else{
                                throw new Exception("Descripción incorrecta");
                            }
                        }else{
                            throw new Exception("Precio incorrecto");
                        }
                    }else{
                        throw new Exception("Nombre incorrecto");
                    }
                }
            }else{
                Page::showMessage(2, "Cupon inexistente", "index.php");
            }
        }else{
            Page::showMessage(2, "Cupon incorrecto", "index.php");
        }
    }else{
        Page::showMessage(3, "Seleccione cupon", "index.php");
    }
}catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/cupon/update_view.php");
?>