<?php
class Tipo_usuario extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	

	//Métodos para sobrecarga de propiedades
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
	
	public function setNombre($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre;
	}

	



	//Metodos para el manejo del CRUD
	public function getTipo_usuarios(){
		$sql = "SELECT ID_tipo_usuario, nombre_tipo FROM Tipo_usuario ORDER BY nombre_tipo";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchTipo_usuarios($value){
		$sql = "SELECT ID_tipo_usuario, nombre_tipo
				FROM Tipo_usuario WHERE nombre_tipo LIKE ? ORDER BY nombre_tipo";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createTipo_usuarios(){
		$sql = "INSERT INTO Tipo_usuario(nombre_tipo ) VALUES(?)";
		$params = array($this->nombre);	
		return Database::executeRow($sql, $params);
	}
	public function readTipo_usuarios(){
		$sql = "SELECT nombre_tipo  FROM Tipo_usuario WHERE ID_tipo_usuario = ?";
		$params = array($this->id);
		$Tipo_usuario = Database::getRow($sql, $params);
		if($Tipo_usuario){
			$this->nombre = $Tipo_usuario['nombre_tipo'];
			
			return true;
		}else{
			return null;
		}
	}
	public function updateTipo_usuarios(){
		$sql = "UPDATE Tipo_usuario SET nombre_tipo = ? WHERE ID_tipo_usuario = ?";
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteTipo_usuarios(){
		$sql = "DELETE FROM Tipo_usuario WHERE ID_tipo_usuario = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>