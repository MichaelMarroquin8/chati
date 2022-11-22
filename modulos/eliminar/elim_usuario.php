<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Chati</title>
		<link rel="shortcut icon" href="../imagenes/favicon.png">
		<script src="../sweet/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" href="../sweet/dist/sweetalert2.min.css">
	</head>
<body bgcolor="#ffffff" style="color:#ffffff;font-family: sans-serif;">
<?php

include("../conex/conn.php");

$idusuario = $_GET['idusuario'];
$estado = $_GET['estado'];

$sql1="UPDATE usuarios SET estado='$estado' WHERE idusuario='$idusuario'";
$resultado = mysqli_query($conexion,$sql1);

if ($resultado) {

		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Usuario eliminado correctamente!'
            }).then(function() {
                window.location = '../usuarios.php';
            });
		
        </script>";

        }else{

			 echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Ops!',
        text:  'Ocurrió un error, por favor intente nuevamente!'
            }).then(function() {
                window.location = '../usuarios.php';
            });
		
        </script>";

        }
?>
</body>
</html>