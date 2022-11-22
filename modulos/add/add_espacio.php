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


$idusuario=$_POST['idusuario'];
$linea=$_POST['linea'];
$estadotw=$_POST['estado'];
$sitio=$_POST['sitiore'];
$usuario_nom=$_POST['usuario_nom'];
$nombre_comple=$_POST['nombre_comple'];
$apellidos=$_POST['apellidos'];
$emailusuario=$_POST['usuario_nom'];
$pasusuario=$_POST['pasusuario'];
$estatus=$_POST['estatus'];
$foto=$_POST['foto'];
$moduno=$_POST['moduno'];
$moddos=$_POST['moddos'];
$modtres=$_POST['modtres'];
$modcuatro=$_POST['modcuatro'];
$empresa=$_POST['empresa'];
$idref=$_POST['idref'];






$estado=$_POST['estado'];
$quienre=$_POST['quienre'];
$sitiore=$_POST['sitiore'];
$nombespac=$_POST['nombespac'];

$tokenc=$_POST['tokenc'];
$idcliente=$_POST['idcliente'];
$nomb=$_POST['nomb'];


   {
	   
	   $sql2="INSERT INTO usuarios(idusuario,linea,estado,sitio,usuario_nom,nombre_comple,apellidos,emailusuario,pasusuario,estatus,foto,moduno,moddos,modtres,modcuatro,empresa,idref) 
	   VALUES ('$idusuario','$linea','$estadotw','$sitio','$usuario_nom','$nombre_comple','$apellidos','$emailusuario','$pasusuario','$estatus','$foto','$moduno','$moddos','$modtres','$modcuatro','$empresa','$idref')";
       $restw=mysqli_query($cn,$sql2);
	   
	   
	   
	   
	   
       $sql="INSERT INTO espacios(estado,quienre,sitiore,nombespac,tokenc,idcliente,nomb) 
	   VALUES ('$estado','$quienre','$sitiore','$nombespac','$tokenc','$idcliente','$nomb')";
       $res=mysqli_query($cn,$sql);
	   
	   
    if($res){
		   
		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Canal creado correctamente!'
            }).then(function() {
                window.location = '../espacios.php';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente.'
            }).then(function() {
                window.location = '../espacios.php';
            });
		
        </script>";
        }

    }
	
?>
</body>
</html>