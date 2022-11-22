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

$refeagente=$_POST['refeagente'];
$idcanal=$_POST['idcanal'];

   {
       $sql="INSERT INTO canalagente(refeagente,idcanal) 
	   VALUES ('$refeagente','$idcanal')";
       $res=mysqli_query($cn,$sql);
	   
	   
    if($res){
		   
		   echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Canal habilitado para el agente correctamente'
            }).then(function() {
                window.location = '../editar_usuario.php?idusuario=$refeagente';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente.'
            }).then(function() {
                window.location = '../editar_usuario.php?idusuario=$refeagente';
            });
		
        </script>";
        }

    }
	
?>
</body>
</html>