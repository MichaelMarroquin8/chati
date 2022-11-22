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
  include "../conex/conexiones.php";

$estadoe=$_POST['estadoe'];
$estatus=$_POST['estatus'];
$refedos=$_POST['refedos'];
$conne=$_POST['conne'];
$quienrede=$_POST['quienrede'];
$sitiorede=$_POST['sitiorede'];
$tituloe=$_POST['tituloe'];
$descripe=$_POST['descripe'];
$fechavencie=$_POST['fechavencie'];
$fechacumpli=$_POST['fechacumpli'];
$solicitre=$_POST['solicitre'];


   {
       $sql="INSERT INTO detalle_entrega(estadoe,estatus,refedos,conne,quienrede,sitiorede,tituloe,descripe,fechavencie,fechacumpli,solicitre) 
	   VALUES ('$estadoe','$estatus','$refedos','$conne','$quienrede','$sitiorede','$tituloe','$descripe','$fechavencie','$fechacumpli','$solicitre')";
       $res=mysqli_query($cn,$sql);
	   
	   
    if($res){
		   
		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Entregable agregado correctamente!'
            }).then(function() {
                window.location = '../lista_entregables.php?idesp=$conne&refuno=$refedos';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente.'
            }).then(function() {
                window.location = '../lista_entregables.php?idesp=$conne&refuno=$refedos';
            });
		
        </script>";
        }

    }
	
?>
</body>
</html>