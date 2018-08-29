<?php
class Categoria extends Validator{
    //Declaracion de proipedades 
    private $id = null;
	private $nombre = null;
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
		if($this->validateImage($file, $this->imagen_url, "../../web/img/categoria/", 500, 500)){
			$this->imagen_url = $this->getImageName();
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
		$params = array($this->id);
		$categoria = Database::getRow($sql, $params);
		if($categoria){
			$this->nombre = $categoria['nombre_categoria'];
			$this->descripcion = $categoria['descripcion_categoria'];
			$this->imagen_url = $categoria['imagen_url'];
			
			return true;
		}else{
			return null;
		}
    }
    public function updateCategoria(){
		$sql = "UPDATE categoria SET nombre_categoria = ?, descripcion_categoria = ? , imagen_url = ? WHERE ID_categoria = ?";
		$params = array($this->nombre, $this->descripcion, $this->imagen_url, $this->id );
		return Database::executeRow($sql, $params);
	}
	public function deleteCategoria(){
		$sql = "DELETE FROM categoria WHERE ID_categoria = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>