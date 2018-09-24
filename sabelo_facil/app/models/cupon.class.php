<?php
class Cupon extends Validator{
	//Declaración de propiedades
    private $id = null;
    private $nombre = null;
	private $id_comercio = null;
    private $id_categoria = null;
    private $precio = null;
    private $limite = null;
    private $existencia = null;	
	private $fechainicio = null;
    private $fechafinal = null;
	private $descripcion = null;
	private $estado = null;


	Private $imagen = null;
	Private $vendidos = null;
	Private $abreviatura = null;
	


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

	public function setAbreviatura($value){
		if($this->validateAlphanumeric($value, 1, 4)){
			$this->abreviatura = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getAbreviatura(){
		return $this->abreviatura;
	}


	public function setcomercio($value){
		if($this->validateId($value)){
			$this->id_comercio = $value;
			return true;
		}else{
			return false;
		}

	}
	public function getcomercio(){
		return $this->id_comercio;
	}

	public function setVendidos($value){
		if($this->validateId($value)){
			$this->vendidos = $value;
			return true;
		}else{
			return false;
		}

	}
	public function getVendidos(){
		return $this->vendidos;
	}



	public function setCategoria($value){
		if($this->validateId($value)){
			$this->id_categoria = $value;
			return true;
		}else{
			return false;
		}

	}
	public function getCategoria(){
		return $this->id_categoria;
    }
    
    public function setPrecio($value){
		if($this->validateMoney($value)){
			$this->precio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getPrecio(){
		return $this->precio;
	}
    
    public function setLimite($value){
		if($value == "1" || $value == "0"){
			$this->limite = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getLimite(){
		return $this->limite;
    }
    
    public function setExistencia($value){
		if($this->validateNumeric($value, 1, 11)){
			$this->existencia = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getExistencia(){
		return $this->existencia;
    }
    
    
	public function setFechainicio($value){
		if($this->validateDate($value)){
			$this->fechainicio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFechainicio(){
		$cadena = $this->fechainicio;
		$buscar = '-';
		$reemplazar = '/';
		
		return str_replace($buscar, $reemplazar, $cadena);;
    }
    
    
	public function setFechafinal($value){
		if($this->validateDate($value)){
			$this->fechafinal = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFechafinal(){
		$cadena = $this->fechafinal;
		$buscar = '-';
		$reemplazar = '/';
		
		return str_replace($buscar, $reemplazar, $cadena);;
	}
	
	
	public function setDescripcion($value){
		if($this->validateAlphanumeric($value, 1, 200)){
			$this->descripcion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setEstado($value){
		if($value == "1" || $value == "0"){
			$this->estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getEstado(){
		return $this->estado;
	}


	public function setImagen($file){
		if($this->validateImage($file, $this->imagen, "../../web/img/cupones/", 200, 200)){ 
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
		if(unlink("../../web/img/cupones/".$this->imagen)){
			$this->imagen = null;
			return true;
		}else{
			return false;
		}
	}

	//Metodos para el manejo del CRUD
	public function getCategoriaCupones(){
		$sql = "SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto FROM productos INNER JOIN categorias USING(id_categoria) WHERE id_categoria = ? AND estado = 1 ORDER BY nombre_producto";
		$params = array($this->categoria);
		return Database::getRows($sql, $params);	
	}
	public function getCupones(){
		$sql = "SELECT cupones.ID_cupon , cupones.img_url,cupones.nombre_cupon ,cupones.precio, cupones.existencia,cupones.fecha_inicio,cupones.fecha_final,cupones.descripcion, cupones.limitado, categoria.nombre_categoria, comercio.nombre, cupones.estado FROM cupones 
        INNER JOIN categoria ON cupones.FK_ID_categoria = categoria.ID_categoria
        INNER JOIN comercio  ON cupones.FK_ID_comercio = comercio.ID_comercio";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function getImgcupon(){
		$sql = "SELECT imagenes_cupones.ID_imgcupon	,imagenes_cupones.url_imagen ,cupones.nombre_cupon FROM imagenes_cupones 
		INNER JOIN cupones ON imagenes_cupones.FK_ID_cupon = cupones.ID_cupon
		WHERE imagenes_cupones.FK_ID_cupon = ?";
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function createimgcupon(){
		$sql = "INSERT INTO imagenes_cupones ( url_imagen, FK_ID_cupon) VALUES (?, ?)";
		$params = array($this->imagen,$this->id);
		return Database::executeRow($sql, $params);
	}

	public function searchCupones($value){
		$sql = "SELECT cupones.ID_cupon , cupones.nombre, cupones.precio, cupones.descripcion, cupones.limitado, categoria.nombre_categoria, cupones.estado FROM cupones 
        INNER JOIN categoria ON cupones.FK_ID_categoria = categoria.ID_categoria WHERE cupones.nombre LIKE ? OR cupones.descripcion LIKE ? ORDER BY cupones.nombre";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getCategorias(){
		$sql = "SELECT ID_categoria, nombre_categoria FROM categoria";
		$params = array(null);
		return Database::getRows($sql, $params);
	 }
    public function getComercios(){
		$sql = "SELECT ID_comercio, nombre FROM comercio";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createCupon(){
		$sql = "INSERT INTO cupones(nombre_cupon , FK_ID_categoria, FK_ID_comercio,  precio, limitado ,existencia,fecha_inicio,fecha_final ,descripcion, estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->id_categoria, $this->id_comercio, $this->precio,$this->limite, $this->existencia,$this->fechainicio,$this->fechafinal,$this->descripcion, $this->estado);
		return Database::executeRow($sql, $params);
	}
	public function readCupones(){
		$sql = "SELECT nombre_cupon ,abreviatura_cupon, FK_ID_categoria, FK_ID_comercio,img_url,  precio, limitado ,existencia,fecha_inicio,fecha_final ,descripcion,vendidos, estado FROM cupones WHERE ID_cupon = ?";
		$params = array($this->id);
		$cupones = Database::getRow($sql, $params);
		if($cupones){
			$this->nombre = $cupones['nombre_cupon'];
			$this->id_categoria = $cupones['FK_ID_categoria'];
			$this->id_comercio = $cupones['FK_ID_comercio'];
			$this->precio = $cupones['precio'];
			$this->limite = $cupones['limitado'];
			$this->imagen = $cupones['img_url'];
			$this->abreviatura = $cupones['abreviatura_cupon'];
			$this->existencia = $cupones['existencia'];
			$this->fechainicio = $cupones['fecha_inicio'];
			$this->fechafinal = $cupones['fecha_final'];
			$this->descripcion = $cupones['descripcion'];
			$this->vendidos = $cupones['vendidos'];
			$this->estado = $cupones['estado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateCupon(){
		$sql = "UPDATE cupones SET nombre_cupon=?,FK_ID_comercio=?,FK_ID_categoria=?,precio=?,limitado=?,existencia=?,fecha_inicio=?,fecha_final=?,descripcion=?,estado=? WHERE cupones.ID_cupon = ?";
		$params = array($this->nombre,$this->id_comercio,$this->id_categoria,$this->precio,$this->limite,$this->existencia,$this->fechainicio,$this->fechafinal,$this->descripcion,$this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteCupon(){
		$sql = "DELETE FROM cupones WHERE ID_cupon = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>