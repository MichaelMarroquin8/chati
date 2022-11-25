<?php

$conn = mysqli_connect("localhost","root","","chati");
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$conntt = new mysqli("localhost","root","","chati");


$connect = new PDO("mysql:host=localhost; dbname=chati", "root", "");

$conexion = mysqli_connect("localhost", "root", "", "chati");


//PRODUCCION
// $conn = mysqli_connect("localhost","id19908170_chatiuser","08022002Mm--","id19908170_chatigod");
// if (!$conn) {
//  die("Connection failed: " . mysqli_connect_error());
// }

// $conntt = new mysqli("localhost","id19908170_chatiuser","08022002Mm--","id19908170_chatigod");


// $connect = new PDO("mysql:host=localhost; dbname=id19908170_chatigod", "id19908170_chatiuser", "08022002Mm--");

// $conexion = mysqli_connect("localhost","id19908170_chatiuser","08022002Mm--","id19908170_chatigod");
 
?>