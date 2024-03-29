<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Sigma Docs</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<script src="sweet/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" href="sweet/dist/sweetalert2.min.css">
	</head>
<body bgcolor="#ffffff" style="color:#ffffff;font-family: sans-serif;">
<?php 
include("conex/conn.php");
		  
$idusuario    = $_POST['idusuario'];
$foto 		  = $_POST['foto'];
$enlace       = $_POST['enlace'];

$ruta="".$foto;
unlink($ruta);

$name_array     = $_FILES['file_array']['name'];
$tmp_name_array = $_FILES['file_array']['tmp_name'];
$type_array     = $_FILES['file_array']['type'];
$size_array     = $_FILES['file_array']['size'];

$lugar1         ="foto/".$enlace."_".$name_array;

//PARAMETROS
$patch      ='foto';
$max_ancho  = 1280;
$max_alto   = 900;

if($_FILES['file_array']['type']=='image/png' || $_FILES['file_array']['type']=='image/jpeg' || $_FILES['file_array']['type']=='image/gif'){
$medidasimagen= getimagesize($_FILES['file_array']['tmp_name']);
    if($medidasimagen[0] < 1280 && $_FILES['file_array']['size'] < 100000){
    move_uploaded_file($_FILES['file_array']['tmp_name'], $patch.'/'.$enlace.'_'.$name_array);

}else{

$nombrearchivo=$_FILES['file_array']['name'];

//Redimensionar
$rtOriginal=$_FILES['file_array']['tmp_name'];

if($_FILES['file_array']['type']=='image/jpeg'){
$original = imagecreatefromjpeg($rtOriginal);
}
else if($_FILES['file_array']['type']=='image/png'){
$original = imagecreatefrompng($rtOriginal);
}
else if($_FILES['file_array']['type']=='image/gif'){
$original = imagecreatefromgif($rtOriginal);
}


list($ancho,$alto)=getimagesize($rtOriginal);
$x_ratio = $max_ancho / $ancho;
$y_ratio = $max_alto / $alto;


if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
    $ancho_final = $ancho;
    $alto_final = $alto;
}
elseif (($x_ratio * $alto) < $max_alto){
    $alto_final = ceil($x_ratio * $alto);
    $ancho_final = $max_ancho;
}
else{
    $ancho_final = ceil($y_ratio * $ancho);
    $alto_final = $max_alto;
}

$lienzo=imagecreatetruecolor($ancho_final,$alto_final);
imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
//imagedestroy($original);

$cal=8;

if($_FILES['file_array']['type']=='image/jpeg'){
imagejpeg($lienzo,$patch."/".$enlace.'_'.$nombrearchivo);
}
else if($_FILES['file_array']['type']=='image/png'){
imagepng($lienzo,$patch."/".$enlace.'_'.$nombrearchivo);
}
else if($_FILES['file_array']['type']=='image/gif'){
imagegif($lienzo,$patch."/".$enlace.'_'.$nombrearchivo);
}

}
	
	
$sql1=("UPDATE usuarios SET foto='".$lugar1."' WHERE idusuario='$idusuario'");
$resultado = mysqli_query($conexion,$sql1);	

if($resultado){

	 echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Datos Actualizados Exitosamante!'
            }).then(function() {
                window.location = 'perfil.php?idusuario=$idusuario';
            });
		
        </script>";		
}else{
    echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Oops!',
        text:  'Ocurrio un error, por favor intente nuevamente'
            }).then(function() {
                window.location = 'perfil.php?idusuario=$idusuario';
            });
		
        </script>";
}

}


?>
</body>
</html>