<?php
require_once("../../app/models/usuario.class.php");
try{
	$object = new Usuario;
	if($object->getUsuarios()){
		if(isset($_SESSION['ID_admin'])){
			Page::showMessage(4, "Usuario en sesion existente", "index.php");
		}else{
			if(isset($_POST['iniciar'])){
				$_POST = $object->validateForm($_POST);
				if($object->setAlias($_POST['alias'])){
					if($object->checkAlias()){
						if($object->setClave2($_POST['clave'])){
							if($object->checkPassword()){
								if($object->checkfecha_contrasena()){

									$fecha_cambio = $object->getFecha_contrasena();

									if($fecha_cambio >= 90){
										$_SESSION['ID_admin'] = $object->getId();
										$_SESSION['username'] = $object->getAlias();
										$_SESSION['imagen_url'] = $object->getImagen();
										$_SESSION['nombre'] = $object->getNombres();
										$_SESSION['apellido'] = $object->getApellidos();
										Page::showMessage(1, "Contraseña antigua Porfavor realize un cambio a continuacion $fecha_cambio", "password.php");
									}else if ($fecha_cambio < 90){
										$_SESSION['ID_admin'] = $object->getId();
										$_SESSION['username'] = $object->getAlias();
										$_SESSION['imagen_url'] = $object->getImagen();
										$_SESSION['nombre'] = $object->getNombres();
										$_SESSION['apellido'] = $object->getApellidos();
										Page::showMessage(1, "Autenticación correcta $fecha_cambio", "index.php");
									}
								}else{
									throw new Exception("Error en la fecha");
								}


								
							}else{
								throw new Exception("Clave inexistente");
							}
						}else{
							throw new Exception("Clave menor a 8 caracteres recuerda que debe contener una Mayus. un numero y caracter especial");
						}
					}else{
						throw new Exception("Alias inexistente");
					}
				}else{
					throw new Exception("Alias incorrecto");
				}
			}
		}


		
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "register.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/login_view.php");
?>