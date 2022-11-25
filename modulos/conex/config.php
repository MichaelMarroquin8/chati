<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "chati";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

//PRODUCCION
// $usuario  = "id19908170_chatii";
// $password = "cd5ir/~rD\*<h9a?";
// $servidor = "localhost";
// $basededatos = "id19908170_chati";
// $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
// $db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

?>