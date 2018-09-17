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
 			");

			if(isset($_SESSION['id_cliente'])){

					print("
					
					<header id='header_pub'>
			
			

					<div class='row  header_sf navbar-fixed'>
					<nav class='header_sf '>
						<div class='col s12 m12 l12' id='margeneado'>
							<div class='col s12 m3 hide-on-small-only  hide-on-med-only' style='max-width:150px; '>
								<img class='responsive-img' src='../../web/img/logos/sabelofacil-black.png' alt='pc'>
							</div>
							<div class='col s12 m3  hide-on-large-only ' style='width:90px;'>
								<img class='responsive-img' src='../../web/img/logos/mini.png'  alt='mobiles'>
							</div>
					
							<div class='col s12 m9' id='' >
								<div class='blocky hide-on-small-only col s12'> 
								
								</div>
								<div class='col l6 center'  style='margin-bottom:20px;'>
									<a class='btn_header_p' id='btn_T_A' href='../productos/index.php' >Inicio</a>
									<a class='btn_header_p' id='btn_T_A' onclick='cambiar_de_sitio_T_A();'>Sitio Academico</a>
						
								</div>
								
								<!-- Bloque de CINTA OPCIONES DE MATERIAS ACADEMICAS -->
								<div  class='s12 l6 center	' id='cinta_academica'>
									
									<a class='btn_menu_action' href='carrito.php' > Carrito</a> 
									<a class='dropdown-button btn_menu_action' data-activates='dropdown'><b>Cuenta : $_SESSION[nombre]</b></a>
									
									
										<ul id='dropdown' class='dropdown-content' style='border-radius: 14px;'>
											<li><a href='../cuenta/perfil.php'>Editar perfil</a></li>
											<li><a href='../cuenta/cambiar_contrasena.php'>Cambiar clave</a></li>
											<li><a href='../cuenta/ventas.php'>Compras realizadas</a></li>
											<li><a href='../cuenta/salir.php'>Cerrar Sesion</a></li>
										</ul>
									
									
									
								</div>
					
								 
					
							</div>
					
						</div>
					</nav>
					 
					</div>
					
					</header>
						<main>
					
					
					
					");
			}else{
				print("
				<header id='header_pub'>
			
			

				<div class='row  header_sf navbar-fixed'>
				<nav class='header_sf '>
					<div class='col s12 m12 l12' id='margeneado'>
						<div class='col s12 m3 hide-on-small-only  hide-on-med-only' style='max-width:140px; '>
						<a href='../productos/index.php'><img class='responsive-img' src='../../web/img/logos/sabelofacil-black.png'  alt='pc'></a>
							
						</div>
						<div class='col s12 m3  hide-on-large-only ' style='max-width:90px;'>
						<a  href='../productos/index.php'><img class='responsive-img' src='../../web/img/logos/mini.png'  alt='mobiles'></a>
							
						</div>
				
						<div class='col s12 m9' id='' >
							<div class='blocky hide-on-small-only col s12'> 
							
							</div>
							<div class='col l6 center'  style='margin-bottom:20px;'>
								<a class='btn_header_p' id='btn_T_A' href='../cuenta/acceder.php' >Inicio de sesion</a>
								<a class='btn_header_p' id='btn_T_A' onclick='cambiar_de_sitio_T_A();'>Sitio Academico</a> 

					
							</div>
							
							<!-- Bloque de CINTA OPCIONES DE MATERIAS ACADEMICAS -->
							<div  class='s12 l6 center	' id='cinta_academica'>
								
								
								
								
							</div>
				
							 
				
						</div>
				
					</div>
				</nav>
				 
				</div>
				
				</header>
					<main>
				
				
				");
			}
			 
			
		
		
	}

	public static function templateFooter(){
		print("
				</main>
				
						<div class=' back ' >

							<!--<div class='carousel  carousel-slider ' style='max-width:900px;'>
							// 	<a class='carousel-item' href='#one!'><img src='https://lh3.googleusercontent.com/_bl1DvvxMXUYBv_tubEuOT6Y2mQQWppNTfC09SzaxMLJRIvXYqyQbB3keTM8i8Hn2ZVWkJNp5TMkpHFkI2CGR_bl6oKRqU-ZV45v4g3lyUjAKCsU8Zz0DwEmfqWWN_kV83Ga4wS5IPMftbzuOxhQreUZ1s5aJ_sQ4ixU6FC2bCu-Js8ZeODqKD-jIE4IzQ-61AE3YpvkLA36UyOnHb3CJUZHrfXgqgVK_JBoxXwdMYnbUfUEIt1QfvproQAjTKK8-2kVSfQ-EJbLZz32oYuVylYZD8XG0bAJxDnZshkgpqfahpAOtNI6FokEaMyjlY4GS9X1cEvDiXEEt3TTZIWXuHM0mQfJ_n0pvI4IocuuiVoqynxD8cFmPmXyl7hRMqQgjlkMwzHUlnLMZ1-pHPXjvbItdGP_sbsdksXU8fY7kUnCUEWAm3OAYL3xWojaQcNTsUCQdf4trTpGeuQwUOXngLP8j0DUHODKEbz1GnUFGGmix9xc7RsN8gGAN8rXK1yoM2dtB9Qu-DB5cgH_wxOBLsQ0YB5xIdyjkyQkgtKaPB7wX36t4bdVujBBB_9PL5bhh-w62YLppcymHNJ9p4eyIGmqE4fwh1j9SZYDcAVf9Ut-x1sDt8lUsqvuENVYMpcw=w738-h943-no'></a>
							// 	<a class='carousel-item' href='#two!'><img src='https://lorempixel.com/800/400/food/2'></a>
							// 	<a class='carousel-item' href='#three!'><img src='https://lorempixel.com/800/400/food/3'></a>
							// 	<a class='carousel-item' href='#four!'><img src='https://lorempixel.com/800/400/food/4'></a>
							// </div>-->
							<div class='container'>
							<div class='slider' >

							
								<ul class='slides'>
								<li >
									<img  src='../../web/img/cupones/cup_1.jpg' > <!-- random image -->
									<div class='caption center-align'>
									<h3>Anuncio 1</h3>
									<h5 class='light grey-text text-lighten-3'>Descripcion </h5>
									</div>
								</li>
								<li>
									<a
										href='https://youtube.com' 
									><img src='../../web/img/cupones/cup_1.jpg' > <!-- random image -->
									<div class='caption left-align'>
									<h3>Anuncio 2</h3>
									<h5 class='light grey-text text-lighten-3'>Descripcion </h5></a>
									
									</div>
								</li>
								<li>
									<img src='../../web/img/cupones/colores.jpg'> <!-- random image -->
									<div class='caption right-align'>
									<h3>Anuncio 3</h3>
									<h5 class='light grey-text text-lighten-3'>Descripcion </h5>
									</div>
								</li>
								<li>
									<img src='../../web/img/cupones/cup_1.jpg'> <!-- random image -->
									<div class='caption center-align'>
									<h3>Anuncio 4</h3>
									<h5 class='light grey-text text-lighten-3'>Descripcion </h5>
									</div>
								</li>
								</ul>
							</div>
						  </div>
						
						</div>

					

			


				<footer class='#00bfa5 teal darken-1'  id='footer_pub'>
					<div class='container'>
						<div class='row'>
							<div class='col s12 m3 l3' style='padding-right:20px;'>
								<h5 id='des'>Sabelofacil</h5>
								<p class='grey-text text-lighten-4'>Los mejores productos a los mejores precios, el sitio perfecto para consulta de información y compra en línea.</p>
								<a class='btn_menu_action' style='color:white;'>Leer más</a> 
							</div>
							<div class='col s12 m3 l3'>
								<h5 id='des'>Contactanos</h5>
								<p class='grey-text text-lighten-4'>Sabelo_facil@gmail.com</p>
								<p class='grey-text text-lighten-4'>+503 2230-4875</p>
							</div>
							<div class='col s12 m3 l3'>
								<h5 id='des' style='white-space:pri; font-size:1.4em;'>¿Promocionate?</h5>
								<p class='grey-text text-lighten-4'>(Anuncios)</p>
								<p class='grey-text text-lighten-4'>Rellena un formulario con la informacion de tu empresa </p>
								<a href='../registros/formularioP.php'  class='btn_menu_action' style='color:white;'>Registrar Anuncio</a> 
							</div>
							<div class='col s12 m3 l3'>
								<h5 id='des' style='white-space:pri; font-size:1.4em;'>¿Promocionate?</h5>
								<p class='grey-text text-lighten-4'>(Cupones de Descuento)</p>
								<p class='grey-text text-lighten-4'>Rellena un formulario con la información y estaremos en contacto!</p>
								<a href='https://youtube.com'  class='btn_menu_action' style='color:white;'>Registrar comercio</a> 
							</div>
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