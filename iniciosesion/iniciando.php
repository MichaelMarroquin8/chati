<?php
session_start();
require("funciones.php");
include("../modulos/conex/conn.php");
include "../modulos/conex/conexiones.php";

$linea=$_POST['linea'];

$estado=$_POST['estado'];
$sitio=$_POST['sitio'];
$estatus=$_POST['estatus'];
$moduno=$_POST['moduno'];
$moddos=$_POST['moddos'];
$modtres=$_POST['modtres'];
$modcuatro=$_POST['modcuatro'];

$polit=$_POST['polit'];
$empresa=$_POST['empresa'];


$nombre_comple=$_POST['nombre_comple'];



$referen=$_POST['cod'];

$usuario_nom=$_POST['nombre_comple']."".$referen."".'@gmail.com';

$emailusuario=$usuario_nom;
$pasusuario=$_POST['nombre_comple'];


       $sql1="INSERT INTO usuarios(linea,estado,sitio,estatus,nombre_comple,usuario_nom,emailusuario,pasusuario,empresa,polit,moduno,moddos,modtres,modcuatro) 
	   VALUES ('$linea','$estado','$sitio','$estatus','$nombre_comple','$usuario_nom','$emailusuario','$pasusuario','$empresa','$polit','$moduno','$moddos','$modtres','$modcuatro')";
       $res=mysqli_query($cn,$sql1);
	   

	   

$sql =("SELECT * FROM usuarios WHERE usuario_nom='$usuario_nom' AND pasusuario='$pasusuario'");
$ok=mysqli_query($con,$sql);
$privilegio=mysqli_fetch_assoc($ok);

	   
	   

if($privilegio['estatus']!="")
{
	 $_SESSION['enlinea']= $uno;
	 $_SESSION['privilegio']= $privilegio['estatus'];
	 $_SESSION['privilegio_idusuario']= $privilegio['idusuario'];
	 $_SESSION['privilegio_nombre']= $privilegio['usuario_nom'];
     $_SESSION['privilegio_apellido']= $privilegio['nombre_comple'];
	 $_SESSION['privilegio_usuario']= $privilegio['emailusuario'];
	 $_SESSION['privilegio_clave']= $privilegio['pasusuario'];
	 $_SESSION['privilegio_foto']= $privilegio['foto'];
	 $_SESSION['privilegio_cargo']= $privilegio['cargo'];
	 $_SESSION['privilegio_sitio']= $privilegio['sitio'];
	 $_SESSION['nombre_comple']= $privilegio['nombre_comple'];
	 $_SESSION['emailusuario']= $privilegio['emailusuario'];
    

	header("Location: ../modulos/modulos.php");
}else{
		
	echo "<script>alert('Oops! Ocurrió un error, por favor intenta nuevamente')
	       window.location='adopternew.php';</script>";	
}
?>