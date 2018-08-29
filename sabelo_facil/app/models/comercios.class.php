<?php
class Comercios extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $producto = null;
	private $correo = null;
	private $telefono = null;
	private $responsable = null;
	private $imagen = null;
	private $id_estado = null;

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

	public function setResponsable($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->responsable = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getResponsable(){
		return $this->responsable;
	}


	public function setTelefono($value){
		if($this->validateAlphanumeric($value, 1, 8)){
			$this->telefono = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTelefono(){
		return $this->telefono;
	}


	
	
	public function setProducto($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->producto = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getProducto(){
		return $this->producto;
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

	public function setImagen($file){
		if($this->validateImage($file, $this->imagen, "../../web/img/categorias/", 300, 300)){
			$this->imagen = $this->getImageName();
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->imagen;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/categorias/".$this->imagen)){
			$this->imagen = null;
			return true;
		}else{
			return false;
		}
	}

	public function setId_estado($value){
		if($this->validateId($value)){
			$this->id_estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId_estado(){
		return $this->id_estado;
	}

	//Metodos para el manejo del CRUD
	public function getComercios(){
		$sql = "SELECT ID_comercio, nombre,Producto, correo, telefono, responsable,imagen_url,FK_ID_estado_comercio FROM comercio ORDER BY nombre";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchComercio($value){
		$sql = "SELECT * FROM comercio WHERE nombre LIKE ? OR producto LIKE ? ORDER BY nombre";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function createComercio(){
		$sql = "INSERT INTO comercio(nombre, Producto,correo,telefono,responsable,imagen_url,FK_ID_estado_comercio) VALUES(?, ?, ?,?,?,'no hay imagen',1)";
		$params = array($this->nombre, $this->producto, $this->correo, $this->telefono, $this->responsable);
		return Database::executeRow($sql, $params);
	}
	public function readComercio(){
		$sql = "SELECT nombre, Producto, correo,telefono,responsable,imagen_url,FK_ID_estado_comercio FROM comercio WHERE ID_comercio = ?";
		$params = array($this->id);
		$comercio = Database::getRow($sql, $params);
		if($comercio){
			$this->nombre = $comercio['nombre'];
			$this->producto = $comercio['Producto'];
			$this->correo = $comercio['correo'];
			$this->correo = $comercio['telefono'];
			$this->correo = $comercio['responsable'];
			$this->imagen = $comercio['imagen_url'];
			$this->imagen = $comercio['FK_ID_estado_comercio'];
			
			return true;
		}else{
			return null;
		}
	}
	public function updateCategoria(){
		$sql = "UPDATE comercio SET nombre = ?, Producto = ?, correo = ?,telefono = ?, responsable = ? WHERE ID_comercio = ?";
		$params = array($this->nombre,$this->Producto,$this->correo,$this->telefono,$this->responsable,  $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteComercio(){
		$sql = "DELETE FROM comercio WHERE ID_comercio = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>