<?php
include('../config/config.php');

date_default_timezone_set("America/Bogota" ) ;
$hora             = date('h:i a',time() - 3600*date('I'));
$fecha            = date("d/m/Y");
$FechaMsj         = $fecha." ".$hora;

$fechatree=date("Y-m-d");
	
$horatwo=date("H:i");


$nombre_equipo_user = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$de               = $_POST['user'];
$UserId 		  = $_POST['user_id'];
$to_id 			  = $_POST['to_id'];
$para             = $_POST['to_user'];
$leido 			  = "NO";
$msj 	          = $_POST['message'];
$tokeng 	      = $_POST['tokeng'];




  
if($msj != ''){
	
  $NuevoMsj  = ("INSERT INTO msjs (user, user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,tokeng,fechasep,horasep)
    VALUES ('$de', '$UserId', '$para', '$to_id', '$msj', '$FechaMsj', '$nombre_equipo_user', '$leido', '$tokeng', '$fechatree', '$horatwo')");
  $reg = mysqli_query($con, $NuevoMsj);
  
  
	$query=mysqli_query($con,"select * from `chatxuser` where usuario='$UserId' and token='$tokeng'  ");
	$datosone = mysqli_fetch_assoc($query);
  
	$compara=$datosone['token'];
  
  if ($compara==$tokeng){
	  
	  
  }else{
	  
		$NuevoMsj  = ("INSERT INTO chatxuser (usuario,idagente,idcliente,fecha,hora,token)
         VALUES ('$UserId', '$para', '$to_id', '$fechatree', '$horatwo', '$tokeng')");
        $reg = mysqli_query($con, $NuevoMsj);
  
	 
  }
  

  include('../MsjsUsers.php');
	}
?>
