<?php
require_once("../../app/models/cliente.class.php");
try{
	$object = new cliente;
	if($object->getclientes()){
		if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setAlias($_POST['alias_usuario'])){
				if($object->checkAlias()){
					if($object->setClave($_POST['clave_usuario'])){
						if($object->checkPassword()){
							Page::showMessage(1, "Autenticación correcta", "index.php");
						}else{
							throw new Exception("Clave inexistente");
						}
					}else{
						throw new Exception("Clave menor a 6 caracteres");
					}
				}else{
					throw new Exception("Alias inexistente");
				}
			}else{
				throw new Exception("Alias incorrecto");
			}
		}
	}else{
		Page::showMessage(3, "No hay clientes disponibles", "register.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/account/acceder_view.php");
?>