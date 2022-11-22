<?php

$nameUser ="Alberto Fodor";
$paraCliente    = 'fodorsgroup@gmail.com';
//$paraCliente    = $emailUser;
$tituloCliente  = "Notificacion KT-Connect";
$mensajeCliente = "<html>".
    "<head><title>Email desde ...</title>".
        "<style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Nunito', sans-serif;
    color: #333;
    font-size: 14px;
    background:#222;
}
.contenedor{
    width: 80%;
    min-height:auto;
    text-align: center;
    margin: 0 auto;
    padding: 40px;
    background: #ececec;
    border-top: 3px solid #E64A19;
    }
    .hola{
    color:#333;
    font-size:25px;
    font-weight:bold;
    }
    img{
    margin-left: auto;
    margin-right: auto;
    display: block;
    padding:0px 0px 20px 0px;
   }
</style>
</head>".
    "<body>" .
        "<div class='contenedor'>".
            "<p>&nbsp;</p>" .
            "<p>&nbsp;</p>" .
                "<span>Hola! <strong class='hola'>" . $nameUser . " . . .!</strong></span>" .
                "<p>&nbsp;</p>" .
                "<p>El usuario <strong>" . $nameUser . "</strong> te asignó una nueva tarea <br> fecha de vencimiento: <br> Estado: .</p> " .
                "<p>&nbsp;</p>" .
        "<p>&nbsp;</p>" .
        "<p>¡Por favor verifica!</p>" .
        "<p><a title='maintenancesolutionapp.com' href='https://maintenancesolutionapp.com/' target='_blank'><img src='https://maintenancesolutionapp.com/modulos/imagenes/kallogo.png' alt='' width='100px' /></p>" .
    "</div>" .
    "</body>" .
"</html>";

$cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
$cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabecerasCliente .= 'From: Kaltire <info@kaltire.com>';
$enviadoCliente   = mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);

?>