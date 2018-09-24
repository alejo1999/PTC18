       
<div id="main_bloc_t">
    <div class=" ">

    
    <?php 

    echo('<div class="row">');
    
    
    echo("<div class='col s12 m4 l2       '>
            <!--<div class='input-field col s12 m12 l12 '>
                <input placeholder='Buscar aquí' id='search' type='text' class='validate'>
            </div>-->
            <div class='col s12 m12 l12'>
                <h5>Cupones Categorias</h5>
            </div>
            <div class='col s12 m12 l12'>
        ");
        foreach($categorias as $caterin){
            print("
                
                    <a style='border-radius: 25px;' class='btn-large black-text collapsible-header waves-effect waves-light'>
                        <h6>$caterin[nombre_categoria]</h6>
                    </a>
                
            ");
        }

            
        echo(" 
                </div>
            </div>
            <div class=' col s12 m8 l10   '>
            <div class='row center-align'><h4>Cupones electronicos</h4></div>
        <div class='espaciado'>");                
                   
        
        foreach($cupones as $cuponess){
            print("
                <div class='col s12 m6 l3'>
                    <div class='card' id='colored' >
                        <div class='card-image ' >
                        <img  height='180 px' src='../../web/img/cupones/$cuponess[img_url]'>
                        </div>
                        <div class='card-content' style='padding-left:0; padding-right:0; padding-top:0;'>
                            <a id='btn_add_prod' class=' card-title modal-trigger' href='detalle_cupon.php?id=$cuponess[ID_cupon]'>$cuponess[nombre_cupon]<h style='font-size:13px;color:wheat; '> Agregar</h></a>
                            <span class='teal-text card-title' style='margin-top:10px; width:100%; text-align:center;'>Precio : $ $cuponess[precio]</span>
                            <p style='width:100%; text-align:center;'>$cuponess[descripcion]</p>
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