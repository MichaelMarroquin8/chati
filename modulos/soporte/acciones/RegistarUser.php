<?php
include('../config/config.php');

//Limpiando input
$nombre_apellido = filter_var($_REQUEST['nombre_comple'], FILTER_SANITIZE_STRING);
//Limpiando campo emailusuario para evitar inyeccion SQL
$correo = filter_var($_REQUEST['emailusuario'], FILTER_SANITIZE_EMAIL);
  if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $email 	 = ($_REQUEST['emailusuario']);
  }

$pass 		 = trim($_POST['password']); //Quitando algun espacio en blanco
$img 	     = $_FILES['imagenPerfil']['name'];
$file_loc    = $_FILES['imagenPerfil']['tmp_name'];
$mimeType    = $_FILES["imagenPerfil"]["type"];


$fileExtension  = substr(strrchr($img, '.'), 1);
$logitudpass 	= 10;
$newname 		= substr( md5(microtime()), 1, $logitudpass);
$imgperfil 		= $newname.'.'.$fileExtension;


//Verificando si existe el directorio de lo contarios lo creamos el Directorio
$directorio = "../../";
if (!file_exists($directorio)) {
	mkdir($directorio, 0777, true);
}


$dir            = opendir($directorio);
$target_path 	= $directorio.'/'.$imgperfil;

//Moviendo imagen de Perfil
if(move_uploaded_file($file_loc, $target_path)) {
//Si la Imagen se guarda en el directorio, creamos un insert del Registro
date_default_timezone_set("America/Bogota" );
$hora   		= date('h:i a',time() - 3600*date('I'));
$fecha  		= date("d/m/Y");
$fechaRegistro 	= $fecha." ".$hora;
$estatus 		= "uno";

$sql_insert = ("INSERT INTO 
	usuarios (
		emailusuario,
		pasusuario,
		nombre_comple,
		foto,
		fecha_registro,
		linea
	) 
VALUES (
		'$email',
		'$pass',
		'$nombre_apellido',
		'$imgperfil',
		'$fechaRegistro',
		'$estatus'
		)");
$result_insert = mysqli_query($con, $sql_insert);
	if($result_insert >0){
		header("location:../index.php");
	}

        } else {
        echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
    }
    closedir($dir);
?>