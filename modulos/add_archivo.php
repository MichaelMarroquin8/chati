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
include('conex/config.php');

//Creando Directorio
$directorio = "archivos/";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

//funcion para generar codigo aleatorio
function generarCodigo($longitud){
$key = '';
$pattern = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
$max = strlen($pattern)-1;

for($i=0; $i < $longitud; $i++)
$key .= $pattern{mt_rand(0,$max)
};
return $key;
 }
$codigo = generarCodigo(6);


$estado=$_POST['estado'];
$quienre=$_POST['quienre'];
$idetals=$_POST['idetals'];
$conn=$_POST['conn'];
$referencia=$_POST['referencia'];

$fechat=$_POST['referencia'];

$identredos=$_POST['identredos'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$comentarios=$_POST['comentarios'];


$nameFile  = $_FILES["archivofin"]["name"]; //Recibiendo el archivofin

//Verificando la extension del archivofin y renombrandolo
$explode 		= explode('.', $nameFile);
$extension_arch = array_pop($explode);
$new_name_file  = $codigo.'_'.$fechat.'.'.$extension_arch;


//Guardando archivofin en la carperta
$archivo = $directorio . basename($new_name_file); 
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));  
if (move_uploaded_file($_FILES["archivofin"] ["tmp_name"], $archivo)) {

	
 $sql="INSERT INTO archivosdeta(estado,quienre,referencia,archivofin,identredos,fecha,hora,comentarios) 
	   VALUES ('$estado','$quienre','$referencia','$new_name_file','$identredos','$fecha','$hora','$comentarios')";
       $res=mysqli_query($con,$sql);
   
	
echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Archivo agregado correctamente!'
            }).then(function() {
                window.location = 'detalle_r.php?idesp=$conn&refuno=$referencia&identre=$identredos';
            });
		
        </script>";
		
		
}else{
	
	
     echo"<script type='text/javascript'>			
	
	Swal.fire({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente.'
            }).then(function() {
                window.location = 'detalle_r.php?idesp=$conn&refuno=$referencia&identre=$identredos';
            });
		
        </script>";
}			
?>
</body>
</html>