<?php
session_start();
require("funciones.php");
include("../modulos/conex/conn.php");

$id=$_POST['idusuario'];
$usuario_pass=$_POST['usu_pass'];
$usuario_pass2=$_POST['usu_pass2'];

$sql =("UPDATE usuarios set pasusuario='$usuario_pass' WHERE idusuario='$id'");
$ok=mysqli_query($con,$sql);
$privilegio=mysqli_fetch_assoc($ok);


$sql1="update usuarios set linea='$uno' where usuario_nom='$usuario_nom'";
$resultado = mysqli_query($conexion,$sql1);

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
}else
{
		
	echo "<script>alert('Oops! Datos incorrectos, por favor intenta nuevamente')
	       window.location='index.php';</script>";	
}
?>