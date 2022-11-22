<?php
include('../config/config.php');
date_default_timezone_set("America/Bogota" ) ;
$FechaMsj             = date('d/m/Y h:i a',time() - 3600*date('I'));

if (count($_FILES) <= 0 || empty($_FILES["audio"])) {
    exit();
}


# De dónde viene el audio y en dónde lo ponemos
$rutaAudioSubido  = $_FILES["audio"]["tmp_name"];
$nuevoNombre      = uniqid() . ".webm";
$rutaDeGuardadoBD = "archivos/audios/" . $nuevoNombre;
$rutaDeGuardadoLocal = "../archivos/audios/" . $nuevoNombre;


$user_id            = $_REQUEST['user_id'];
$to_id              = $_REQUEST['to_id'];
$user               = $_REQUEST['user'];
$to_user            = $_REQUEST['to_user'];
$tokeng             = $_REQUEST['tokeng'];
$nombre_equipo_user = gethostbyaddr($_SERVER['REMOTE_ADDR']);

if(move_uploaded_file($rutaAudioSubido, $rutaDeGuardadoLocal)) {
  $leido = "NO";
  $NuevoMsj  = ("INSERT INTO msjs (user,user_id,to_user,to_id,fecha,nombre_equipo_user,leido,archivos,tokeng) 
  VALUES ('$user', '$user_id', '$to_user', '$to_id', '$FechaMsj', '$nombre_equipo_user', '$leido', '$rutaDeGuardadoBD', '$tokeng')");
  $reg = mysqli_query($con, $NuevoMsj);


}

?>