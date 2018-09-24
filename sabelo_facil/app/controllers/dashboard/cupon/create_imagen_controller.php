<?php
require_once("../../app/models/cupon.class.php");
try{
    $cupon = new Cupon;
    
    

        if(isset($_POST['crear'])){
       
                if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                    if($cupon->setImagen("buens.jpg")){
                        if($cupon->createimgcupon()){
                            Page::showMessage(1, "Imagen añadida", "index.php");
                            }else{
                                throw new Exception(Database::getException());
                            }
                        }else{
                            throw new Exception($cupon->getImageError());
                        }
                    }else {
                        throw new Exception("Imagen incorrecta");
                    }
            
        }
        
        
    
}catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/cupon/create_img_view.php");
?>