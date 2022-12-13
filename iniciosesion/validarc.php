<?php
session_start();
require("funciones.php");
include("../modulos/conex/conn.php");

$id = $_POST['id'];
$usuario_pass = $_POST['usu_pass'];
$usuario_pass2 = $_POST['usu_pass2'];


if ($usuario_pass == $usuario_pass2) {

	header("Location: ../index.php?message=success");

	$sql1="UPDATE usuarios set pasusuario='$usuario_pass' WHERE recuperar='$id'";
	$conexion->query($sql1);
	
} else {
    header("Location: ../cambio_contra.php?id=$id&message=error");
}
