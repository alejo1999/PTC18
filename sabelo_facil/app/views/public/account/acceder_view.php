<!-- Formularios para acceder -->
<div class='container' id='acceder'>
	<h4 class='center-align'>ACCEDER</h4>
	<ul class='tabs center-align'>
		<li class='tab'><a href='#cuenta'>CREAR CUENTA</a></li>
		<li class='tab'><a href='#sesion'>INICIAR SESIÓN</a></li>
	</ul>
	<!-- Formulario para nueva cuenta -->
	<div id='cuenta'>
		<form method='post'>
			<div class='row'>
				<div class='input-field col s12 m6'>
					<i class='material-icons prefix'>account_box</i>
					<input id='nombres' type='text' name='nombres' class='validate'>
					<label for='nombres'>Nombres</label>
				</div>
				<div class='input-field col s12 m6'>
					<i class='material-icons prefix'>account_box</i>
					<input id='apellidos' type='text' name='apellidos' class='validate'>
					<label for='apellidos'>Apellidos</label>
				</div>
				<div class='input-field col s12 m6'>
					<i class='material-icons prefix'>account_box</i>
					<input id='alias' type='text' name='alias' class='validate'>
					<label for='alias'>Alias</label>
				</div>
				<div class='input-field col s12 m6'>
					<i class='material-icons prefix'>email</i>
					<input id='correo' type='email' name='correo' class='validate'>
					<label for='correo' data-error='Error' data-success='Bien'>Correo</label>
				</div>
				<div class='input-field col s12 m6'>
        			<i class="material-icons prefix">insert_invitation</i>
            		<input id="fecha_nac" name="fecha_nac" type="text" class="datepicker">
            		<label for="fecha_nac">Fecha de nacimiento</label>
        		</div>
				<div class='input-field col s12 m6'>
					<?php
						Page::showSelect("Tipo de documento", "tipo_documento", $cliente->getTipoDocumento(), $cliente->getTipoDocumentos());
					?>
        		</div>
				<div class='input-field col s12 m6'>
          			<i class='material-icons prefix'>import_contacts</i>
          			<input id='documento_admin' type='text' name='documento' class='validate'/>
          			<label for='documento_admin'>Documento</label>
        		</div>
				<div class='input-field col s12 m6'>
					<i class='material-icons prefix'>security</i>
					<input id='clave1' type='password' name='clave1' class='validate'>
					<label for='clave1' data-error='Error' data-success='Bien'>Contraseña</label>
				</div>
				<div class='input-field col s12 m6'>
					<i class='material-icons prefix'>security</i>
					<input id='clave2' type='password' name='clave2' class='validate'>
					<label for='clave2' data-error='Error' data-success='Bien'>Confirmar contraseña</label>
				</div>
				<div class='input-field col s12'>
					<i class='material-icons prefix'>place</i>
					<textarea id='direccion' name='direccion' class='materialize-textarea'></textarea>
					<label for='direccion'>Dirección</label>
				</div>
			</div>
			<div class='row center-align'>
				<div class='col s12'>
					<input id='condicion' type='checkbox' name='condicion'>
					<label for='condicion'>Acepto <a href='#terminos' class="modal-trigger">términos y condiciones</a></label>
				</div>
				<div class='col s12'>
					<button type='submit' name='crear' class='btn waves-effect blue'><i class='material-icons'>send</i></button>
				</div>
			</div>
		</form>
	</div>
	<!-- Formulario para iniciar sesión -->
	<div id='sesion'>
		<form method='post'>
			<div class='row'>
				<div class='input-field col s12 m6 offset-m3'>
					<i class='material-icons prefix'>email</i>
					<input id='usuario' type='email' name='usuario' class='validate'>
					<label for='usuario' data-error='Error' data-success='Bien'>Correo</label>
				</div>
				<div class='input-field col s12 m6 offset-m3'>
					<i class='material-icons prefix'>security</i>
					<input id='clave' type='password' name='clave' class='validate'>
					<label for='clave' data-error='Error' data-success='Bien'>Contraseña</label>
				</div>
			</div>
			<div class='row center-align'>
				<button type='submit' name='iniciar' class='btn waves-effect blue'><i class='material-icons'>send</i></button>
			</div>
		</form>
	</div>
</div>