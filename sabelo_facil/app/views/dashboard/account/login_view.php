<div id='container2'>
	<div class='centerlo' style='margin-bottom:26px;'>
		<p id='login_pritxt'>Iniciar Sesión</p>
		<p id='login_subtxt'>Bienvenido</p>
	</div>
	<form method='post'>
		<div class='row' style='margin:0; padding:0;'>
			<div class='input-field col s12 m12 'style='margin:0; padding:0;'>
				<p class='prefix_log'>Nombre de usuario</p>
				<input id='alias' autocomplete="off" type='text' name='alias' class='validate' value='<?php print($object->getAlias()) ?>' required/>
				
			</div>
		
		</div>
		<div class='row' style='margin:0; padding:0;'>

			<div class='input-field col s12 m12' style='margin:0; padding:0;'>
				<p class='prefix_log'>Contraseña</p>
				<input id='clave' autocomplete='off' type='password' name='clave' class='validate' value='<?php print($object->getClave()) ?>' required/>
				
			</div>
		</div>
		
		<div class='row 'style='margin:0; padding:0;' >
			<button type='submit' name='iniciar' class='btn-flaty waves-effect'>Aceptar</button>
		</div>
		<div class="row" style='margin:0; padding:0;'>
                <h6 class="alert_text" id="lbl_error">Ingresa tu nombre de usuario<br>posteriormente verificaremos<br> tu identidad.</h6>
            </div>
	</form>
</div>

