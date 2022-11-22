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
$usuario_nom=$_POST['usuario_nom'];
$nombre_comple=$_POST['nombre_comple'];
$apellidos=$_POST['apellidos'];
$emailusuario=$_POST['usuario_nom'];
$pasusuario=$_POST['pasusuario'];
$sitio=$_POST['sitio'];
$estatus=$_POST['estatus'];
$cargo=$_POST['empresa'];
$moduno=$_POST['moduno'];
$moddos=$_POST['moddos'];
$modtres=$_POST['modtres'];

$empresa=$_POST['empresa'];

$idcliente=$_POST['idcliente'];


   {
       $sql="INSERT INTO usuarios(estado,usuario_nom,nombre_comple,apellidos,emailusuario,pasusuario,sitio,estatus,cargo,moduno,moddos,modtres,empresa,idcliente) 
	   VALUES ('$estado','$usuario_nom','$nombre_comple','$apellidos','$emailusuario','$pasusuario','$sitio','$estatus','$cargo','$moduno','$moddos','$modtres','$empresa','$idcliente')";
       $res=mysqli_query($cn,$sql);
	   
	   
    if($res){
		   
		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Usuario agregado correctamente!'
            }).then(function() {
                window.location = '../usuarios.php';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente.'
            }).then(function() {
                window.location = '../usuarios.php';
            });
		
        </script>";
        }

    }
	
?>
</body>
</html>