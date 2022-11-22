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

$estado=$_POST['estado'];
$refuno=$_POST['refuno'];
$conn=$_POST['conn'];
$quienred=$_POST['quienred'];
$sitiored=$_POST['sitiored'];
$trabajo=$_POST['trabajo'];
$idrequeri=$_POST['idrequeri'];
$titulo=$_POST['titulo'];
$descrip=$_POST['descrip'];

   {
       $sql="INSERT INTO detalle_espacios(estado,refuno,conn,quienred,sitiored,trabajo,idrequeri,titulo,descrip) 
	   VALUES ('$estado','$refuno','$conn','$quienred','$sitiored','$trabajo','$idrequeri','$titulo','$descrip')";
       $res=mysqli_query($cn,$sql);
	   
	   
    if($res){
		   
		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Requerimiento agregado correctamente!'
            }).then(function() {
                window.location = '../lista_e.php?idesp=$conn';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente.'
            }).then(function() {
                window.location = '../lista_e.php?idesp=$conn';
            });
		
        </script>";
        }

    }
	
?>
</body>
</html>