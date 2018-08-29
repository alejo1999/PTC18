<?php
class Producto extends Validator{
	//Declaración de propiedades
	private $id = null;
	private $id_marca = null;
	private $id_categoria = null;
    private $id_proveedor = null;	
	private $nombre = null;
	private $precio = null;
	private $imagen = null;
<<<<<<< HEAD
	private $descripcion = null;
=======
	private $categoria = null;
	private $proveedor = null;
	private $marca = null;
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
	private $estado = null;

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

	public function setMarca($value){
		if($this->validateId($value)){
			$this->id_marca = $value;
			return true;
		}else{
			return false;
		}

	}
	public function getMarca(){
		return $this->id_marca;
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
		return $this->id_ctegoria;
	}
	
	
	public function setProveedor($value){
		if($this->validateId($value)){
			$this->id_proveedor = $value;
			return true;
		}else{
			return false;
		}

	}
	public function getProveedor(){
		return $this->id_proveedor;
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

	public function setImagen($file){
		if($this->validateImage($file, $this->imagen, "../../web/img/productos/", 800, 800)){
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
		if(unlink("../../web/img/productos/".$this->imagen)){
			$this->imagen = null;
			return true;
		}else{
			return false;
		}
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

	//Metodos para el manejo del CRUD
	public function getCategoriaProductos(){
		$sql = "SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto FROM productos INNER JOIN categorias USING(id_categoria) WHERE id_categoria = ? AND estado_producto = 1 ORDER BY nombre_producto";
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}
	public function getProductos(){
		$sql = "SELECT producto.ID_producto, producto.imagen_url, producto.nombre_producto, producto.descripcion, producto.precio, categoria.nombre_categoria, producto.estado 
		FROM producto 
		INNER JOIN categoria ON producto.FK_ID_Categoria =categoria.ID_categoria 
		INNER JOIN proveedor ON producto.FK_ID_proveedor = proveedor.ID_proveedor
		INNER JOIN marca ON producto.FK_ID_marca = marca.ID_marca
		ORDER BY producto.nombre_producto";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchProducto($value){
		$sql = "SELECT id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto, nombre_categoria, estado_producto FROM productos INNER JOIN categorias USING(id_categoria) WHERE nombre_producto LIKE ? OR descripcion_producto LIKE ? ORDER BY nombre_producto";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}
	public function getCategorias(){
<<<<<<< HEAD
		$sql = "SELECT ID_categoria, nombre_categoria FROM categoria";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getMarcas(){
		$sql = "SELECT id_categoria, nombre_categoria FROM categorias";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getProveedores(){ 
		$sql = "SELECT id_categoria, nombre_categoria FROM categorias";
=======
		$sql = "SELECT categoria.ID_categoria , categoria.nombre_categoria 
		FROM categoria ";
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createProducto(){
		$sql = "INSERT INTO productos(nombre_producto, descripcion_producto, precio_producto, imagen_producto, estado_producto, id_categoria) VALUES(?, ?, ?, ?, ?, ?)";
		$params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria);
		return Database::executeRow($sql, $params);
	}
	public function readProducto(){
		$sql = "SELECT producto.nombre_producto, producto.descripcion, producto.precio, producto.imagen_url, producto.FK_ID_Categoria,producto.FK_ID_marca,producto.FK_ID_proveedor,producto.estado 
		FROM producto WHERE producto.ID_producto = ?";
		$params = array($this->id);
		$producto = Database::getRow($sql, $params);
		if($producto){
			$this->nombre = $producto['nombre_producto'];
			$this->descripcion = $producto['descripcion'];
			$this->precio = $producto['precio'];
			$this->imagen = $producto['imagen_url'];
			$this->categoria = $producto['FK_ID_Categoria'];
			$this->proveedor = $producto['FK_ID_proveedor'];
			$this->marca = $producto['FK_ID_marca'];
			$this->estado = $producto['estado'];
			return true;
		}else{
			return null;
		}
	}
	public function updateProducto(){
		$sql = "UPDATE productos SET nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, imagen_producto = ?, estado_producto = ?, id_categoria = ? WHERE id_producto = ?";
		$params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria, $this->id);
		return Database::executeRow($sql, $params);
	}
	public function deleteProducto(){
		$sql = "DELETE FROM productos WHERE id_producto = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>