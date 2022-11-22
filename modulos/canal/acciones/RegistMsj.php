<?php
include('../config/config.php');

date_default_timezone_set("America/Bogota" ) ;
$hora             = date('h:i a',time() - 3600*date('I'));
$fecha            = date("d/m/Y");
$FechaMsj         = $fecha." ".$hora;

$fechatree=date("Y-m-d");
	
$horatwo=date("H:i:s");



$mifecha= date('Y-m-d H:i:s');
$NuevaFecha = strtotime ( '+0 hour' , strtotime ($mifecha) ) ; 
$NuevaFecha = strtotime ( '+2 minute' , $NuevaFecha ) ;  
$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha);


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
	
	
	
	$querytw=mysqli_query($con,"select * from `usuarios` where idusuario='$to_id' ");
	$datosonetw = mysqli_fetch_assoc($querytw);
  
    $nombr=$datosonetw['nombre_comple'];
	$celular=$datosonetw['celular'];
	
	
	$agente=mysqli_query($con,"select * from `usuarios` where idusuario='$UserId' ");
	$datosoagent = mysqli_fetch_assoc($agente);
  
    $nombagente=$datosoagent['nombre_comple']." ".$datosoagent['apellidos'];
	
	
	
	$empres=mysqli_query($con,"select * from `espacios` where tokenc='$tokeng' ");
	$datoemp = mysqli_fetch_assoc($empres);
  
    $nombempe=$datoemp['nomb'];
	
  
  if ($compara==$tokeng){
	  
	  
  }else{
	  
		$NuevoMsj  = ("INSERT INTO chatxuser (usuario,idagente,idcliente,fecha,hora,token)
         VALUES ('$UserId', '$para', '$to_id', '$fechatree', '$horatwo', '$tokeng')");
        $reg = mysqli_query($con, $NuevoMsj);
  
	 
  }
  
  
 
include("api_request.php"); 
//Local
$apikey = "49-5850-60f8a9dc148543.86336207";// APIKEY DESARROLLO PROD
$secret = "c7264c5348b03f027a144c58ee50595d7b41f5c1";// SECRET DESARROLLO PROD*/
$uri = 'https://aio.sigmamovil.com/api/sms/createsmslote';
$method = "POST";

$data = json_encode(array(
  "name" => "Chati notification",
  "notification" => false,
  "email"=>"", 
  "receiver" => "57;$celular;Hola $nombr Tienes un mensaje de $nombempe en Chati Live, ingresa al link para ver el mensaje https://chati.live/", // hasta 500 destinatarios separados por && por ejemplo: "57;3187029911;Hola esto es una preuba de envio -LOTE&&57;3187029912;Hola esto es una preuba de envio -LOTE"
  "idSmsCategory"=>"8984",
  "datesend"=>"$NuevaFecha",
  "datenow"=>false,
  "timezone"=>"-0500",
  "morecaracter" => true
));

$api_request = new api_request();
$result = $api_request->send_curl($apikey, $secret, $uri, $method, $data);

  

  include('../MsjsUsers.php');
	}
?>
