<form method='post' enctype='multipart/form-data'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input id='nombre' type='text' name='nombre' class='validate' value='<?php print($Proveedor->getNombre()) ?>' required/>
          	<label for='nombre'>Nombre</label>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>email</i>
          	<input id='correo' type='email' name='correo' class='validate' value='<?php print($Proveedor->getCorreo()) ?>' required/>
          	<label for='correo'>Correo electronico</label>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>description</i>
          	<input id='telefono' type='text' name='telefono' class='validate' value='<?php print($Proveedor->getTelefono()) ?>' required/>
          	<label for='telefono'>Telefono</label>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>description</i>
          	<input id='direccion' type='text' name='direccion' class='validate' value='<?php print($Proveedor->getDireccion()) ?>' required/>
          	<label for='direccion'>Dirección</label>
        </div>
        
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='crear' class='btn waves-effect blue tooltipped' data-tooltip='Crear'><i class='material-icons'>save</i></button>
    </div>
</form>