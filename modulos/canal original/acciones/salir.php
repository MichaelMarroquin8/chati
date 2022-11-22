<?php
include('../config/config.php');
$IdUserSession = $_REQUEST['id'];
session_start();
session_destroy();
$parametros_cookies = session_get_cookie_params();
setcookie(session_name(),0,1,$parametros_cookies["path"]);


date_default_timezone_set("America/Bogota" ) ;
$hora = date('h:i a',time() - 3600*date('I'));
$fecha = date("d/m/Y");
$UltimaSession = $fecha." ".$hora;

//ACTUALIZANDO EL ESTADO DE CONEXION DEL USUARIO ES DECIR, USUARIO DESCONECTADO.
$stateconexion = "Inactiva";
$updateStateConexion = ("UPDATE users SET estatus='$stateconexion', fecha_session='$UltimaSession' WHERE id='$IdUserSession' ");
$stateUpdate = mysqli_query($con, $updateStateConexion);
if ($stateUpdate >0) {
	header("location:../index.php");
}

?>
