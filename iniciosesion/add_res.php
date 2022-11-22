<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Chati</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<script src="sweet/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" href="sweet/dist/sweetalert2.min.css">
	</head>
<body bgcolor="#ffffff" style="color:#ffffff;font-family: sans-serif;">
<?php
  include "../modulos/conex/conexiones.php";

$linea=$_POST['linea'];
$estado=$_POST['estado'];
$sitio=$_POST['sitio'];
$estatus=$_POST['estatus'];
$nombre_comple=$_POST['nombre_comple'];
$apellidos=$_POST['apellidos'];
$celular=$_POST['celular'];
$usuario_nom=$_POST['usuario_nom'];
$emailusuario=$_POST['usuario_nom'];
$pasusuario=$_POST['pasusuario'];
$polit=$_POST['polit'];
$empresa=$_POST['empresa'];

   {
       $sql="INSERT INTO usuarios(linea,estado,sitio,estatus,nombre_comple,apellidos,celular,usuario_nom,emailusuario,pasusuario,polit,empresa) 
	   VALUES ('$linea','$estado','$sitio','$estatus','$nombre_comple','$apellidos','$celular','$usuario_nom','$emailusuario','$pasusuario','$polit','$empresa')";
       $res=mysqli_query($cn,$sql);
	   
	   
    if($res){
		   
		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Te damos la bienvenida, tu registro fue exitoso'
            }).then(function() {
                window.location = '../index.php';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'El correo electrónico que intenta registrar ya se encuentra registrado en chati.live, por favor intente nuevamente por otra dirección de correo.'
            }).then(function() {
                window.location = 'registro.php?idesp=$conne&refuno=$refedos';
            });
		
        </script>";
        }

    }
	
?>
</body>
</html>