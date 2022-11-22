<?php
include('../config/config.php');
$nombre_equipo_user = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$filename           = $_FILES["namearchivo"]["name"];
$source             = $_FILES["namearchivo"]["tmp_name"];
$to_user            = $_REQUEST['to_user'];
$user               = $_REQUEST['user'];
$tokeng             = $_REQUEST['tokeng'];


//Renombrando el nombre de la imagen
$logitudPass    = 10;
$newNameFoto    = substr( md5(microtime()), 1, $logitudPass);

$explode        = explode('.', $filename);
$extension_foto = array_pop($explode);
$nuevoNameFoto  = $newNameFoto.'.'.$extension_foto;


$user_id 	  = $_POST['user_id'];
$to_id 		  = $_POST['to_id'];
$leido 			      = "NO";
date_default_timezone_set("America/Bogota" ) ;
$hora             = date('h:i a',time() - 3600*date('I'));
$fecha            = date("d/m/Y");
$FechaMsj         = $fecha." ".$hora;

$directorio = '../archivos/';
if(!file_exists($directorio)){
  mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
}

$dir         = opendir($directorio);
$target_path = $directorio.'/'.$nuevoNameFoto;

if(move_uploaded_file($source, $target_path)) {
  
  $sqlInsertImg = ("INSERT INTO msjs(user,user_id,to_user,to_id,fecha,nombre_equipo_user,leido,archivos,tokeng) VALUES('$user','$user_id','$to_user','$to_id','$FechaMsj','$nombre_equipo_user','$leido','$nuevoNameFoto','$tokeng')");
  $resulInsertImg = mysqli_query($con, $sqlInsertImg);
    include('../MsjsUsers.php');
} else {
echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
}
closedir($dir);
?>
