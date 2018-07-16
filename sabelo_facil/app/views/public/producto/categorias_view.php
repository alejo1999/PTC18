       
<div id="main_bloc_t">
    <div class=" ">
    <?php 

    echo('<div class="row">');
    
    
    echo("<div class='col s12 m4 l2       '>
            <div class='input-field col s12 m12 l12 '>
                <input placeholder='Buscar aquí' id='search' type='text' class='validate'>
            </div>
            <div class='col s12 m12 l12'>
                <h5>Categorias</h5>
            </div>
            <div class='col s12 m12 l12'>
        <ul class='collapsible' data-collapsible='accordion'>");
        foreach($categorias as $caterin){
            print("
                <li>
                    <a class='btn-large black-text collapsible-header waves-effect waves-light'>
                        <h6>$caterin[nombre_categoria]</h6>
                    </a>
                </li>
            ");
        }

            
        echo(" </ul>
                </div>
            </div>
            <div class=' col s12 m8 l10   '>
        <div class='espaciado'>");                
                   
        foreach($productos as $productitos){
            print("
                <div class='col s12 m4 l3'>
                    <div class='card'>
                        <div class='card-image '>
                        <img  height='250 px' src='../../web/img/productos/$productitos[imagen_url]'>
                        </div>
                        <div class='card-content'>
                            <a class='black-text card-title modal-trigger' href='detalle_producto.php?id=$productitos[ID_producto]'>$productitos[nombre_producto]</a>
                            <span class='teal-text card-title'>$productitos[precio]</span>
                            <p>$productitos[descripcion]</p>
                        </div>
                    </div>    
                </div>
            ");
        }
                    
                 ?>   

                </div>
            </div>

            

        </div>
    </div>

       
</div>
</div>