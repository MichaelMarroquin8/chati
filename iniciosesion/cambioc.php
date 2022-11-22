<?php
session_start();
require("funciones.php");

$usuario_nom=$_POST['usuario_nom'];
$pasusuario=$_POST['pasusuario'];
$sitionew=$_POST['privilegio_sitio'];

$uno='uno';

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
	 $_SESSION['privilegio_sitio']= $sitionew;

	header("Location: ../modulos/modulos.php");
}else
{
	echo "<script>alert('Datos Incorrectos Intenta Nuevamente')
	window.location='index.php';</script>";
}
?>