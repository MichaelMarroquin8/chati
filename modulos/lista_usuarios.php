<?php
error_reporting(0);
include("conex/conn.php");

$rango = $_GET['rango'];
$usur = $_GET['usuar'];
$sitiotw = $_GET['sitiotw'];
$idcliente = $_GET['idcliente'];

$limit = '15';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}else{
  $start = 0;
}


$query = "SELECT * FROM usuarios WHERE estado='disponible' AND sitio='$sitiotw' AND idcliente='$idcliente'
";

if($_POST['query'] != '')
{
  $query .= '
  AND (nombre_comple LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR apellidos LIKE "%'.str_replace(' ', '%', $_POST['query']).'%")
  ';
}

$query .= 'ORDER BY idusuario DESC ';

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
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col">Email</th>
									<th scope="col">Nombre</th>
									<th scope="col">Perfil</th>
									<th scope="col">País</th>
                                </tr>
                            </thead>
    <tbody>

<?php  
if($total_data > 0)
{
  foreach($result as $row)
  {
	  
	$userde = $row['nombre_comple']." ".$row['apellidos'];
	$foto = $row['foto'];
	
	
	$nuevoestatus='eliminado';
	  
	  
?> 


<tbody>
    <tr>

<td><?php echo "<a href='editar_usuario.php?idusuario=".$row['idusuario']."'><img src='imagenes/bor.svg' width='30px'></a>";?></td>								
<td><?php echo "<a href='eliminar/elim_usuario.php?idusuario=".$row['idusuario']."&estado=".$nuevoestatus."&quieneli=".$usur."' id='txt_test' onclick='return ConfirmDelete()'><img src='imagenes/basura.svg' width='30px'></a>";?>

</td>
	
	
									<td>
<?php									
if(empty($foto))
{ 
?>
<?php
if($row['linea']=='uno'){
?>
<img src='imagenes/usuario.svg' class="gaplus">
<?php	
}else{
?>
<img src='imagenes/usuario.svg' class="ga">
<?php	
}
?>


<?php
}else{ 
?>
<?php
if($row['linea']=='uno'){
?>
<img src='<?php echo $foto; ?>' class="gaplus">
<?php	
}else{
?>
<img src='<?php echo $foto; ?>' class="ga">
<?php	
}
?>

<?php	
}
?>


									<br>	
									</td>
									<td><?php echo $row['usuario_nom']; ?></td>
									<td><?php echo $userde; ?></td>
									<td><?php echo $row['cargo']; ?></td>
									<td><?php echo $row['sitio']; ?></td>
									
                                </tr>								
                            </tbody>



  
	
<?php    
  }
}else{
?>	
  <tr>
    <td colspan="7" align="center"><br><br>
	<img src="imagenes/new.gif" width="100px"><br><br>
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