<div id='container2'>
	<div class='centerlo' style='margin-bottom:26px;'>
		<p id='login_pritxt'>Iniciar Sesión</p>
		<p id='login_subtxt'>Bienvenido</p>
	</div>
	<form method='post' autocomplete='off'>
		<div class='row' style='margin:0; padding:0;'>
			<div class='input-field col s12 m12 'style='margin:0; padding:0;'>
				<p class='prefix_log'>Nombre de usuario</p>
				<input id='alias'  type='text' name='alias' class='validate' />
				
			</div>
		
		</div>
		<div class='row' style='margin:0; padding:0;'>

			<div class='input-field col s12 m12' style='margin:0; padding:0;'>
				<p class='prefix_log'>Contraseña</p>
				<input id='clave'  type='password' name='clave' class='validate' >
				
			</div>
		</div>
		
		<div class='row  center'style='margin:0; padding:0;' >
			<button type='submit' name='iniciar' class='btn-flat waves-effect white'>Aceptar</button>
		</div>
		<div class=' btn-flat waves-effect'style='margin:0; padding:0;' >
			
			<a  class=' btn-flat waves-effect white' href="recovery.php">Recuperar contraseña</a>
		</div>
		<div class="row" style='margin:0; padding:0;'>
                <h6 class="alert_text" id="lbl_error">Ingresa tu nombre de usuario<br>posteriormente verificaremos<br> tu identidad.</h6>
            </div>
	</form>
</div>

