<form method='post' autocomplete="off">
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>business</i>
          	<input id='nombres' type='text' name='nombres' class='validate' value='<?php print($Comercios->getNombre()) ?>' required/>
          	<label for='nombres'>Nombre de proveedor</label>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input id='responsale' type='text' name='responsable' class='validate' value='<?php print($Comercios->getResponsable()) ?>' required/>
          	<label for='documento_admin'>Responsable</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' value='<?php print($Comercios->getCorreo()) ?>' required/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>phone</i>
          	<input id='telefono' type='number' name='telefono' class='validate' value='<?php print($Comercios->getTelefono()) ?>' required/>
          	<label for='direccion_admin'>Telefono</label>
        </div>

        <div class='switch'>
                    <span>Estado:</span>
                    <label>
                        <i class='material-icons'>visibility_off</i>
                        <input type='checkbox' name='estado' <?php print($Comercios->getEstado()?"checked":"") ?>/>
                        <span class='lever'></span>
                        <i class='material-icons'>visibility</i>
                    </label>
        </div>

    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='actualizar' class='btn waves-effect blue tooltipped' data-tooltip='Actualizar'><i class='material-icons'>save</i></button>
    </div>
</form>