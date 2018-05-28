<?php
class Usuario extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;
	private $direccion =  null;
	private $documento =  null;
	private $id_tipo_doc_admin =  null;
	private $estado =  null;
	private $imagen_url =  null;
	private $fecha_nac = null;
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


	public function setDireccion($value){
		if($this->validateAlphabetic($value, 1, 100)){
			$this->direccion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDireccion(){
		return $this->direccion;
	}

	public function setFechaNac($value){
		if($this->validateDate($value)){
			$this->fecha_nac = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFechaNac(){
		$cadena = $this->fecha_nac;
		$buscar = '-';
		$reemplazar = '/';
		
		return str_replace($buscar, $reemplazar, $cadena);;
	}

	public function setDocumento($value){
		if($this->validateId($value)){
			$this->documento = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDocumento(){
		return $this->documento;
	}

	public function setTipoDocumento($value){
		if($this->validateId($value)){
			$this->id_tipo_doc_admin = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTipoDocumento(){
		return $this->id_tipo_doc_admin;
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
		$sql = "INSERT INTO administrador(nombre, apellido, fecha_nac, correo, contrasena, imagen_url, direccion, documento, username, FK_ID_tipo_doc, estado) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
		$params = array($this->nombres, $this->apellidos, $this->fecha_nac, $this->correo, $hash, 'no hay imagen', $this->direccion, $this->documento, $this->alias, $this->id_tipo_doc_admin, 1);
		return Database::executeRow($sql, $params);
	}
	public function readUsuario(){
		$sql = "SELECT nombre, apellido, correo, username, fecha_nac, direccion, documento FROM administrador WHERE ID_admin = ?";
		$params = array($this->id);
		$user = Database::getRow($sql, $params);
		if($user){
			$this->nombres = $user['nombre'];
			$this->apellidos = $user['apellido'];
			$this->correo = $user['correo'];
			$this->alias = $user['username'];
			$this->fecha_nac = $user['fecha_nac'];
			$this->direccion = $user['direccion'];
			$this->documento = $user['documento'];
			return true;
		}else{
			return null;
		}
	}
	public function updateUsuario(){
		$sql = "UPDATE administrador SET nombre = ?, apellido = ?, correo = ?, username = ?, fecha_nac =? , direccion=?, documento=? WHERE ID_admin = ?";
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->fecha_nac,$this->direccion,$this->documento, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteUsuario(){
		$sql = "DELETE FROM administrador WHERE ID_admin = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>