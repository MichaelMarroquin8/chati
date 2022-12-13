<?php
//variables del canal
$tokenc = $_GET['tokenc'];
$ref = $_GET['ref'];
$nombespac = $_GET['nombespac'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chati</title>
  <style type="text/css" media="screen">
    .zmdi-mail-reply:hover {
      color: #2af47b !important;
      cursor: pointer;
    }

    .zmdi-comment-image:hover {
      color: #2af47b !important;
      cursor: pointer;
    }

    /**style para el boton examinar***/
    .uploadFile {
      visibility: hidden;
    }

    #uploadIcon {
      cursor: pointer;
    }

    .camara {
      font-size: 45px;
      float: right !important;
      margin-left: 1000px;
      margin-top: -5px;
    }

    .camara:hover {
      color: #333;
    }

    .fa-microphone:hover {
      cursor: pointer;
      color: #333;
    }

    .csone {
      background: #3496e5;
      background: linear-gradient(#3496e5, #0675cc);
      background: -moz-linear-gradient(#3496e5, #0675cc);
      background: -webkit-linear-gradient(#3496e5, #0675cc);
      background: -o-linear-gradient(#3496e5, #0675cc);
      border: none;
      color: #ffffff;
      width: auto;
      cursor: pointer;
      display: inline-block;
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 10px;

    }

    .csone:hover {
      background: #0675cc;
      background: linear-gradient(#0675cc, #3496e5);
      background: -moz-linear-gradient(#0675cc, #3496e5);
      background: -webkit-linear-gradient(#0675cc, #3496e5);
      background: -o-linear-gradient(#0675cc, #3496e5);
      text-decoration: none;
      color: #ffffff;
    }



    .notifica {
      position: fixed;
      font-family: Arial, Helvetica, sans-serif;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.8);
      z-index: 99999;
      opacity: 0;
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 400ms ease-in;
      pointer-events: none;
    }

    .notifica:target {
      opacity: 1;
      pointer-events: auto;
    }

    .notifica>div {
      width: 400px;
      height: 220px;
      position: relative;
      margin: 3% auto;
      padding: 10px 30px 23px 30px;
      border-radius: 10px;
      background: #fff;
    }

    @media screen and (max-width: 70em) {
      .notifica>div {
        width: 90%;
      }
    }
  </style>
</head>

<body>

  <?php
  sleep(1);
  header("Content-Type: text/html;charset=utf-8");

  include('config/config.php');
  $IdUser                 = $_POST['id'];
  $idConectado            = $_POST['idConectado'];
  $email_user             = $_POST['email_user'];


  //Actualizando los mensajes no leidos ya que estoy entrando en mis mensajes
  if (!empty($IdUser)) {
    $leyendoMsj = ("UPDATE msjs SET leido = 'SI' WHERE  user_id='$IdUser' AND to_id='$idConectado' ");
    $queryLeerMsjs = mysqli_query($con, $leyendoMsj);
  }

  $QueryUserSeleccionado = ("SELECT * FROM usuarios WHERE idusuario='$IdUser' LIMIT 1 ");
  $QuerySeleccionado     = mysqli_query($con, $QueryUserSeleccionado);

  while ($rowUser = mysqli_fetch_array($QuerySeleccionado)) {

    $fototrf     = $rowUser['foto'];
  ?>
    <div class="status-bar"> </div>
    <div class="row heading">
      <div style="width: 20%; height: 100px; float: right">
        <iframe width="400" height="100" scrolling="auto" frameborder="0" src="voz.php?user_id=<?php echo $idConectado; ?>&to_id=<?php echo $rowUser['idusuario']; ?>&user=<?php echo $email_user; ?>&to_user=<?php echo $rowUser['nombre_comple']; ?>&tokeng=<?php echo $tokenc; ?>" style="z-index: 1000;"></iframe>
      </div>

      <div class="col-sm-2 heading-avatar">
        <a href="home.php?tokenc=<?php echo $tokenc; ?>&ref=<?php echo $ref; ?>&nombespac=<?php echo $nombespac; ?>" style="color: #fff;">
          <div class="heading-avatar-icon">
            <i class="zmdi" style="font-size:20px"><img src="assets/img/angulo.svg" width="12px" style="cursor:pointer;"></i>

            <?php
            if (empty($fototrf)) {

            ?>
              <img src="imagenesperfil/user.svg">

            <?php
            } else {
            ?>

              <img src="<?php echo '../' . $rowUser['foto']; ?>">
            <?php
            }
            ?>

          </div>
        </a>
      </div>
      <div class="col-sm-3 heading-name">
        <a class="heading-name-meta">
          <?php echo $rowUser['nombre_comple']; ?>
        </a>



      </div>

      <a href="#unirt" class="csone">Finalizar Chat</a>


    </div>

    <div class="row message" id="conversation">
      <?php
      $QueryUserClick = ("SELECT UserIdSession FROM clickuser WHERE UserIdSession='$idConectado' LIMIT 1");
      $QueryClick     = mysqli_query($con, $QueryUserClick);
      $veririficaClick = mysqli_num_rows($QueryClick);
      if ($veririficaClick == 0) {
        $InserClick = ("INSERT INTO clickuser (UserIdSession,clickUser) VALUES ('$idConectado','$IdUser')");
        $ResulInsertClick = mysqli_query($con, $InserClick);
      } else {
        $UpdateClick = ("UPDATE clickuser SET clickUser='$IdUser' WHERE UserIdSession='$idConectado'");
        $ResultUpdateClick = mysqli_query($con, $UpdateClick);
      }


      //Mostrando msjs de acuerdo al Usuario seleccionado
      $Msjs = ("SELECT * FROM msjs WHERE tokeng='$tokenc' AND (user_id ='" . $idConectado . "' AND to_id='" . $IdUser . "') OR (user_id='" . $IdUser . "' AND to_id='" . $idConectado . "') ORDER BY id ASC");
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
      }
      ?>

    </div>



    <div class="row reply" id="formnormal">
      <form class="conversation-compose" id="formenviarmsj" name="formEnviaMsj">
        <input type="hidden" name="user_id" value="<?php echo $idConectado; ?>">
        <input type="hidden" name="to_id" value="<?php echo $rowUser['idusuario']; ?>">
        <input type="hidden" name="user" value="<?php echo $email_user; ?>">
        <input type="hidden" name="to_user" value="<?php echo $rowUser['nombre_comple']; ?> ">
        <input type="hidden" name="tokeng" value="<?php echo $tokenc; ?>">


        <!--<div class="emoji">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="smiley" x="3147" y="3209">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.153 11.603c.795 0 1.44-.88 1.44-1.962s-.645-1.96-1.44-1.96c-.795 0-1.44.88-1.44 1.96s.645 1.965 1.44 1.965zM5.95 12.965c-.027-.307-.132 5.218 6.062 5.55 6.066-.25 6.066-5.55 6.066-5.55-6.078 1.416-12.13 0-12.13 0zm11.362 1.108s-.67 1.96-5.05 1.96c-3.506 0-5.39-1.165-5.608-1.96 0 0 5.912 1.055 10.658 0zM11.804 1.01C5.61 1.01.978 6.034.978 12.23s4.826 10.76 11.02 10.76S23.02 18.424 23.02 12.23c0-6.197-5.02-11.22-11.216-11.22zM12 21.355c-5.273 0-9.38-3.886-9.38-9.16 0-5.272 3.94-9.547 9.214-9.547a9.548 9.548 0 0 1 9.548 9.548c0 5.272-4.11 9.16-9.382 9.16zm3.108-9.75c.795 0 1.44-.88 1.44-1.963s-.645-1.96-1.44-1.96c-.795 0-1.44.878-1.44 1.96s.645 1.963 1.44 1.963z" fill="#7d8489"/></svg>
      </div>-->
        <input class="input-msg" name="message" id="message" placeholder="Escribe tu Mensaje y Presiona Enter..." autocomplete="off" autofocus="autofocus" required="true">
        <i class="zmdi" style="font-size: 45px; color: grey;" title="Enviar Imagen." id="mostrarformenviarimg"><img src="assets/img/imagen.svg" width="30px" style="cursor:pointer;margin:10px;"></i>
      </form>
    </div>


    <!---audio para cuando se envia un msj-->
    <audio class="audio" style="display:none;">
      <source src="effect.mp3" type="audio/mp3">
    </audio>
    <!---fin del audio--->


    <!---- form enviar img--->
    <div class="row reply" id="formenviaimg">
      <form class="conversation-compose" id="formenviarmsj" name="formEnviaMsj" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $idConectado; ?>">
        <input type="hidden" name="to_id" value="<?php echo $rowUser['idusuario']; ?>">
        <input type="hidden" name="to_user" value="<?php echo $rowUser['nombre_comple']; ?> ">
        <input type="hidden" name="user" value="<?php echo $email_user; ?>">
        <input type="hidden" name="tokeng" value="<?php echo $tokenc; ?>">


        <div class="col-sm-12 col-xs-12 reply-recording">
          <label for="uploadFile" id="uploadIcon">
            <i class="zmdi"><img src="assets/img/camara.svg" width="30px" style="cursor:pointer;"></i>
          </label>
          <input type="file" name="namearchivo" value="upload" id="uploadFile" class="uploadFile" required />
        </div>
        <button class="send" name="enviar" id="botonenviarimg" name="botonenviarimg">
          <div class="circle">
            <i class="zmdi zmdi-mail-send" title="Enviar Imagen..."></i>
          </div>
        </button>
        <i class="zmdi" style="font-size: 50px;color: grey;" id="volverformnormal" title="Volver . ."><img src="assets/img/deshacer.svg" width="30px" style="cursor:pointer;margin:10px;"></i>
      </form>
    </div>
  <?php } ?>


  <script type="text/javascript">
    $(function() {
      scroll();

      var idConectado = "<?php echo $idConectado; ?>";

      //Buscando mensajes nuevos cada 4 segundos
      function actualizar() {
        var valor = 0;
        var bucle = setInterval(function() {
          valor++;
          //console.log('Buscando mensajes sin leer ' + valor);
          if (valor == 8) {
            $.ajax({
              type: "POST",
              url: "buscarMensajesNuevos.php?tokenc=<?php echo $tokenc ?>&ref=<?php echo $ref ?>&nombespac=<?php echo $nombespac ?>",
              dataType: "json",
              data: {
                idConectado: idConectado
              },
              success: function(data) {
                console.log(data);

                if (data.msj == true) {
                  load_data = {
                    'fetch': 1
                  };
                  $.post('MsjsUsers.php?tokenc=<?php echo $tokenc ?>&ref=<?php echo $ref ?>&nombespac=<?php echo $nombespac ?>', load_data, function(data) {
                    $('#conversation').html(data);
                    var scrolltoh = $('#conversation')[0].scrollHeight;
                    $('#conversation').scrollTop(scrolltoh);
                  })
                  //console.log('si hay msjs');
                } else {
                  //console.log('no hay msjs');
                }
              }
            })
            valor = 0;
          }
        }, 1000);
      }

      actualizar(); //Llamado a la funcion.


      $(".conversation-compose").keypress(function(e) {
        if (e.which == 13) {
          var url = "acciones/RegistMsj.php?tokenc=<?php echo $tokenc ?>&ref=<?php echo $ref ?>&nombespac=<?php echo $nombespac ?>";
          $.ajax({
            type: "POST",
            url: url,
            data: $("#formenviarmsj").serialize(),
            complete: function(data) {
              scroll(); //llamando la funcion
            },
            success: function(data) {
              $('#conversation').html(data);
              $("#message").val(""); //limpiar el input del msg
              $(".audio")[0].play(); //reproducir audio de envio
            }
          });
          return false;
        }
      });


      $("#formenviaimg").hide();

      $("#mostrarformenviarimg").click(function() {
        $("#formnormal").hide();
        $("#formenviaimg").show(200);
      });

      $("#volverformnormal").click(function() {
        $("#formenviaimg").hide();
        $("#formnormal").show(200);
      });
    });


    /******ENVIANDO FOR DE IMAGEN*****/
    $('body').on('click', '#botonenviarimg', function(e) {
      e.preventDefault();
      var formData = new FormData($(this).parents('form')[0]);
      var botonenviarimg = $("#botonenviarimg");

      //validando que no envien el formulario sin imagen
      var namearchivo = ($("#uploadFile").val());
      if ((namearchivo == "") || (namearchivo == null) || (namearchivo == undefined)) {
        alert("Debes seleccionar una imagen");
        return;
      } else {
        $.ajax({
          url: 'acciones/archivo.php?tokenc=<?php echo $tokenc ?>&ref=<?php echo $ref ?>&nombespac=<?php echo $nombespac ?>',
          type: 'POST',
          xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
          },
          data: $("#formenviaimg").serialize(), // Adjuntar los campos del formulario enviado.
          success: function(data) {
            $("#conversation").html(data);
            $(".audio")[0].play(); //reproducir audio de envio

            //Vuelvo al formulario de mensaje
            $("#formenviaimg").hide();
            $("#formnormal").show(200);

            scroll();

          },
          data: formData,
          cache: false,
          contentType: false,
          processData: false
        });
        return false;

      }
    });


    function scroll() {
      $("#conversation").animate({
        scrollTop: $('#conversation')[0].scrollHeight
      }, 1000);
    }
  </script>



  <?php
  include("../califica.php");
  ?>


</body>

</html>