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

                <?php } elseif ($extension_arch == "csv" or $extension_arch == "xlsx" or $extension_arch == "xlsm" or $extension_arch == "xltx") { ?>
                  <img src="assets/img/xls.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "pdf") { ?>
                  <img src="assets/img/pdf.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "docx"  or $extension_arch == "docm"  or $extension_arch == "dotx"  or $extension_arch == "dotm" or $extension_arch == "doc") { ?>
                  <img src="assets/img/docx.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "pptx"  or $extension_arch == "ppsx"   or $extension_arch == "potx"   or $extension_arch == "sldx" ) { ?>
                  <img src="assets/img/ppt.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "txt") { ?>
                  <img src="assets/img/txt.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "jpg" or $extension_arch == "gif" or $extension_arch == "png") { ?>
                  <img src="<?php echo 'archivos/' . $archivo; ?>" style="width: 100%; max-width: 200px;"><br>
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
                if ($UserMsjs['message'] != "") {
                  echo $UserMsjs['message'];
                } elseif ($extension_arch == "webm") { ?>
                  <audio src="./<?php echo $archivo; ?>" controls="controls" type="audio/mpeg" preload="preload"></audio>
                  <?php } elseif ($extension_arch == "csv" or $extension_arch == "xlsx") { ?>
                  <img src="assets/img/xls.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "pdf") { ?>
                  <img src="assets/img/pdf.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                  <?php } elseif ($extension_arch == "docx") { ?>
                  <img src="assets/img/docx.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                  <?php } elseif ($extension_arch == "pptx") { ?>
                  <img src="assets/img/ppt.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                  <?php } elseif ($extension_arch == "rtf" or $extension_arch == "txt") { ?>
                  <img src="assets/img/txt.png" style="width: 100%; max-width: 100px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                <?php } elseif ($extension_arch == "jpg" or $extension_arch == "gif" or $extension_arch == "png") { ?>
                  <img src="<?php echo 'archivos/'.$archivo; ?>" style="width: 100%; max-width: 200px;"><br>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="csone" download="" href="archivos/<?php echo $archivo; ?>" title="Descargar Imagen">Descargar
                      </a>
                    </div>
                  </div>
                  <?php } elseif ($extension_arch == "zip" or $extension_arch == "rar") { ?>
                  <img src="assets/img/codigo-postal.png" style="width: 100%; max-width: 100px;"><br>
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