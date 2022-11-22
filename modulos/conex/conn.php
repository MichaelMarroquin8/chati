<?php

$conn = mysqli_connect("localhost","root","","chati");
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$conntt = new mysqli("localhost","root","","chati");


$connect = new PDO("mysql:host=localhost; dbname=chati", "root", "");

$conexion = mysqli_connect("localhost", "root", "", "chati");
 
?>