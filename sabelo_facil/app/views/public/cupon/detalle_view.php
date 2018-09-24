
<div class='container'>
    
    <div class='row'>
        <div class="col s12 m12 l12 ">
            <?php
            //echo($valoracion->getValoracion());
            print("
                    <div class='card '>
                        <div class='card-stacked'>
                        <form method='post'>
                                <div class='card-content col s12 m12 l12'>
                                    <div class='col s12 m7  l3 offset-l3'><img src='../../web/img/cupones/".$cupon->getImagen()."' height='200px'>
                                    </div>
                                    <div class='col s12 m5 l5'>
                                        <h4 class=''>".$cupon->getNombre()."</h4>
                                        <h6>".$cupon->getDescripcion()."</h6>
                                        <h5><b>Precio (US$) ".$cupon->getPrecio()."</b></h5>
                                        
                                        <h5><b>Vendidos :  ".$cupon->getVendidos()."</b></h5>
                                        <h5><b>Oferta finaliza :  ".$cupon->getFechafinal()."</b></h5>
                                    </div>
                                </div>
                            <div class='card-action'>
                                
                                    <div class='row '>
                                    
                                        <div class='input-field col s5 m5 l2 offset-l4'>
                                            <i class='material-icons prefix'>list</i>
                                            <input id='cantidad' type='number' name='cantidad' min='1'  value='<?php print(".$cupon->getExistencia().") ?>' class='validate' required>
                                                
                                            <label for='cantidad'>Cantidad</label>
                                        </div>
                                        <div class='input-field col s12 m7 l6'>
                                        <input type='submit' class='btn' name='anadircarrito' value='Añadir al carrito'>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                ");
            ?>
            

                
            
       

        

  </div>       