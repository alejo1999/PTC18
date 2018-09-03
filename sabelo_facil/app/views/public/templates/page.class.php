<?php
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php");
require_once("../../app/helpers/component.class.php");
class Page extends Component{
	public static function templateHeader($title){
		session_start();
		ini_set("date.timezone","America/El_Salvador");
		print("
			<!DOCTYPE html>
			<html lang='es'>
			<head>
				<meta charset='utf-8'>
				<title>SabeloFacil - $title</title>
				<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/material_icons.css'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/public.css'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/css_materias.css'  media='screen,projection'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/edicion_de_header_publico.css'  media='screen,projection'/>
				<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>

				<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			</head>

			<body>
			 
			<header id='header_pub'>
			
			

			<div class='row  header_sf navbar-fixed'>
			<nav class='header_sf '>
				<div class='col s12 m12 ' id='margeneado'>
					<div class='col s12 m3' style='max-width:150px;'>
						<img class='logo_header' src='../../web/img/logos/sabelofacil.png' alt=''>
					</div>
			
					<div class='col s12 m9' id=''>
						<div class='blocky hide-on-small-only col s12'> 
						
						</div>
						
						<div class='col' style='margin-bottom:20px;'>
							<a class='btn_header_p' href='../cuenta/acceder.php'>Iniciar Sesión</a>
							<a class='btn_header_p' id='btn_T_A' onclick='cambiar_de_sitio_T_A();'>Sitio Academico</a>
				
						</div>
						
						<!-- Bloque de CINTA OPCIONES DE MATERIAS ACADEMICAS -->
						<div id='cinta_academica'>
							<div class='col' style='margin-bottom:10px; float:right;'>
								<a class='btn_menu_action' href='carrito.php' > Carrito</a> 
								
			
							</div>
							<div class='col' style='margin-bottom:10px; float:right;'>
								
								
								<a class='btn_menu_action' href='factura.php'>Ayuda</a> 
							</div>
							
						</div>
			
						 <!-- Bloque de CINTA OPCIONES DE MATERIAS ACADEMICAS -->
						 <div id='cinta_tienda' style='display:none;'>
							<div class='col' style='margin-bottom:10px; float:right;'>
								<a class='btn_menu_action' >Carrito</a> 
								
			
							</div>
							<div class='col' style='margin-bottom:10px; float:right;'>
								
								
								<a class='btn_menu_action'>Ayuda</a> 
							</div>
							<div class='col' style='margin-bottom:10px; float:right;'>
								
								
								<a class='btn_menu_action'>Productos</a> 
							</div>
						</div>
			
					</div>
			
				</div>
			</nav>
			 
			</div>
			
			</header>
				<main>
		");
		
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
				<script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
				<script type='text/javascript' src='../../web/js/materialize.min.js'></script>
				<script type='text/javascript' src='../../web/js/public.js'></script>
				<script src='https://www.google.com/recaptcha/api.js'></script>
			</body>
			</html>
		");
	}
}
?>