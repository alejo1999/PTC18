<?php
class Categoria extends Validator{
    //Declaracion de proipedades 
    private $id = null;
	private $nombre = null;
<<<<<<< HEAD
	private $imagen_url = null;
    private $descripcion = null;
    
    //mmetodos para poder llenar las propiedades
    public function setId($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }
=======
	private $imagen = null;
	private $descripcion = null;
	private $estado = null;
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1

    public function getId(){
        return $this->id;
    }

    public function setNombre($value){
			if($this->validateAlphanumeric($value, 1, 100)){
				$this->nombre = $value;
				return true;
			}else{
				return false;
						}
    }
    public function getNombre(){
		return $this->nombre;
	}
	
	
	public function setImagen($file){
<<<<<<< HEAD
		if($this->validateImage($file, $this->imagen_url, "../../web/img/categoria/", 500, 500)){
			$this->imagen_url = $this->getImageName();
=======
		if($this->validateImage($file, $this->imagen, "../../web/img/categorias/", 2000, 2000)){
			$this->imagen = $this->getImageName();
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->imagen_url;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/categoria/".$this->imagen_url)){
			$this->imagen_url = null;
			return true;
		}else{
			return false;
		}
	}
<<<<<<< HEAD
    
=======
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
	public function setDescripcion($value){
		if($value){
			if($this->validateAlphanumeric($value, 1, 200)){
				$this->descripcion = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->descripcion = null;
			return true;
		}		
	}
	public function getDescripcion(){
		return $this->descripcion;
    }
<<<<<<< HEAD
    //metodos para el CRUD
    public function getCategorias(){
		$sql = "SELECT ID_categoria, nombre_categoria, descripcion_categoria ,imagen_url FROM categoria WHERE Estado = 1 ORDER BY nombre_categoria ";
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    public function searchCategoria($value){
		$sql = "SELECT * FROM categoria WHERE Estado = 1 AND nombre_categoria LIKE ? OR descripcion_categoria LIKE ? ORDER BY nombre_categoria";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
    }
    public function createCategoria(){
		$sql = "INSERT INTO categoria(nombre_categoria, descripcion_categoria,imagen_url , estado) VALUES(?, ?, ?,1)";
		$params = array($this->nombre, $this->descripcion,$this->imagen_url);
		return Database::executeRow($sql, $params);
    }
    public function readCategoria(){
		$sql = "SELECT nombre_categoria, descripcion_categoria,imagen_url FROM categoria WHERE ID_categoria = ?";
=======

	public function setEstado($value){
		if($value){
			if($this->validateAlphanumeric($value, 1, 200)){
				$this->estado = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->estado = null;
			return true;
		}		
	}
	public function getEstado(){
		return $this->estado;
	}


	//Metodos para el manejo del CRUD
	public function getCategorias(){
		$sql = "SELECT ID_categoria, nombre_categoria, imagen_url, Estado FROM categoria ORDER BY nombre_categoria";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	
	public function searchCategoria($value){
		$sql = "SELECT ID_categoria, nombre_categoria, imagen_url, Estado
				FROM categoria WHERE nombre_categoria LIKE ? ORDER BY nombre_categoria";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function createCategoria(){
		$sql = "INSERT INTO categoria(nombre_categoria, imagen_url, Estado) VALUES(?, ?, ?)";
		$params = array($this->nombre, $this->imagen, 1);	
		return Database::executeRow($sql, $params);
	}
	public function readCategoria(){
		$sql = "SELECT nombre_categoria, imagen_url, descripcion_categoria ,Estado FROM categoria WHERE ID_categoria = ?";
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->nombre = $categoria['nombre_categoria'];
<<<<<<< HEAD
=======
			$this->imagen = $categoria['imagen_url'];
			$this->estado = $categoria['Estado'];
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
			$this->descripcion = $categoria['descripcion_categoria'];
			$this->imagen_url = $categoria['imagen_url'];
			
			return true;
		}else{
			return null;
		}
<<<<<<< HEAD
    }
    public function updateCategoria(){
		$sql = "UPDATE categoria SET nombre_categoria = ?, descripcion_categoria = ? , imagen_url = ? WHERE ID_categoria = ?";
		$params = array($this->nombre, $this->descripcion, $this->imagen_url, $this->id );
=======
	}
	public function updateCategoria(){
		$sql = "UPDATE categoria SET nombre_categoria = ?, imagen_url = ?,descripcion_categoria = ?, Estado = ? WHERE ID_categoria = ?";
		$params = array($this->nombre, $this->imagen,$this->descripcion, $this->estado, $this->id);
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
		return Database::executeRow($sql, $params);
	}
	public function deleteCategoria(){
		$sql = "DELETE FROM categoria WHERE ID_categoria = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>