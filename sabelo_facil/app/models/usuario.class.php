<?php
class Usuario extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;

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
	
	public function setNombres($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->nombres = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombres(){
		return $this->nombres;
	}

	public function setApellidos($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->apellidos = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getApellidos(){
		return $this->apellidos;
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

	public function setAlias($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->alias = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getAlias(){
		return $this->alias;
	}

	public function setClave($value){
		if($this->validatePassword($value)){
			$this->clave = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getClave(){
		return $this->clave;
	}

	//Métodos para manejar la sesión del usuario
	public function checkAlias(){
		$sql = "SELECT ID_admin FROM administrador WHERE username = ?";
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id = $data['ID_admin'];
			return true;
		}else{
			return false;
		}
	}
	public function checkPassword(){
		$sql = "SELECT contrasena FROM administrador WHERE ID_admin = ?";
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if(password_verify($this->clave, $data['contrasena'])){
			return true;
		}else{
			return false;
		}
	}
	public function changePassword(){
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = "UPDATE administrador SET contrasena = ? WHERE ID_admin = ?";
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function logOut(){
		return session_destroy();
	}

	//Metodos para manejar el CRUD
	public function getUsuarios(){
		$sql = "SELECT ID_admin, nombre, apellido, correo, username FROM administrador ORDER BY apellido";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchUsuario($value){
		$sql = "SELECT ID_admin, nombre, apellido, correo, username FROM administrador WHERE apellido LIKE ? OR nombre LIKE ? ORDER BY apellido";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function createUsuario(){
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = "INSERT INTO usuarios(nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario, clave_usuario) VALUES(?, ?, ?, ?, ?)";
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash);
		return Database::executeRow($sql, $params);
	}
	public function readUsuario(){
		$sql = "SELECT nombre, apellido, correo, username FROM administrador WHERE ID_admin = ?";
		$params = array($this->id);
		$user = Database::getRow($sql, $params);
		if($user){
			$this->nombres = $user['nombres'];
			$this->apellidos = $user['apellido'];
			$this->correo = $user['correo'];
			$this->alias = $user['username'];
			return true;
		}else{
			return null;
		}
	}
	public function updateUsuario(){
		$sql = "UPDATE usuarios SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, alias_usuario = ? WHERE id_usuario = ?";
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteUsuario(){
		$sql = "DELETE FROM usuarios WHERE id_usuario = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>