<?php
require_once("../app/models/database.class.php");
require_once("../app/helpers/validator.class.php");
require_once("../app/helpers/component.class.php");
class Page extends Component{
	public static function templateHeader($title){
		session_start();
		ini_set("date.timezone","America/El_Salvador");
		print("
			<!DOCTYPE html>
			<html lang='es'>
			<head>
				<meta charset='utf-8'>
				<title>CoffeeCode - $title</title>
				<link type='text/css' rel='stylesheet' href='../web/css/materialize.min.css'/>
				<link type='text/css' rel='stylesheet' href='../web/css/material_icons.css'/>
				<link type='text/css' rel='stylesheet' href='../web/css/public.css'/>
				<script type='text/javascript' src='../web/js/sweetalert.min.js'></script>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			</head>
			<body>
				<header>
					<div class='navbar-fixed'>
						<nav class='green'>
							<div class='nav-wrapper'>
								<a href='index.php' class='brand-logo'><img src='../web/img/logo.png' height='60'></a>
								<a href='#' data-activates='mobile' class='button-collapse'><i class='material-icons'>menu</i></a>
								<ul class='right hide-on-med-and-down'>
									<li><a href='index.php'><i class='material-icons left'>view_module</i>Catalogo</a></li>
									<li><a href='#'><i class='material-icons left'>shopping_cart</i>Compras</a></li>
									<li><a href='acceder.php'><i class='material-icons left'>person</i>Acceder</a></li>
								</ul>
							</div>
						</nav>
					</div>
					<ul class='side-nav' id='mobile'>
						<li><a href='index.php'><i class='material-icons left'>view_module</i>Catalogo</a></li>
						<li><a href='#'><i class='material-icons left'>shopping_cart</i>Compras</a></li>
						<li><a href='acceder.php'><i class='material-icons left'>person</i>Acceder</a></li>
					</ul>
				</header>
				<main>
		");
		require_once("../app/views/public/sections/modals_view.php");
	}

	public static function templateFooter(){
		print("
				</main>
				<footer class='#00bfa5 teal darken-1' style='margin-top:15vh;' id='footer_pub'>
        <a href=''> <div class='row' id='anuncio_block'>
            Seccion del anuncio.
         </div>
         </a>
         
         <div class='container'>
             <div class='row'>
                 <div class='col s12 m7 l6' style='padding-right:20px;'>
                     <h5 id='des'>Sabelofacil</h5>
                     <p class='grey-text text-lighten-4'>Los mejores productos a los mejores precios, el sitio perfecto para consulta de información y compra en línea.</p>
                     <a class='btn_menu_action' style='color:white;'>Leer más</a> 
                 </div>
                 <div class='col s12 m3 l3'>
                     <h5 id='des'>Contactanos</h5>
                     <p class='grey-text text-lighten-4'>Sabelo_facil@gmail.com</p>
                     <p class='grey-text text-lighten-4'>+503 2230-4875</p>
                 </div>
                 <div class='col s12 m2 l3'>
                     <h5 id='des' style='white-space:pri; font-size:1.4em;'>¿Deseas Promocionarte?</h5>
                     <p class='grey-text text-lighten-4'>Rellena un formulario con la información y estaremos en contacto!</p>
                     <a class='btn_menu_action' style='color:white;'>Registrar comercio</a> 
                 </div>
             </div>
         </div>
         <div class='footer-copyright' style='margin-top:50px;'>
             <div class='container'>
                 
             </div>
         </div>
     </footer>
				<script type='text/javascript' src='../web/js/jquery-3.2.1.min.js'></script>
				<script type='text/javascript' src='../web/js/materialize.min.js'></script>
				<script type='text/javascript' src='../web/js/public.js'></script>
			</body>
			</html>
		");
	}
}
?>