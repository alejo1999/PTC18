<?php
require_once("../../app/models/cupon.class.php");
try{
	$cupon = new Cupon;
        if(isset($_GET['id'])){

            if($cupon->setId($_GET['id'])){
                    $data = $cupon->getImgcupon();
                    $cuponid = $cupon->getId();
                if($data){
                    require_once("../../app/views/dashboard/cupon/imagen_view.php");
                }else{
                    require_once("../../app/views/dashboard/cupon/imagen_view.php");

                }
            }else{
                Page::showMessage(4, "Seleccione un cupon", "create.php");
            }
            
            
        }else{
            Page::showMessage(4, "Seleccione un cupon", "create.php");
        }
		
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>