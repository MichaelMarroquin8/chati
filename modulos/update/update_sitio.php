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

$idsitio		= $_POST['idsitio'];
$pais			= $_POST['pais'];
$nsitio			= $_POST['nsitio'];
$zonahora		= $_POST['zonahora'];
		  
	$sql1="update sitios set pais='$pais',nsitio='$nsitio',zonahora='$zonahora' where idsitio='$idsitio'";

	
$resultado = mysqli_query($conexion,$sql1);

if($resultado){

	echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Datos Actualizados Exitosamante!'
            }).then(function() {
                window.location = '../editar_sitio.php?idsitio=$idsitio';
            });
		
        </script>";	
}else{
    echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Oops!',
        text:  'Ocurrio un error, por favor intente nuevamente'
            }).then(function() {
                window.location = '../editar_sitio.php?idsitio=$idsitio';
            });
		
        </script>";
}		
?>
</body>
</html>