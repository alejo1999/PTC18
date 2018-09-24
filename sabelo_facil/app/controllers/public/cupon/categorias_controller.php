<?php
require_once("../../app/models/cupon.class.php");
require_once("../../app/models/categoria.class.php");
try{
	$cupon = new Cupon;
    $categoria = new Categoria;
    

	$categorias = $categoria->getCategorias();
	$cupones = $cupon->getCupones();


	if($cupones)
	{
		require_once("../../app/views/public/cupon/categorias_view.php");
	}
	else
	{
		Page::showMessage(3, "No hay categorías disponibles", null);
	}
	
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>