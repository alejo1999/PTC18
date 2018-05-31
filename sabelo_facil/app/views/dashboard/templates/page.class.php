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
				<title>Dashboard - $title</title>
				<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/material_icons.css'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/dashboard.css'/>
				<link type='text/css' rel='stylesheet' href='../../web/css/sabeloflat.css'/>
				<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			</head>
			<body id='black_body'>
		");
		if(isset($_SESSION['ID_admin'])){
			print("
				<div id='menu_overlay' style='display:none;'>overlay</div>

				<div id='container_block' style='display:none;'>
					<div id='menu_plegable'style='display:none;'>
						<a id='return_btn' onclick='ocultar_panel_superior();'>Regresar</a>	
							<ul>

							<li onmouseover='bal_over=1; show_info_baldosa();'><a class='baldosa' href='../usuario'>		<p class='plac_let'>A</p>Administradores</a></li>
							<li onmouseover='bal_over=2; show_info_baldosa();'><a class='baldosa' href='../categoria'>	<p class='plac_let'>C</p>Categorías</a></li>
							<li onmouseover='bal_over=3; show_info_baldosa();'><a class='baldosa' href='../producto'>		<p class='plac_let'>P</p>Productos</a></li></a>
							<li onmouseover='bal_over=4; show_info_baldosa();'><a class='baldosa' href='../comercios'>	<p class='plac_let'>C</p>Comercios</a></li>
							<li onmouseover='bal_over=5; show_info_baldosa();'><a class='baldosa' href='../materia'>		<p class='plac_let'>M</p>Materias</a></li>
							<li onmouseover='bal_over=6; show_info_baldosa();'><a class='baldosa' href='../proveedor'>	<p class='plac_let'>P</p>Proveedores</a></li>
							<li onmouseover='bal_over=7; show_info_baldosa();'><a class='baldosa' href='../marca'>		<p class='plac_let'>M</p>Marcas</a></li>

							</ul>

							<div id='sepline'> </div>
							<p id='info_baldosita'>Al pasar el puntero del mouse sobre una baldosa se mostrara una pequeña descripcion de lo que realiza la opción</p>
					</div>				
				</div>

				<header class='navbar-fixed'>
					<nav class='navpers'>
						<div class='nav-wrapper'>
							<a href='../account/' class='brand-logo'><img src='../../web/img/logo.png' height='60'></a>
							<a href='#' class='button-collapse' data-activates='mobile'><i class='material-icons'>menu</i></a>
							<ul class='right hide-on-med-and-down'>
							
							
								<p id='a_nav' href='#' data-activates='slide-out' class='button-collapse headersd'> Notificaciones </p>
								<p id='a_nav' onclick='mostrar_panel_superior();'  class=' headersd'> Menú de opciones </p>
							</ul>
						
						</div>
					</nav>

				



						<ul style='color:black' id='slide-out' class='side-nav'>
							
						<div class='row' id='SIDE_contenedor_user'>
							<div id='head_sides' ><a style='color:black'>Notificaciones | Menú</a></div>
							<div id='SIDE_cu_1' class='col s7 m7 l7'>
								<p id='nombre_user_ingresed'></p>
								<p id='tipo_user_ingresed'>Administrador</p>
								
								<div class='row' style='padding:0; margin:0;'>
									<a href='../account/profile.php' class='opc_user_side'>Ver Perfil</a>
								</div>
								
								<div class='row' style='padding:0; margin:0;'>
									<a href='../account/password.php' class='opc_user_side'>Editar contraseña</a>
								</div>
								<a href='../account/logout.php' class='opc_user_side' style='margin-top:10px;'>Cerrar sesión</a>

								
								
							</div>

							<div id='SIDE_cu_2' class='col s5 m5 l5'>
							<img src='' id='imagen_side_user'>
							</div>
						</div>

						<div class='row' id='SIDE_notificaciones'>
							<h4 style='color:rgb(40,40,40); font-size:1.7em; '>Notificaciones</h4>
							<p class='lbl_simply'>Recientes</p>

							<div class='row'>
								<div class='col s1' id='colis1'>
								<img src='../../web/img/icons/NewSmsICO_Small.png' >
								</div>
								<div class='col s1' id='colis2'>
								+1
								</div>
								<div class='col s10 right-align' id='colis3'>
								<a style='color:black;'> Actualizar</a>
								</div>
							</div>
							<div class='divider'></div>														
							
						
						</div>
						</ul>
				</header>
				<ul class='side-nav' id='mobile'>
					<li><a href='../producto'><i class='material-icons'>shop</i>Productos</a></li>
					<li><a href='../categoria'><i class='material-icons'>shop_two</i>Categorías</a></li>
					<li><a href='../usuario'><i class='material-icons'>group</i>Usuarios</a></li>
					<li><a class='dropdown-button' href='#' data-activates='dropdown-mobile'><i class='material-icons'>verified_user</i>Cuenta: <b>$_SESSION[username]</b></a></li>
				</ul>
				<ul id='dropdown-mobile' class='dropdown-content'>
					<li><a href='../account/profile.php'>Editar perfil</a></li>
					<li><a href='../account/password.php'>Cambiar clave</a></li>
					<li><a href='../account/logout.php'>Salir</a></li>
				</ul>
				<main class='container'>
					<h3 id='title_flat' class='center-align'>$title</h3>
			");
		}else{
			print("
				<header class='navbar-fixed'>
					<!--<nav class='teal'>
						<div class='nav-wrapper'>
							<a href='login.php' class='brand-logo'><i class='material-icons'>dashboard</i></a>
						</div>
					</nav>-->
				</header>
				<main class='container'>
			");
			$filename = basename($_SERVER['PHP_SELF']);
			if($filename != "login.php" && $filename != "register.php"){
				self::showMessage(3, "¡Debe iniciar sesión!", "../account/login.php");
				self::templateFooter();
				exit;
			}else{
				print("<!--<h3 id='title_flat' class='center-align'>$title</h3>-->");
			}
		}
	}

	public static function templateFooter(){
		print("
				</main>
				<footer id='fot_dis' >

    
       
    </div>
    
    <div class='sf_bottom_bar' id='foot_col'>
        <a href='#!' id='sf_bottom_bar_text' >Sabelofacil Dashboard  |   2018</a>
    </div>

</footer>
				<script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
				<script type='text/javascript' src='../../web/js/materialize.min.js'></script>
				<script type='text/javascript' src='../../web/js/dashboard.js'></script>
			</body>
			</html>
		");
	}
}
?>