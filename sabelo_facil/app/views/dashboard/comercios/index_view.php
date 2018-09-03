<main class='container'>
<div class='row'>   
    <form method='post' autocomplete="off">
        <div class='input-field col s6 m4'>
            <i class='material-icons prefix'>search</i>
            <input id='buscar' type='text' name='busqueda'/>
            <label for='buscar'>Escribe para buscar</label>
        </div>
        <div class='input-field col s6 m4'>
            <button type='submit' name='buscar' class='btn waves-effect green tooltipped' data-tooltip='Buscar por nombre o apellido'><i class='material-icons'>check_circle</i></button>
        </div>
    </form>
    <div class='input-field center-align col s12 m4'>
        <a href='create.php' class='btn waves-effect indigo tooltipped' data-tooltip='Crear usuario'><i class='material-icons'>add_circle</i></a>
    </div>
</div>
<table class='highlight'>
	<thead>
		<tr>
			<th>Comercio</th>
			<th>Responsable</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($data as $row){
		print("
		<tr>
			
			<td>$row[nombre]</td>
			<td>$row[responsable]</td>
			<td>$row[telefono]</td>
			<td>$row[correo]</td>
			<td><i class='material-icons'>".($row['FK_ID_estado_comercio']?"visibility":"visibility_off")."</i></td>
			<td>
				<a href='update.php?id=$row[ID_comercio]' class='blue-text'><i class='material-icons'>mode_edit</i></a>

			</td>
		</tr>
		");
	}
	?>
	</tbody>
</table>
</main>