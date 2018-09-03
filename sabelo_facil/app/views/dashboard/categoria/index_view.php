<div class="row">
    <div class='col s12 m12 l12 '>
            <div class="col s12 m4 l3">
               
            </div>
            <form method='post' autocomplete="off">
                <div class="col s10 m5 l5 ">
                        
                            <div class="input-field">
                                <i class="material-icons prefix">search</i>
                                <input id="icon_prefix" name='busqueda' type="text" class="validate">
                                <label for="icon_prefix">buscar</label>
                            </div>
                        
                </div>
                <div class="col s2 m1 l2 ">
                        <button type='submit' name='buscar' class='espaciado btn waves-effect #1de9b6 teal accent-3 tooltipped' data-tooltip='Buscar por nombre o descripción'><i class='material-icons'>check_circle</i></button>
                </div>
            </form>
            <div class='col s12 m2 l2   '>
                <!-- boton de agregar nuevos productos-->
                        <a class=" espaciado btn-floating btn-large  waves-effect waves-light light-blue lighten-1 right " href="create.php">
                        <i class="large material-icons">add</i>
                        </a>
            </div>
    </div>
</div> 

<table class=' highlight responsive-table centered '>
    <thead>
        <tr>
			
		    <th>Imagen</th>
            <th>Nombre</th>
            <th>Accion</th> 
        </tr>
    </thead>
    <tbody>
    <?php
	foreach($data as $row){
		print("
		<tr>
			<td><img src='../../web/img/categoria/$row[imagen_url]' class='materialboxed' width='100' height='100'></td>
			<td>$row[nombre_categoria]</td>
			
            <td>
                <a href='update.php?id=$row[ID_categoria]' class='waves-effect waves-light'><i class='material-icons white-text'>create</i></a>
            </td>
		</tr>
		");
	}
	?>
    </tbody>
</table>