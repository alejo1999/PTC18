<?php
require_once("../../app/models/cliente.class.php");

try{
	$object = new cliente;
	if($object->getclientes()){
		if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setAlias($_POST['alias_usuario'])){
				if($object->checkAlias()){
					if($object->checkNombre()){
						if($object->checkApellido()){
							if($object->checkCorreo()){
								if($object->setClave($_POST['clave_usuario'])){
									if($object->checkPassword()){
										$_SESSION['id_cliente'] = $object->getId();
										$_SESSION['nombre'] = $object->getNombres();
										$_SESSION['apellido'] = $object->getApellidos();
										$_SESSION['correo'] = $object->getCorreo();
										Page::showMessage(1, "Autenticación correcta", "../productos/index.php");
									}else{
										throw new Exception("Clave inexistente");
									}
								}else{
									throw new Exception("Clave menor a 6 caracteres");
								}
							}else{
								throw new Exception("Correo incorrecto");
							}
						}else{
							throw new Exception("apellido incorrecto");
						}
					}else{
						throw new Exception("Nombre incorrecto");
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



	
    $cliente = new cliente;
    if(isset($_POST['crear'])){
        $_POST = $cliente->validateForm($_POST);
        if($cliente->setNombres($_POST['nombres'])){
            if($cliente->setApellidos($_POST['apellidos'])){
                if($cliente->setCorreo($_POST['correo'])){
                    if($cliente->setAlias($_POST['alias'])){
                        if($_POST['clave1'] == $_POST['clave2']){
                            if($cliente->setClave($_POST['clave1'])){
                                if($cliente->setFechaNac($_POST['fecha_nac'])){
                                    if($cliente->setDireccion($_POST['direccion'])){                            
                                        if($cliente->setDocumento($_POST['documento'])){
                                            if($cliente->setTipoDocumento($_POST['tipo_documento'])){
                                                if($cliente->createcliente()){
                                                    Page::showMessage(1, "cliente creado", "index.php");
                                                }else{
                                                    throw new Exception(Database::getException());
                                                }
                                            }else{
                                                throw new Exception("Tipo documento incorrecto");
                                            }
                                        }else{
                                            throw new Exception("Documento incorrecto");
                                        } 
                                    }else{
                                        throw new Exception("Direccion incorrecto");
                                    }
                                }else{
                                    throw new Exception("Fecha incorrecta");
                                }
                            }else{
                                throw new Exception("Clave menor a 6 caracteres");
                            }
                        }else{
                            throw new Exception("Claves diferentes");
                        }                        
                    }else{
                        throw new Exception("Alias incorrecto");
                    }
                }else{
                    throw new Exception("Correo incorrecto");
                }
            }else{
                throw new Exception("Apellidos incorrectos");
            }
        }else{
            throw new Exception("Nombres incorrectos");
        }
    }
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/account/acceder_view.php");
?>