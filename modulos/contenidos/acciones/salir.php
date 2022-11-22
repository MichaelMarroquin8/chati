<?php
include('../config/config.php');

session_start();
$IdUserSession = $_REQUEST['privilegio_idusuario'];

//Eliminando las  cookies  en session
setcookie ($_SESSION['privilegio_idusuario'], "", 1);
setcookie ($_SESSION['privilegio_idusuario'], false);
unset($_COOKIE[$_SESSION['privilegio_idusuario']]);


unset ($_SESSION['privilegio_idusuario']); // Eliminar el IdUser de usuario
session_unset(); //Eliminar todas las sesiones

// Terminar la sesión:
session_destroy();
$parametros_cookies = session_get_cookie_params();
setcookie(session_name(),0,1,$parametros_cookies["path"]);
    

date_default_timezone_set("America/Bogota" ) ;
$hora = date('h:i a',time() - 3600*date('I'));
$fecha = date("d/m/Y");
$UltimaSession = $fecha." ".$hora;

//ACTUALIZANDO EL ESTADO DE CONEXION DEL USUARIO ES DECIR, USUARIO DESCONECTADO.
$stateconexion = "dos";
$updateStateConexion = ("UPDATE usuarios SET linea='$stateconexion', fecha_session='$UltimaSession' WHERE idusuario='$IdUserSession' ");
$stateUpdate = mysqli_query($con, $updateStateConexion);
if ($stateUpdate >0) {
	echo '<meta http-equiv="refresh" content="0;url=../index.php">';
}

?>
