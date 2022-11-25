<?php
session_start();
require("funciones.php");
include("../modulos/conex/conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$uno = $_POST['uno'];

$usuario_nom = $_POST['usuario_nom'];

$sql = ("SELECT * FROM usuarios WHERE usuario_nom='$usuario_nom'");
$ok = mysqli_query($con, $sql);
$privilegio = mysqli_fetch_assoc($ok);

if ($privilegio['estatus']!="") {
    $_SESSION['emailusuario']= $privilegio['emailusuario'];
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'm.stivenmarroquin@gmail.com';
        $mail->Password   = 'xndkwqxzuprkxlaq';
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;

        //Recipients
        //Recipients
        $mail->addAddress($_SESSION['emailusuario']);     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Correo recuperacion chati';
        $mail->Body    = 'Hola, usted ha solicitado un cambio de contraseña, por favor ingrese al siguiente link para realizarlo <a href="localhost/chati/cambio_contra.php?id='.$privilegio['idusuario'].'">pulse aqui</a>';

        $mail->send();
        header("Location: ../recuperar.php?message=ok");
    } catch (Exception $e) {
        header("Location: ../index.php?message=error");
    }
} else {
    header("Location: ../recuperar.php?message=not_found");
}
