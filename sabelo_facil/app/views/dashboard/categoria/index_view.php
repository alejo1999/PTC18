<<<<<<< HEAD
<div class="row">
    <div class='col s12 m12 l12 '>
            <div class="col s12 m4 l3">
                <h4>Categorias</h4>
            </div>
            <form method='post'>
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
			
		    <th>imagen</th>
            <th>Nombre</th>
            <th>Descripcion</th>
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
			<td>$row[descripcion_categoria]</td>
            <td>
                <a href='update.php?id=$row[ID_categoria]' class='waves-effect waves-light'><i class='material-icons white-text'>create</i></a>
                <a href='delete.php?id=$row[ID_categoria]' id='space'onclick='borrar_producto()' class='waves-effect waves-light'href='#'><i class='material-icons red-text'>delete</i></a>
=======
<main class='container'>
<div class='row'>   
    <form method='post'>
        <div class='input-field col s6 m4'>
            <i class='material-icons prefix'>search</i>
            <input id='buscar' type='text' name='busqueda'/>
            <label for='buscar'>Buscador</label>
        </div>
        <div class='input-field col s6 m4'>
            <button type='submit' name='buscar' class='btn waves-effect green tooltipped' data-tooltip='Buscar por nombre o descripción'><i class='material-icons'>check_circle</i></button>
        </div>
    </form>
    <div class='input-field center-align col s12 m4'>
        <a href='create.php' class='btn waves-effect indigo tooltipped' data-tooltip='Crear categoría'><i class='material-icons'>add_circle</i></a>
    </div>
</div>
<table class='highlight'>
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>ESTADO</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($data as $row){
		print("
		<tr>
			<td><img src='../../web/img/categorias/$row[imagen_url]' class='materialboxed' width='100' height='100'></td>
			<td>$row[nombre_categoria]</td>
			<td><i class='material-icons'>".($row['Estado']?"visibility":"visibility_off")."</i></td>
			<td>
				<a href='update.php?id=$row[ID_categoria]' class='blue-text'><i class='material-icons'>mode_edit</i></a>
				<a href='delete.php?id=$row[ID_categoria]' class='red-text'><i class='material-icons'>delete</i></a>
>>>>>>> 37eb9114fc83aeb028be4baca539f1898e029ea1
			</td>
		</tr>
		");
	}
	?>
    </tbody>
</table>