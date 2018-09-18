<?php

 require_once('config.php');
 require_once('../app/libraries/Pagadito.php');

if (isset($_GET["token"]) && $_GET["token"] != "") {

    $Pagadito = new Pagadito(UID, WSK);

    if (SANDBOX) {
        $Pagadito->mode_sandbox_on();
    }

    if ($Pagadito->connect()) {

        if ($Pagadito->get_status($_GET["token"])) {

            switch($Pagadito->get_rs_status())
            {
                case "COMPLETED":
                    
                     // Tratamiento para una transacción exitosa.
                    
                    $msgPrincipal = "Su compra fue exitosa";
                    $msgSecundario = '
                    Gracias por comprar con Pagadito.<br />
                    NAP(N&uacute;mero de Aprobaci&oacute;n Pagadito): <label class="respuesta">' . $Pagadito->get_rs_reference() . '</label><br />
                    Fecha Respuesta: <label class="respuesta">' . $Pagadito->get_rs_date_trans() . '</label><br /><br />';
                    break;
                
                case "REGISTERED":
                    
                    /*
                     Tratamiento para una transacción aún en
                      proceso.
                     */
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n fue cancelada.<br /><br />";
                    break;
                
                case "VERIFYING":
                    
                    /*
                     La transacción ha sido procesada en Pagadito, pero ha quedado en verificación.
                      En este punto el cobro xha quedado en validación administrativa.
                      Posteriormente, la transacción puede marcarse como válida o denegada;
                      por lo que se debe monitorear mediante esta función hasta que su estado cambie a COMPLETED o REVOKED.
                     */
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = '
                    Su pago est&aacute; en validaci&oacute;n.<br />
                    NAP(N&uacute;mero de Aprobaci&oacute;n Pagadito): <label class="respuesta">' . $Pagadito->get_rs_reference() . '</label><br />
                    Fecha Respuesta: <label class="respuesta">' . $Pagadito->get_rs_date_trans() . '</label><br /><br />';
                    break;
                
                case "REVOKED":
                    
                    /*
                      La transacción en estado VERIFYING ha sido denegada por Pagadito.
                      En este punto el cobro ya ha sido cancelado.
                     */
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n fue denegada.<br /><br />";
                    break;
                
                case "FAILED":
                    /*
                     * Tratamiento para una transacción fallida.
                     */
                default:
                    
                    /*
                     * Por ser un ejemplo, se muestra un mensaje
                     * de error fijo.
                     */
                    $msgPrincipal = "Atenci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n no fue realizada.<br /><br />";
                    break;
            }
        } else {
            /*
              En caso de fallar la petición, verificamos el error devuelto.
              Debido a que la API nos puede devolver diversos mensajes de
              respuesta, validamos el tipo de mensaje que nos devuelve.
             */

             //diferentesmensajes de error
            switch($Pagadito->get_rs_code())
            {
                case "PG2001":
                    /*Incomplete data*/
                case "PG3002":
                    /*Error*/
                case "PG3003":
                    /*Unregistered transaction*/
                default:
                    /*
                     * Por ser un ejemplo, se muestra un mensaje
                     * de error fijo.
                     */ ///////////////////////////////////////////////////////////////////////////////////////////////////////
                    $msgPrincipal = "Error en la transacci&oacute;n";
                    $msgSecundario = "La transacci&oacute;n no fue completada.<br /><br />";
                    break;
            }
        }
    } else {
        /*
         * En caso de fallar la conexión, verificamos el error devuelto.
         * Debido a que la API nos puede devolver diversos mensajes de
         * respuesta, validamos el tipo de mensaje que nos devuelve.
         */
        switch($Pagadito->get_rs_code())
        {
            case "PG2001":
                /*Incomplete data*/
            case "PG3001":
                /*Problem connection*/
            case "PG3002":
                /*Error*/
            case "PG3003":
                /*Unregistered transaction*/
            case "PG3005":
                /*Disabled connection*/
            case "PG3006":
                /*Exceeded*/
            default:
                /*
                 * Aqui se muestra el código y mensaje de la respuesta del WSPG
                 */
                $msgPrincipal = "Respuesta de Pagadito API";
                $msgSecundario = "
                        COD: " . $Pagadito->get_rs_code() . "<br />
                        MSG: " . $Pagadito->get_rs_message() . "<br /><br />";
                break;
        }
    }
} else {
    /*
     * Aqui se muestra el mensaje de error al no haber recibido el token por medio de la URL.
     */
    $msgPrincipal = "Atenci&oacute;n";
    $msgSecundario = "No se recibieron los datos correctamente.<br /> La transacci&oacute;n no fue completada.<br /><br />";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sabelo_Facil</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../web/css/default.css" media="screen" />
    </head>
    <body>


            </div>
        </div>
        <div class="clear"></div>
        <div class="wrapper">
            <label id="inicio"></label>
            <div class="seccion">Respuesta del Pago con Pagadito</div>
            <div class="clear"></div>
            <div class="row">
                <div class="imagenCompra">
                    <img src="../web/img/bolsa.png">
                </div>
                <div class="textoCompra">
                    <label id="principal"><?= $msgPrincipal ?></label><br />
                    <br />
                    <label id="secundario"><?= $msgSecundario ?></label>
                </div>
            </div>
            
            <form method="get" action="productos/index.php">
                <input type="submit" value="Volver a la Tienda" class="retorno" />
            </form>

        </div>
    </body>
</html>