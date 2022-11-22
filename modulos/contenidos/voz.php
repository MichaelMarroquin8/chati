<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chati</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">
<style type="text/css" media="screen">
  .zmdi-mic{
    color: #000000;
  }
  .zmdi-mic:hover{
    color: #000;
    cursor: pointer;
  }
  .zmdi-mic-off{
    color: crimson;
  }
  .zmdi-mic-off:hover{
    cursor: pointer;
    color: red;
  }
  #duracion{
    color: #000;
    font-weight: bold;
  }
</style>
<script type="text/javascript" src="./assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>

<?php
  $user_id            = $_REQUEST['user_id'];
  $to_id              = $_REQUEST['to_id'];
  $user               = $_REQUEST['user'];
  $to_user            = $_REQUEST['to_user'];
  $tokeng             = $_REQUEST['tokeng'];

?>
<select name="listaDeDispositivos" id="listaDeDispositivos" style="display: none"></select>
<table style="margin-top: -7px;">
  <tr>
    <td id="formular">
      <i id="btnDetenerGrabacion" class="zmdi zmdi-mic-off zmdi-hc-2x"></i>
    </td>
    <td id="comenzar">
      <i id="btnComenzarGrabacion" class="zmdi zmdi-mic zmdi-hc-2x" aria-hidden="true"> </i>
    </td>
    <td><span id="duracion"></span></td>
  </tr>
</table>

<!---audio para cuando se envia un msj-->
<audio class="audio" style="display:none;">
    <source src="effect.mp3" type="audio/mp3">
</audio>
<!---fin del audio--->

<div id="resp"> </div>


