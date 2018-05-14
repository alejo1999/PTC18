<?php
require_once("../app/views/public/templates/page.class.php");
Page::templateHeader("Categorias");
require_once("../app/views/public/sections/slider_view.php");
require_once("../app/controllers/public/producto/categorias_controller.php");
require_once("../app/views/public/sections/parallax-bottom_view.php");
Page::templateFooter();
?>