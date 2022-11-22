<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include('config/config.php');
if (isset($_SESSION['emailusuario']) != "") {
   $email_user   = $_SESSION['emailusuario'];
   $imgPerfil    = $_SESSION['privilegio_foto'];
   $idConectado  = $_SESSION['privilegio_idusuario'];
   
   $permisosfor=mysqli_query($con,"select * from `usuarios` where idusuario='$idConectado' ");
   $datafor = mysqli_fetch_assoc($permisosfor);
	

	$comparar=$datafor['empresa'];

	//para sesión de agente:

	$simulador=$datafor['idcliente'];
	
   $tokenc = $_GET['tokenc'];
   $ref = $_GET['ref'];
   $nombespac = $_GET['nombespac'];
   
   if ($comparar=='Agente'){
	   
	   $simulartw=mysqli_query($con,"select * from `usuarios` where idusuario='$ref' ");
	   $simutw = mysqli_fetch_assoc($simulartw);
	

       $idConectado=$simutw['idusuario'];
	   
   }elseif($comparar=='SI'){
	   
	   $simulartw=mysqli_query($con,"select * from `usuarios` where idusuario='$ref' ");
	   $simutw = mysqli_fetch_assoc($simulartw);
	

       $idConectado=$simutw['idusuario'];
   }
   
   
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Alberto Fodor">
    <title>Chati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/inputEnviar.css">
    <style type="text/css" media="screen">
      .seleccionado{
        background-color: #2aa6f4;
		color:#ffffff;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">
</head>
<body>


<div class="container app">
  <div class="row app-one">
    
    <!----Lista de usuarios------------>
    <div class="col-sm-4 side" id="myusers">
	
      <div class="side-one">

      </div>
    </div>
    <!-------->

    <!----contenedor del chat--->
    <div class="col-sm-8 conversation">
      <div id="capausermsj">

        <img src="assets/img/ani.png" id="capawelcome"  width="200px" />
      </div>
    </div>
    <!---fin--->
	

  </div>
</div>


<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(function() {
    load2();
    function load2(){
      window.setTimeout(function(){
      $.post('users.php?tokenc=<?php echo $tokenc?>&ref=<?php echo $ref?>&nombespac=<?php echo $nombespac?>', function(data) {
		  
        $('#myusers').html(data);
      });
      }, 1000);
    }


  $(function(){
      if ( $(".side-one")[0] ) {
          users();
        }
          users();

      setInterval(function(){
          if ( $(".side-one")[0] ) {
            users();
          }
          users();
      }, 10000);

  });
  
  function users(){
      load_data = {'fetch':1};
    window.setTimeout(function(){
    $.post('users.php?tokenc=<?php echo $tokenc?>&ref=<?php echo $ref?>&nombespac=<?php echo $nombespac?>', load_data,  function(data) {
      $('#myusers').html(data);
    });
    }, 10000);
  }
  });       
</script>


  </body>
</html>
<?php
} else {
  echo '<script type="text/javascript">
alert("Debe Iniciar Sesion");
window.location.assign("../modulos.php");
</script>';
}
?>
