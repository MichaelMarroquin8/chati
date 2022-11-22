<?php

session_start();

include("conex/conn.php");

$idusuario 		= $_SESSION['privilegio_idusuario'];
$nuevalinea='dos';

$sql1="UPDATE usuarios SET linea='$nuevalinea' WHERE idusuario='$idusuario'";
$resultado = mysqli_query($conexion,$sql1);


unset ($_SESSION['privilegio_idusuario']);
session_destroy();


header("Location:../index.php");

?>
