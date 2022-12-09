<?php
error_reporting(0);
include("conex/conn.php");

$rango = $_GET['rango'];
$usur = $_GET['usuar'];
$sitiotw = $_GET['sitiotw'];

$nuevacon = "select * from usuarios where idusuario='$usur'";
$okcon = mysqli_query($conn, $nuevacon);
$pcon = mysqli_fetch_assoc($okcon);
//echo( $nuevacon);
$estatusad = $pcon['estatus'];




$limit = '15';
$page = 1;
if ($_POST['page'] > 1) {
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
} else {
  $start = 0;
}


$query = "SELECT espacios.idesp, espacios.quienre, espacios.estado, espacios.sitiore, espacios.idesp, espacios.nomb, espacios.idCliente, usuarios.idUsuario, usuarios.sector, usuarios.empresa FROM espacios INNER JOIN usuarios on espacios.quienre = usuarios.idUsuario WHERE espacios.estado='disponible' And espacios.sitiore='Colombia' AND usuarios.sector='educacion'";

if ($_POST['query'] != '') {
  $query .= '
  AND (nomb LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR palabras LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%")
  ';
}
//echo($query);
$query .= 'GROUP BY nomb ORDER BY idesp ASC ';
$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
?>


<table class="table">

  <tbody>

    <?php
    if ($total_data > 0) {
      foreach ($result as $row) {

        $quienre = $row['quienre'];

        $refcom = $row['idesp'];

        $refnomb = $row['nomb'];

        $refsec = $row['sector'];

        $idclientefor = $row['idcliente'];



        $poconfiv = "select * from usuarios where idusuario='$quienre'";
        $oktwfo = mysqli_query($conn, $poconfiv);
        $posiiv = mysqli_fetch_assoc($oktwfo);
        $userde = $posiiv['nombre_comple'] . " " . $posiiv['apellidos'];
        $foto = $posiiv['foto'];
        $checki = $posiiv['checki'];

        $nuevoestatus = 'eliminado';


        //count
        $queja = "select idcal,idcliente,idusur,puntaje,COUNT(*) as contad from `calificar` where idcliente='$idclientefor'";
        $graque = mysqli_query($conn, $queja);
        $posiivque = mysqli_fetch_assoc($graque);

        $contad = $posiivque['contad'];



        $calificat = "select idcal,idcliente,idusur,puntaje,SUM(puntaje) as estrellas from `calificar` where idcliente='$idclientefor'";
        //echo ($calificat);
        $gracal = mysqli_query($conn, $calificat);
        $ggacl = mysqli_fetch_assoc($gracal);


        $estrellas = $ggacl['estrellas'];

        if ($estrellas == 'NAN') {

          $estrellas = 0;
        } else {
          $estrellas = $ggacl['estrellas'];
        }


        $calcu = $estrellas / $contad;

        $redondea = round($calcu);

    ?>


  <tbody>
    <tr>



      <td style="width:100px;">
        <?php
        if (empty($foto)) {
        ?>

          <img src='imagenes/usuario.svg' class="gaplustw">


        <?php
        } else {
        ?>


          <img src='<?php echo $foto; ?>' class="gaplustw">


        <?php
        }
        ?>



        <?php

        if ($redondea == '1') {
          $redondea = "<div class='star-rating'>★</div>";
        } elseif ($redondea == '2') {
          $redondea = "<div class='star-rating'>★★</div>";
        } elseif ($redondea == '3') {
          $redondea = "<div class='star-rating'>★★★</div>";
        } elseif ($redondea == '4') {
          $redondea = "<div class='star-rating'>★★★★</div>";
        } elseif ($redondea == '5') {
          $redondea = "<div class='star-rating'>★★★★★</div>";
        } elseif ($redondea > '5') {
          $redondea = "<div class='star-rating'>★★★★★</div>";
        } else {
          $redondea = "<div class='star-ratingtw'>★★★★★</div>";
        }

        if ($redondea >= '1') {
        ?>

          <?php echo $redondea; ?>

        <?php
        } else {
        ?>


        <?php
        }
        ?>
        <br>
      </td>
      <td>
        <font color="" style="font-size:1.7em;"><b><?php echo $userde; ?>
            <?php
            if (empty($checki)) {
            } else {
            ?>
              <img src="imagenes/checki.png" width="18px">
            <?php
            }
            ?>
          </b></font>
        <br>
        Chat disponible<br>

        <a target='blank' href="detalles.php?idusuario=<?php echo $idclientefor; ?>">Ver Detalles</a>
      </td>
      <td style="width:40%;"></td>

      <td>
        <?php
        $posiagf = mysqli_query($conn, "select * from `espacios` where estado='disponible' and nomb='$userde' ");
        while ($posif = mysqli_fetch_array($posiagf)) {

          $nombespac = $posif['nombespac'];
          $ref = $posif['idcliente'];
          $tokenc = $posif['tokenc'];

          $bloqueado = $posif['bloqueado'];


        ?>
          <?php
          if ($bloqueado == 'bloqueado') {
          ?>
            <a href="#canales" class="estebloc">
              <?php echo $nombespac; ?>
            </a>
          <?php
          } else {
          ?>
            <a href="canal/home.php?tokenc=<?php echo $tokenc; ?>&ref=<?php echo $ref; ?>&nombespac=<?php echo $nombespac; ?>" target="_blank" class="estees">
              <?php echo $nombespac; ?>
            </a>
          <?php
          }
          ?>

          <br><br>
        <?php
        }
        ?>
      </td>
    </tr>
  </tbody>

<?php
      }
    } else {
?>
<tr>
  <td colspan="5" align="center"><br><br>
    <img src="imagenes/new.gif" width="100px"><br><br>
    <h6 class="perfil" style="font-size:20px;">
      Hola! La empresa que intentas buscar aun no hace parte de la familia Chati Live.<br>
      Sin embargo, puedes dejarle un mensaje invitándola a utilizar Chati Live para interactuar contigo.<br>★★★★★
      <br><br><br>
      <a href="#unirt" class="csone">Enviar Mensaje</a>
    </h6><br>

    <img src="imagenes/clic.gif" width="50px">
  </td>
</tr>
<?php
    }
?>
</table>







<br />
<div align="center">
  <ul class="pagination">

    <?php
    $total_links = ceil($total_data / $limit);
    $previous_link = '';
    $next_link = '';
    $page_link = '';

    //echo $total_links;

    if ($total_links > 4) {
      if ($page < 5) {
        for ($count = 1; $count <= 5; $count++) {
          $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
      } else {
        $end_limit = $total_links - 5;
        if ($page > $end_limit) {
          $page_array[] = 1;
          $page_array[] = '...';
          for ($count = $end_limit; $count <= $total_links; $count++) {
            $page_array[] = $count;
          }
        } else {
          $page_array[] = 1;
          $page_array[] = '...';
          for ($count = $page - 1; $count <= $page + 1; $count++) {
            $page_array[] = $count;
          }
          $page_array[] = '...';
          $page_array[] = $total_links;
        }
      }
    } else {
      for ($count = 1; $count <= $total_links; $count++) {
        $page_array[] = $count;
      }
    }

    for ($count = 0; $count < count($page_array); $count++) {
      if ($page == $page_array[$count]) {
        $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

        $previous_id = $page_array[$count] - 1;
        if ($previous_id > 0) {
          $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Anterior</a></li>';
        } else {
          $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Anterior</a>
      </li>
      ';
        }
        $next_id = $page_array[$count] + 1;
        if ($next_id >= $total_links) {
          $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Siguiente</a>
      </li>
        ';
        } else {
          $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Siguiente</a></li>';
        }
      } else {
        if ($page_array[$count] == '...') {
          $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
        } else {
          $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
        }
      }
    }

    $output .= $previous_link . $page_link . $next_link;
    $output .= '
  </ul>

</div>
';

    echo $output;

    ?>