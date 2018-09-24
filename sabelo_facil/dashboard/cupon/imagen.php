<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Imagenes de Cupones");
require_once("../../app/controllers/dashboard/cupon/imagen_controller.php");
Page::templateFooter();
?>