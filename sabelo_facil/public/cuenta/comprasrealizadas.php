<?php
require_once("../../app/views/public/templates/page.class.php");
Page::templateHeader("Compras realizasas");
require_once("../../app/controllers/public/account/comprasrealizadas_controller.php");
Page::templateFooter();
?>