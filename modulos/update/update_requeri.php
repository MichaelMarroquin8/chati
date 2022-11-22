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

$idetals		= $_POST['idetals'];
$conn			= $_POST['conn'];
$trabajo		= $_POST['trabajo'];
$idrequeri		= $_POST['idrequeri'];

$titulo		    = $_POST['titulo'];
$descrip		= $_POST['descrip'];
$fechavenci		= $_POST['fechavenci'];

$refuno		    = $_POST['refuno'];
$etiquetauno    = $_POST['etiquetauno'];

		  
	$sql1="update detalle_espacios set trabajo='$trabajo',idrequeri='$idrequeri',titulo='$titulo',descrip='$descrip',fechavenci='$fechavenci',etiquetauno='$etiquetauno' where idetals='$idetals'";

	
$resultado = mysqli_query($conexion,$sql1);

if($resultado){

	echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Datos Actualizados Exitosamante!'
            }).then(function() {
                window.location = '../detalle_r.php?idesp=$conn&refuno=$refuno';
            });
		
        </script>";	
}else{
    echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Oops!',
        text:  'Ocurrio un error, por favor intente nuevamente'
            }).then(function() {
                window.location = '../detalle_r.php?idesp=$conn&refuno=$refuno';
            });
		
        </script>";
}		
?>
</body>
</html>