<script type="text/javascript" charset="utf-8">
/**SCRIPT QUE REGISTRA EL AUDIO */
const init = () => {
    const tieneSoporteUserMedia = () =>
        !!(navigator.mediaDevices.getUserMedia)

    // Si no soporta...
    // Aviso para que el mundo comience a usar navegadores decentes ;)
    if (typeof MediaRecorder === "undefined" || !tieneSoporteUserMedia())
        return alert("Tu navegador web no cumple los requisitos; por favor, actualiza a un navegador como Firefox o Google Chrome");


    // Declaración de elementos del DOM
    const $listaDeDispositivos = document.querySelector("#listaDeDispositivos"),
        $duracion = document.querySelector("#duracion"),
        $btnComenzarGrabacion = document.querySelector("#btnComenzarGrabacion"),
        $btnDetenerGrabacion = document.querySelector("#btnDetenerGrabacion");

    // Algunas funciones útiles
    const limpiarSelect = () => {
        for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--) {
            $listaDeDispositivos.options.remove(x);
        }
    }

    const segundosATiempo = numeroDeSegundos => {
        let horas = Math.floor(numeroDeSegundos / 60 / 60);
        numeroDeSegundos -= horas * 60 * 60;
        let minutos = Math.floor(numeroDeSegundos / 60);
        numeroDeSegundos -= minutos * 60;
        numeroDeSegundos = parseInt(numeroDeSegundos);
        if (horas < 10) horas = "0" + horas;
        if (minutos < 10) minutos = "0" + minutos;
        if (numeroDeSegundos < 10) numeroDeSegundos = "0" + numeroDeSegundos;

        return `${horas}:${minutos}:${numeroDeSegundos}`;
    };
    // Variables "globales"
    let tiempoInicio, mediaRecorder, idIntervalo;
    const refrescar = () => {
            $duracion.textContent = segundosATiempo((Date.now() - tiempoInicio) / 1000);
        }
        // Consulta la lista de dispositivos de entrada de audio y llena el select
    const llenarLista = () => {
        navigator
            .mediaDevices
            .enumerateDevices()
            .then(dispositivos => {
                limpiarSelect();
                dispositivos.forEach((dispositivo, indice) => {
                    if (dispositivo.kind === "audioinput") {
                        const $opcion = document.createElement("option");
                        // Firefox no trae nada con label, que viva la privacidad
                        // y que muera la compatibilidad
                        $opcion.text = dispositivo.label || `Dispositivo ${indice + 1}`;
                        $opcion.value = dispositivo.deviceId;
                        $listaDeDispositivos.appendChild($opcion);
                    }
                })
            })
    };
    // Ayudante para la duración; no ayuda en nada pero muestra algo informativo
    const comenzarAContar = () => {
        tiempoInicio = Date.now();
        idIntervalo = setInterval(refrescar, 500);
    };

    // Comienza a grabar el audio con el dispositivo seleccionado
    const comenzarAGrabar = () => {

      $("#formular").show();
      $('#btnDetenerGrabacion').show();

        if (!$listaDeDispositivos.options.length) return alert("No hay dispositivos");
        // No permitir que se grabe doblemente
        if (mediaRecorder) return alert("Ya se está grabando");

        navigator.mediaDevices.getUserMedia({
                audio: {
                    deviceId: $listaDeDispositivos.value,
                }
            })
            .then(stream => {
                // Comenzar a grabar con el stream
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();
                comenzarAContar();
                // En el arreglo pondremos los datos que traiga el evento dataavailable
                const fragmentosDeAudio = [];
                // Escuchar cuando haya datos disponibles
                mediaRecorder.addEventListener("dataavailable", evento => {
                    // Y agregarlos a los fragmentos
                    fragmentosDeAudio.push(evento.data);
                });
                // Cuando se detenga (haciendo click en el botón) se ejecuta esto
                mediaRecorder.addEventListener("stop", () => {
                    // Detener el stream
                    stream.getTracks().forEach(track => track.stop());
                    // Detener la cuenta regresiva
                    detenerConteo();
                    // Convertir los fragmentos a un objeto binario
                    const blobAudio = new Blob(fragmentosDeAudio);
                    const formData = new FormData();
                    // Enviar el BinaryLargeObject con FormData
                    formData.append("audio", blobAudio);

                    const RUTA_SERVIDOR = "acciones/guardar_audio_local.php?user_id=<?php echo $user_id; ?>&to_id=<?php echo $to_id; ?>&user=<?php echo $user; ?>&to_user=<?php echo $to_user; ?>&tokeng=<?php echo $tokeng; ?>";
                    //console.log(RUTA_SERVIDOR);
                    //$duracion.textContent = "Enviando audio...";
                    fetch(RUTA_SERVIDOR, {
                            method: "POST",
                            body: formData,
                        })
                        .then(respuestaRaw => respuestaRaw.text()) // Decodificar como texto
                        .then(respuestaComoTexto => {
                            // Aquí haz algo con la respuesta ;)
                            // console.log("La respuesta: ", respuestaComoTexto);
                            
                            // Abrir el archivo, es opcional y solo lo pongo como demostración
                            // $duracion.innerHTML = `<strong>Audio subido correctamente.</strong>&nbsp; <a //target="_blank" href="${respuestaComoTexto}">Abrir</a>`
                        })
                    });
                })
            .catch(error => {
                // Aquí maneja el error, tal vez no dieron permiso
                console.log(error)
            });

    };


    const detenerConteo = () => {
        clearInterval(idIntervalo);
        tiempoInicio = null;
        $duracion.textContent = "";
    }

    const detenerGrabacion = () => {
        if (!mediaRecorder)  return alert("No se está grabando");
        mediaRecorder.stop();
        mediaRecorder = null;
        $("#formular").hide();

    };


    $btnComenzarGrabacion.addEventListener("click", comenzarAGrabar);
    $btnDetenerGrabacion.addEventListener("click", detenerGrabacion);

    // Cuando ya hemos configurado lo necesario allá arriba llenamos la lista

    llenarLista();
}
// Esperar a que el documento esté listo...
document.addEventListener("DOMContentLoaded", init);
/**FIN DEL SCRIPT QUE REGISTRA EL AUDIO */
</script>

</body>
</html>
