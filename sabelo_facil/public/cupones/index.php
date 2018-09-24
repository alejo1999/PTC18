<?php
require_once("../../app/views/public/templates/page.class.php");
Page::templateHeader("Tienda");
require_once("../../app/controllers/public/cupon/categorias_controller.php");
Page::templateFooter();
?>