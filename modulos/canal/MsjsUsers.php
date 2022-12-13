<?php
//variables del canal
$tokenc = $_GET['tokenc'];
$ref = $_GET['ref'];
$nombespac = $_GET['nombespac'];


session_start();
header("Content-Type: text/html;charset=utf-8");
include('config/config.php');
if (isset($_SESSION['emailusuario']) != "") {
  $email_user   = $_SESSION['emailusuario'];
  $idConectado  = $_SESSION['privilegio_idusuario'];

  $permisosfive = mysqli_query($con, "select * from `usuarios` where idusuario='$idConectado' ");
  $datafive = mysqli_fetch_assoc($permisosfive);


  $comparar = $datafive['empresa'];

  //para sesión de agente:

  $simulador = $datafive['idcliente'];

  if ($comparar == 'Agente') {

    $simularfice = mysqli_query($con, "select * from `usuarios` where idusuario='$ref' ");
    $simufv = mysqli_fetch_assoc($simularfice);


    $idConectado = $simufv['idusuario'];
  } elseif ($comparar == 'SI') {

    $simulartw = mysqli_query($con, "select * from `usuarios` where idusuario='$ref' ");
    $simutw = mysqli_fetch_assoc($simulartw);


    $idConectado = $simutw['idusuario'];
  }
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chati</title>
  </head>

  <body>
    <?php
    $QueryUserClick = ("SELECT UserIdSession,clickUser FROM clickuser WHERE UserIdSession='$idConectado' LIMIT 1 ");
    $QueryClick     = mysqli_query($con, $QueryUserClick);
    $UserIdSession  = mysqli_fetch_array($QueryClick);
    $clickUser      = $UserIdSession['clickUser'];

    $Msjs = ("SELECT * FROM msjs WHERE tokeng='$tokenc' AND (user_id ='" . $idConectado . "' AND to_id='" . $clickUser . "') OR (user_id='" . $clickUser . "' AND to_id='" . $idConectado . "') ORDER BY id ASC");
    $QueryMsjs = mysqli_query($con, $Msjs);
    while ($UserMsjs = mysqli_fetch_array($QueryMsjs)) {
      $archivo = $UserMsjs['archivos'];
      $explode = explode('.', $archivo);
      $extension_arch = array_pop($explode);

      if ($idConectado == $UserMsjs['user_id']) { ?>
        <div class="row message-body">
          <div class="col-sm-12 message-main-sender">
            <div class="sender">
              <div class="message-text">
                <?php
                if (!empty($UserMsjs['message'])) {
                  echo $UserMsjs['message'];
                } elseif ($extension_arch == "webm") { ?>
                  <audio src="<?php echo $archivo; ?>" controls="controls" type="audio/mpeg" preload="preload"></audio>
                <?php } else { ?>
                  <img src="<?php echo 'archivos/' . $archivo; ?>" style="width: 100%; max-width: 250px;">
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <span class="message-time pull-right">
                <?php echo $UserMsjs['fecha'];  ?>
              </span>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="row message-body">
          <div class="col-sm-12 message-main-receiver">
            <div class="receiver">
              <div class="message-text">
                <?php
                if (!empty($UserMsjs['message'])) {
                ?>
                  <?php echo $UserMsjs['message']; ?>
                <?php
                } elseif ($extension_arch == "webm") { ?>
                  <audio src="<?php echo $archivo; ?>" controls="controls" type="audio/mpeg" preload="preload"></audio>
                <?php } else { ?>
                  <img src="<?php echo 'archivos/' . $UserMsjs['archivos']; ?>" style="width: 100%; max-width: 250px;">
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <span class="message-time pull-right">
                <?php echo $UserMsjs['fecha'];  ?>
              </span>
            </div>
          </div>
        </div>
    <?php  }
    } ?>

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