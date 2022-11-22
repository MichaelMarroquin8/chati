<link rel="stylesheet" type="text/css" href="assets/css/cargandosession.css">
<?php
session_start();
    include('../../iniciosesion/funciones.php');
	include("../conex/conn.php");
	include("../hora/fechora.php");
	
	include("../vsesion/sesion.php");
	
	include("../habilitar/habimodul.php");

   

   
header("Content-Type: text/html;charset=utf-8");
include('config/config.php');
if (isset($_SESSION['emailusuario']) != "") {
    header("Location: home.php");
}


if (!empty($_POST)) {
$usuario  =  ($_POST['emailusuario']);
$password =  ($_POST['privilegio_clave']);

$exito_session = '';
$error_sesion = '';
$consulta = ("SELECT * FROM usuarios WHERE emailusuario COLLATE utf8_bin ='" .$usuario. "' AND pasusuario COLLATE utf8_bin='" .$password. "'");
$res = mysqli_query($con, $consulta);
$cant = mysqli_num_rows($res);
if($cant > 0){
while ($row = mysqli_fetch_array($res)) {
    $_SESSION['privilegio_idusuario']  = $row['idusuario'];
    $_SESSION['emailusuario']          = $row['emailusuario'];
    $_SESSION['nombre_comple']         = $row['nombre_comple'];
    $_SESSION['privilegio_foto']       = $row['foto'];

    $exito_session = "<center><div class='loaders'> </div></center><br>";
    echo '<meta http-equiv="refresh" content="2;url=home.php">';

  /*CAMBIANDO EL STATUS**/
  $activo="uno";
  $update_user_state = ("UPDATE usuarios SET linea='".$activo."' WHERE  idusuario='".$_SESSION['privilegio_idusuario']."'");
  $result = mysqli_query($con, $update_user_state);

  }
 } else {
  $error_sesion = "Algunos de los Campos son Incorrectos . .";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Alberto Fodor">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>
<title>Chati</title>
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/loader.css">
<link rel="stylesheet" href="assets/css/picnic.min.css">
<style type="text/css" media="screen">
  .miniprofile {
    border-radius: 50%;    /* Make it a circle */
    margin: 0 auto;        /* Center horizontally */
    width: 60%;            /* 60% width */
    padding-bottom: 60%;   /* 60% height */
  }
  .group label{
    color: #cecece;
    font-size: 13px;
  }
  
</style>
</head>

<body class="demo">
  
    <div id="demo-content">
      <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
      <div id="content"> </div>
    </div>




<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script>
//Pre-carga
$(function() {
  setTimeout(function(){
    $('body').addClass('loaded');
  }, 2000);

  $("#registrar").hide();
    $("#mostrar").click(function(){
      $("#login").hide();
      $("#registrar").show(200);
    });

  $("#formlogin").click(function(){
    $("#registrar").hide();
    $("#login").show(200);
  });
  
});


/*script vista previa de la imagen */
document.addEventListener("DOMContentLoaded", function() {
  [].forEach.call(document.querySelectorAll('.dropimage'), function(img){
    img.onchange = function(e){
      var inputfile = this, reader = new FileReader();
      reader.onloadend = function(){
        inputfile.style['background-image'] = 'url('+reader.result+')';
      }
      reader.readAsDataURL(e.target.files[0]);
    }
  });
});
</script>


  </body>
</html>
