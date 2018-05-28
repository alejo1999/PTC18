<?php
require_once("../../app/models/categoria.class.php");
try{
    if(isset($_GET['id'])){
        $categoria = new Categoria;
        if($categoria->setId($_GET['id'])){
            if($categoria->readCategoria()){
                if(isset($_POST['actualizar'])){
                    $_POST = $categoria->validateForm($_POST);
                    if($categoria->setNombre($_POST['nombre'])){
                        if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                            if($categoria->setImagen($_FILES['archivo'])){
                                if($categoria->updateCategoria()){
                                    Page::showMessage(1, "Categoría modificada", "index.php");
                                }else{
                                    if($categoria->unsetImagen()){
                                        throw new Exception(Database::getException());
                                    }else{
                                        throw new Exception("Elimine la imagen manualmente");
                                    }
                                }
                            }else{
                                throw new Exception($categoria->getImageError());
                            }
                        }else{
                            throw new Exception("Seleccione una imagen");
                        }                       
                    }else{
                        throw new Exception("Nombre incorrecto");
                    }                    
                }
            }else{
                Page::showMessage(2, "Categoría inexistente", "index.php");
            }
        }else{
            Page::showMessage(2, "Categoría incorrecta", "index.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione categoría", "index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/categoria/update_view.php");
?>