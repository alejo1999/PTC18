       
<div id="main_bloc_t">
    <div class=" ">
    <?php 

    echo('<div class="row">');
    
    
    echo("<div class='col s12 m4 l2       '>
            <!--<div class='input-field col s12 m12 l12 '>
                <input placeholder='Buscar aquí' id='search' type='text' class='validate'>
            </div>-->
            <div class='col s12 m12 l12'>
                <h5>Categorias</h5>
            </div>
            <div class='col s12 m12 l12'>
        ");
        foreach($categorias as $caterin){
            print("
                
                    <a href='index.php?id=$caterin[ID_categoria]' style='border-radius: 25px;' class='btn-large black-text collapsible-header waves-effect waves-light'>
                        <h6>$caterin[nombre_categoria]</h6>
                    </a>
                
            ");
        }

            
        echo(" 
                </div>
            </div>
            <div class=' col s12 m8 l10   '>
        <div class='espaciado'>");                
                   
        
        foreach($productos as $productitos){
            print("
                <div class='col s12 m6 l3'>
                    <div class='card' id='colored' >
                        <div class='card-image ' >
                        <img  height='180 px' src='../../web/img/productos/$productitos[imagen_url]'>
                        </div>
                        <div class='card-content' style='padding-left:0; padding-right:0; padding-top:0;'>
                            <a id='btn_add_prod' class=' card-title modal-trigger' href='detalle_producto.php?id=$productitos[ID_producto]'>$productitos[nombre_producto]<h style='font-size:13px;color:wheat; '> Agregar</h></a>
                            <span class='teal-text card-title' style='margin-top:10px; width:100%; text-align:center;'>Precio : $ $productitos[precio]</span>
                            <p style='width:100%; text-align:center;'>$productitos[descripcion]</p>
                        </div>
                    </div>    
                </div>
            ");
        }
                    
                 ?>   

                </div>

                <div class="col s12 m12 l12 center">
                  <?php
                  //seleccionar todo de la tabla usuarios
                  $resultado=$producto->getCategoriaProductos2();

                  //Contar el total de registros
                  $total_registros = count($resultado);

                  //usando ceil para dividir el total de registros entre $por_pagina este ultimo es de 5
                  $total_paginas = ceil($total_registros / $por_pagina);

                  //link a primera pagina
                  print("<ul class='pagination'><li class='waves-effect'><a href='index.php?id=".$producto->getCategoria()."&pagina=1'><i class='material-icons'>chevron_left</i></a></li>");

                  for ($i=1; $i<=$total_paginas; $i++) {

                  print("<li class='waves-effect teal lighten-2'><a href='index.php?id=".$producto->getCategoria()."&pagina=".$i."'>".$i."</a></li>");
                  
                  };
                  
                  // link a la ultima pagina
                  print("<li class='waves-effect'><a href='index.php?id=".$producto->getCategoria()."&pagina=$total_paginas'><i class='material-icons'>chevron_right</i></a></li></ul>");
                  
                  ?>
                </div>
            </div>

            

        </div>
    </div>

       
</div>
</div>