<?php
class Anuncio extends Validator{
    // Declaramos la variables de entorno 
    
    Private $id = null;
    Private $nombre_anunciante = null;
    Private $correo = null;
    Private $telefono = null;
    Private $direccion = null;
    Private $imagen_url = null;
    Private $empresa_url = null;
    Private $estdo =  null;

    public function setId($value){
		if($this->validateId($value)){
			$this->id = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId(){
		return $this->id;
    }
    
    public function setNombre_anunciante($value){
		if($this->validateAlphanumeric($value, 1, 100)){
			$this->nombre_anunciante = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre_anunciante;
    }

    public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCorreo(){
		return $this->correo;
    }
    
    public function setTelefono($value){
		if($this->validateNumeric($value)){
			$this->telefono = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTelefono(){
		return $this->telefono;
    }
    
    


}



?>