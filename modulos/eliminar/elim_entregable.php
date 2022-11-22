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

$idesp = $_GET['idesp'];
$refedos = $_GET['refedos'];

$identre = $_GET['identre'];
$estadoe = $_GET['estadoe'];
$quieneli = $_GET['quieneli'];

$sql1="UPDATE detalle_entrega SET estadoe='$estadoe',quieneli='$quieneli' WHERE identre='$identre'";
$resultado = mysqli_query($conexion,$sql1);

if ($resultado) {

		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Entregable eliminado correctamente!'
            }).then(function() {
                window.location = '../lista_entregables.php?idesp=$idesp&refuno=$refedos';
            });
		
        </script>";

        }else{

			 echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Ops!',
        text:  'Ocurrió un error, por favor intente nuevamente!'
            }).then(function() {
                window.location = '../lista_entregables.php?idesp=$idesp&refuno=$refedos';
            });
		
        </script>";

        }
?>
</body>
</html>