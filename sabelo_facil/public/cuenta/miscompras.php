<?php
require_once("../../app/views/public/templates/page.class.php");
Page::templateHeader("Productos");
require_once("../../app/controllers/public/account/miscompras_controller.php");
Page::templateFooter();
?>