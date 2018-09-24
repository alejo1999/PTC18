<?php
require_once("../../app/models/producto.class.php");
require_once("../../app/models/categoria.class.php");
try{

	//cantidad de registros por página
	$por_pagina=4;
	if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
	}
	else {
	$pagina=1;
	}
	// la pagina inicia en 0 y se multiplica $por_pagina
	$empieza = ($pagina-1) * $por_pagina;

	$producto = new Producto;
	$categoria = new Categoria;
	$categorias = $categoria->getCategorias();
	if(isset($_GET['id'])){
		if($producto->setCategoria($_GET['id'])){
			
			$productos = $producto->getProductosporcategoria($empieza, $por_pagina);
			if($productos){
				require_once("../../app/views/public/producto/categorias_view.php");
			}else{
				page::showMessage(3,"No existe productos","index.php");
			}
		}else{
			
			page::showMessage(3,"No existe categoria","index.php");
			
		}
	}else{
		if($producto->setCategoria("1")){
			$productos = $producto->getProductosporcategoria2($empieza, $por_pagina);
			
			if($productos){
			
				require_once("../../app/views/public/producto/categorias_view.php");
			}else{
				page::showMessage(3,"No existe productos","index.php");
			}

		}
		}
	



	



	// $categorias = $categoria->getCategorias();
	// $productos = $producto->getProductos();


	// if($productos)
	// {
	// 	require_once("../../app/views/public/producto/categorias_view.php");
	// }
	// else
	// {
	// 	Page::showMessage(3, "No hay categorías disponibles", null);
	// }
	
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>