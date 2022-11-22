<?php
session_start();
require("funciones.php");
include("../modulos/conex/conn.php");
include "../modulos/conex/conexiones.php";

$uno=$_POST['uno'];

$estado=$_POST['estado'];
$sitio=$_POST['sitio'];
$estatus=$_POST['estatus'];
$cargo=$_POST['cargo'];
$polit=$_POST['polit'];
$empresa=$_POST['empresa'];


$tokenc=$_POST['tokenc'];
$nombespac=$_POST['nombespac'];
$nombre_comple=$_POST['nombre_comple'];



$referen=$_POST['cod'];

$usuario_nom=$_POST['nombre_comple']."".$referen."".'@gmail.com';

$emailusuario=$usuario_nom;
$pasusuario=$_POST['nombre_comple'];

$ref=$_POST['ref'];


       $sql1="INSERT INTO usuarios(linea,estado,sitio,estatus,nombre_comple,usuario_nom,emailusuario,pasusuario,empresa,polit) 
	   VALUES ('$uno','$estado','$sitio','$estatus','$nombre_comple','$usuario_nom','$emailusuario','$pasusuario','$empresa','$polit')";
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
    

	header("Location: ../modulos/soporte/home.php?tokenc=$tokenc&ref=$ref&nombespac=$nombespac");
}else{
		
	echo "<script>alert('Oops! Ocurrió un error, por favor intenta nuevamente')
	       window.location='canal.php';</script>";	
}
?>