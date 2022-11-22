<link rel="stylesheet" type="text/css" href="assets/css/cargandosession.css">
<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include('config/config.php');
if (isset($_SESSION['email_user']) != "") {
    header("Location: home.php");
}


if (!empty($_POST)) {
$usuario  =  ($_POST['email_user']);
$password =  ($_POST['password']);

$exito_session = '';
$error_sesion = '';
$consulta = ("SELECT * FROM users WHERE email_user COLLATE utf8_bin ='" .$usuario. "' AND password COLLATE utf8_bin='" .$password. "'");
$res = mysqli_query($con, $consulta);
$cant = mysqli_num_rows($res);
if($cant > 0){
while ($row = mysqli_fetch_array($res)) {
    $_SESSION['email_user']       = $row['email_user'];
    $_SESSION['id']               = $row['id'];
    $_SESSION['email_user']       = $row['email_user'];
    $_SESSION['nombre_apellido']  = $row['nombre_apellido'];
    $_SESSION['imagen']           = $row['imagen'];

    $exito_session = "<center><div class='loaders'> </div></center><br>";
    echo '<meta http-equiv="refresh" content="2;url=home.php">';

  /*CAMBIANDO EL STATUS**/
  $activo="Activo";
  $update_user_state = ("UPDATE users SET estatus='".$activo."' WHERE  id='".$_SESSION['id']."'");
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
<title>Prototipo de chat wpp business</title>
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


  <div class="login-box" id="login">
      <img src="assets/img/favicon.png" class="avatar mb-4" alt="Avatar Image">
      <p style="text-align: center; font-weight:600">INICIAR SESIÓN<hr></p>
      <div id="espacio"></div>
      <form class="form-login" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
        <div class="group">
            <input type="text" name="email_user"  required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
          </div>
          <div class="group">
            <input type="password" name="password"  required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Clave</label>
          </div>
          <div class="group" style="display:flex;">
              <button id="enviar" type="submit">Ingresar</button>
          </div>

          <div style="font-size:12px; color:red;font-weight: bold;">
            <?php echo isset($error_sesion) ? utf8_decode($error_sesion) : ''; ?>
          </div>
          <div>
            <?php echo isset($exito_session) ? utf8_decode($exito_session) : ''; ?>
          </div>
        </form>

          <div class="group">
            <a style="float: right;" id="mostrar">Crear Cuenta.</a>
          </div>
    </div>


<!---Crear cuenta de Usuario ---->
<div class="login-box" id="registrar">
  <p style="text-align: center; font-weight:600">CREA TU CUENTA</p>
    <img src="assets/img/favicon.png" class="avatar" alt="Avatar Image">
    <div id="espacio"></div>

    <form class="form-login" action="acciones/RegistarUser.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="group">
          <input type="text" name="nombre_apellido"  required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Nombre y Apellido</label>
        </div>
        <div class="group">
          <input type="text" name="email_user"  required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Email</label>
        </div>
        <div class="group">
          <input type="password" name="password"  required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Clave</label>
        </div>
        <div style="width: 150px; margin: 0 auto;"> <!-- este div solo para visualización de demostración -->
          <label class="dropimage miniprofile">
            <input type="file" name="imagenPerfil" title="Elegir imagen" required="required" accept="image/*">
          </label>
        </div>
        <div class="group" style="display: flex; margin-top:30px;">
          <button type="submit">Crear Cuenta</button>
        </div>
        <a style="float: right;" id="formlogin">Volver</a>

        <div style="font-size:16px; color:red;font-weight: bold;">
          <?php echo isset($error_sesion) ? utf8_decode($error_sesion) : ''; ?>
        </div>
        <div>
          <?php echo isset($exito_session) ? utf8_decode($exito_session) : ''; ?>
        </div>

    </form>
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
