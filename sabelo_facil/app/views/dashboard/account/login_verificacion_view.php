<link rel="stylesheet" type="text/css" href="../web/css/login_public.css">
<div class = "row espacio ">
    <form method='post' autocomplete="off">
        <div class=" col s12 m4 offset-m4 white-text opacidad center bordeado"> 
        <h4>Completa la autenticacion</h4> 

        <div id="img"> 
            <img src='<?php echo $qrCodeUrl; ?>' />
        </div>

        <h5>Enter Google Authenticator Code</h5>
        <h5><?php echo $llaveanterior; ?></h5>

        <input type="text" name="codigo_google" class="center" value="" />

        <input type="submit" name=verificar class="btn"/>
       

        </div>
    </form>
</div>