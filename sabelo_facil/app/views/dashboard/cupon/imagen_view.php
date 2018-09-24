<div class="row">
    <div class='col s12 m12 l12 '>
            <div class="col s12 m4 l3">
                <h4>Imagen Cupon</h4>
            </div>
            <form method='post' autocomplete="off">
            </form>
            <div class='col s12 m2 l2 offset-l6   '>
                <!-- boton de agregar nuevos productos-->
                        <a class="  btn-large  waves-effect waves-light light-blue lighten-1 right " href="create_imagen.php">
                        Agregar nueva imagen
                        </a>
            </div>
    </div>
</div> 

<table class=' highlight responsive-table centered ' id='mi_tabla' >
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre Cupon</th>
            <th>Accion</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
	foreach($data as $row){
		print("
		<tr>
            <td><img src='../../web/img/cupones/$row[url_imagen]' class='' width='200' height='200'></td>
            <td>$row[nombre_cupon]</td>
            
            <td>
                
                <a href='delete_imagen.php?id=$row[ID_imgcupon]' id='space' class='waves-effect waves-light'href='#'><i class='material-icons red-text'>delete</i></a>
            </td>
            
		</tr>
		");
	}
	?>
    </tbody>
</table>