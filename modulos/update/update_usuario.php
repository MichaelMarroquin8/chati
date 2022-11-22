<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>KT Connect</title>
		<link rel="shortcut icon" href="../imagenes/favicon.png">
		<script src="../sweet/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" href="../sweet/dist/sweetalert2.min.css">
	</head>
<body bgcolor="#ffffff" style="color:#ffffff;font-family: sans-serif;">
<?php
include("../conex/conn.php");

$idusuario		= $_POST['idusuario'];
$sitio			= $_POST['sitio'];
$usuario_nom	= $_POST['usuario_nom'];
$nombre_comple	= $_POST['nombre_comple'];
$apellidos		= $_POST['apellidos'];
$cedula			= $_POST['cedula'];
$emailusuario	= $_POST['emailusuario'];
$pasusuario		= $_POST['pasusuario'];
$estatus		= $_POST['estatus'];
$cargo			= $_POST['cargo'];

		  
	$sql1="update usuarios set sitio='$sitio',usuario_nom='$usuario_nom',nombre_comple='$nombre_comple',apellidos='$apellidos'
    ,cedula='$cedula',emailusuario='$emailusuario',pasusuario='$pasusuario',estatus='$estatus'
	,cargo='$cargo' where idusuario='$idusuario'";

	
$resultado = mysqli_query($conexion,$sql1);

if($resultado){

	echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Datos Actualizados Exitosamante!'
            }).then(function() {
                window.location = '../editar_usuario.php?idusuario=$idusuario';
            });
		
        </script>";	
}else{
    echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Oops!',
        text:  'Ocurrio un error, por favor intente nuevamente'
            }).then(function() {
                window.location = '../editar_usuario.php?idusuario=$idusuario';
            });
		
        </script>";
}		
?>
</body>
</html>