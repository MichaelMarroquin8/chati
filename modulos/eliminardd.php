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

$id_detalle = $_GET['id_detalle'];
$idprs = $_GET['idprs'];

$id_g = $_GET['id_g'];
$estatus    = $_GET['estatus'];
$quieneli   = $_GET['quieneli'];

$sql1="UPDATE general SET estado='$estatus',quieneli='$quieneli' WHERE id_g='$id_g'";
$resultado = mysqli_query($conexion,$sql1);

if ($resultado) {

		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Concepto eliminado correctamente!'
            }).then(function() {
                window.location = 'detalle_dd.php?id_detalle=$id_detalle&idprs=$idprs';
            });
		
        </script>";

        }else{

			 echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Ops!',
        text:  'No se pudo eliminar el detalle seleccionado!'
            }).then(function() {
                window.location = 'detalle_dd.php?id_detalle=$id_detalle&idprs=$idprs';
            });
		
        </script>";

        }
?>
</body>
</html>