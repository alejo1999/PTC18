<?php
class Validator{

	private $imageName = null;
	private $imageError = null;

	public function getImageName(){
		return $this->imageName;
	}
	public function getImageError(){
		switch($this->imageError){
			case 1:
				$error = "No se puede guardar la imagen";
				break;
			case 2:
				$error = "El tipo de la imagen debe ser gif, jpg o png";
				break;
			case 3:
				$error = "La dimensión de la imagen es incorrecta";
				break;
			case 4:
				$error = "El tamaño de la imagen debe ser menor a 2MB";
				break;
			default:
				$error = "Ocurrió un problema con la imagen";
		}
		return $error;
	}

	public function validateForm($fields){
		foreach($fields as $index => $value){
			$value = htmlentities(trim($value));
			$fields[$index] = $value;
		}
		return $fields;
	}

	public function validateDate($date){
		$values = explode('/', $date);
		if(checkdate($values[1], $values[2], $values[0])){
			return true;
		}else{
			return false;
		}
	}

	public function validateId($value){
		if(filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))){
			return true;
		}else{
			return false;
		}
	}

	public function validateImage($file, $value, $path, $max_width, $max_heigth){
     	if($file['size'] <= 2097152){
	    	list($width, $height, $type) = getimagesize($file['tmp_name']);
			if($width <= $max_width && $height <= $max_heigth){
				if($type == 1 || $type == 2 || $type == 3){
					if($value){
						$image = $value;
					}else{
						$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
						$image = uniqid().".".$extension;
					}
					$url = $path.$image;
					if(move_uploaded_file($file['tmp_name'], $url)){
						$this->imageName = $image;
						return true;
					}else{
						$this->imageError = 1;
						return false;
					}
				}else{
					$this->imageError = 2;
					return false;
				}
			}else{
				$this->imageError = 3;
				return false;
			}
     	}else{
			$this->imageError = 4;
			return false;
     	}
	}

	public function validateEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}

	public function validateAlphabetic($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{".$minimum.",".$maximum."}$/", $value)){
			return true;
		}else{
			return false;
		}
	}
	public function validateNumeric($value,$minimum,$maximum) {
        if(preg_match("/^[0-9]{".$minimum.",".$maximum."}$/", $value)){
            return true;
        }else{
            return false;
        }

	}
	
	public function validateAlphanumeric($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ%ñ\s\.\#\,]{".$minimum.",".$maximum."}$/", $value)){
			return true;
		}else{
			return false;
		}
	}

	function filtroUrl($value){
		if(trim($value) == ''){
			return false;
		}else{
			if (!filter_var($value, FILTER_VALIDATE_URL)) {
				return false;
			}
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$value)) {
				return false;
			}else{
				return true;
			}
		}
	}
    

	public function validateMoney($value){
		if(preg_match("/^[0-9]+(?:\.[0-9]{1,2})?$/", $value)){
			return true;
		}else{
			return false;
		}
	}

	public function validatePassword($value){
		if(strlen($value) >= 8){
			return true;
		}else{
			return false;
		}
	}

	public function validatePasswordcaracter2($value){
		if(strlen($value) >= 8){
			if(preg_match("/^.*(?=.*\d)(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).*$/", $value)){ 
				return true;
			}
			
		}else{
			return false;
		}
	}
	
}
?>