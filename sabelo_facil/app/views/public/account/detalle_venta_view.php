<!--- Informacion del carrito y mis productos -->
<!--Creo un contenedor para la informacion del carrito -->
<div class="container">
    <div class="row">
        <h2 style="color: rgb(30,140,100); font-family: calibri light">Productos</h2>

<!--Aqui empieza la tabla de carrito -->
<table class=' highlight responsive-table centered ' id='mi_tabla'  >
    <thead>
        <tr>
        
            <th>Imagen</th>
            <th>Nombre Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
	foreach($carritos as $carrito2){
        
        print("
        
        <tr>
            
			<td><img src='../../web/img/productos/$carrito2[imagen_url]' class='' width='100' height='100'></td>
            <td>$carrito2[nombre_producto]</td>
            <td>$carrito2[cantidad]</td>
            <td>$carrito2[precio]</td>
            <td>$carrito2[sub_total]</td>
            
            
		</tr>
		");
	}
	?>
    </tbody>
</table>

    <?php
    
    print("
    <div class='divider'></div>
    <!--Aqui termina la tabla de productos -->
      <div class='col s12 m12 l12'>
          <div class='col s12 m6 offset-m7 l2 offset-l10'>
              
              <h4 style='color: rgb(30,140,100); font-family: calibri light; margin-top: 40px;'>Total:$ ".$carrito->getTotal()."</h4>
              <div class='btn '>
                <a class='white-text' href='../cuenta/comprasrealizadas.php' >Regresar</a>
              </div>
                  
    ");
        ?>
            
          </div>
      </div>
      



    


  </div>
  </div>
</div>