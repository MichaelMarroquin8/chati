<?php
error_reporting(0);
include("conex/conn.php");

$rango = $_GET['rango'];
$usur = $_GET['usuar'];
$refuno = $_GET['refuno'];
$idesp = $_GET['idesp'];

$identre = $_GET['identre'];

$limit = '15';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}else{
  $start = 0;
}


$query = "SELECT * FROM archivosdeta WHERE estado='disponible' AND referencia='$refuno' AND identredos='$identre'
";

if($_POST['query'] != '')
{
  $query .= '
  AND archivofin LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  ';
}

$query .= 'ORDER BY idarchi DESC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

?>
<h6 class="perfil"><font color="#111217">Total (<b><?php echo $total_data ?></b>)</font></h6>


<table class="table">
    <thead>
                                <tr>
									<th scope="col"></th>
									<th scope="col">Usuario</th>
									<th scope="col">Archivo</th>
									<th scope="col">Comentarios</th>
                                </tr>
                            </thead>
    <tbody>

<?php  
if($total_data > 0)
{
  foreach($result as $row)
  {
	  
	  
	$usuario=$row['quienre'];
	  
	$usuari=mysqli_query($conn,"select * from `usuarios` WHERE idusuario='$usuario'");
	while($envifor = mysqli_fetch_array($usuari)){
	
	$userde = $envifor['nombre_comple']." ".$envifor['apellidos'];
	$foto = $envifor['foto'];
			
	}  
	
	$nuevoestatus='eliminado';
	  
	  
?> 


<tbody>
    <tr>
								
<td><?php echo "<a href='eliminar/elim_archivo.php?idarchi=".$row['idarchi']."&estado=".$nuevoestatus."&quieneli=".$usur."&refuno=".$refuno."&idesp=".$idesp."' id='txt_test' onclick='return ConfirmDelete()'><img src='imagenes/basura.svg' width='30px'></a>";?>

</td>
	
	
									<td style="width:230px;">
<?php									
if(empty($foto))
{ 
?>
<img src='foto/use.png' class="ga">
<?php
}
else{ 
?>
<img src='<?php echo $foto; ?>' class="ga">
<?php
}
?>
									<?php echo $userde; ?>	
									</td>
									<td>
<a href="archivos/<?php echo $row['archivofin']; ?>" target='blank'><?php echo $row['archivofin']; ?></a><br>
Subido el <b><?php echo $row['fecha']; ?> <?php echo $row['hora']; ?></b></td>
									<td>
<?php echo $row['comentarios']; ?>
									</td>
									
                                </tr>								
                            </tbody>



  
	
<?php    
  }
}else{
?>	
  <tr>
    <td colspan="4" align="center"><br><br>
	<img src="imagenes/new.gif" width="70px"><br><br>
	<h6 class="perfil">No encontramos datos registrados en la base de datos</h6></td>
  </tr>
<?php
}
?>
</table>
	
<br />
<div align="center">
  <ul class="pagination">

<?php
$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Anterior</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Anterior</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Próxima</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Próxima</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
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