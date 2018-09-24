<?php
require_once("../../app/models/categoria.class.php");
try{
	$por_pagina=8;
	if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
	}
	else {
	$pagina=1;
	}
	// la pagina inicia en 0 y se multiplica $por_pagina
	$empieza = ($pagina-1) * $por_pagina;


	$categoria = new Categoria;
	if(isset($_POST['buscar'])){
		$_POST = $categoria->validateForm($_POST);
		$data = $categoria->searchCategoria($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resultados", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $categoria->getCategorias();
		}
	}else{
		$data = $categoria->getCategorias();
	}
	if($data){
		require_once("../../app/views/dashboard/categoria/index_view.php");
	}else{
		Page::showMessage(3, "No hay categorías disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>