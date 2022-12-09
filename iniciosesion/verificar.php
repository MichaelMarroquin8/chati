<?php
session_start();
require("funciones.php");
include("../modulos/conex/conn.php");

$codigo = $_POST['codigo'];

$sql = ("SELECT * FROM usuarios WHERE codigo_email='$codigo'");
$ok = mysqli_query($con, $sql);
$privilegio = mysqli_fetch_assoc($ok);


$sql1 = "update usuarios set estado='disponible' where codigo_email='$codigo'";
$resultado = mysqli_query($conexion, $sql1);

if ($privilegio['codigo_email'] != $codigo) {
	echo "<script>alert('El codigo de verificacion no coincide')
	window.location='../verificar.php';</script>";
	
} elseif ($privilegio['estado'] == "disponible") {
	echo "<script>alert('El correo ya ha sido verificado')
	       window.location='../index.php';</script>";

} elseif($privilegio['codigo_email'] === $codigo){
	$sql1 = "update usuarios set estado='disponible' where codigo_email='$codigo'";
	$resultado = mysqli_query($conexion, $sql1);
	echo "<script>alert('Verificación realizada con exito')
	       window.location='../index.php';</script>";
}

