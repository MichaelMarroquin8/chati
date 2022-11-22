<?php
error_reporting(0);
include("conn.php");
include("conexprin.php");

$rango = $_GET['rango'];

$acliente = $_GET['cliente'];

$usur = $_GET['usuar'];

$limit = '10';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}


$query = "
SELECT * FROM usuarios WHERE acliente='$acliente'
";

if($_POST['query'] != '')
{
  $query .= '
  WHERE nombre_comple LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  ';
}

$query .= 'ORDER BY idusuario ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

?>

<font color="#111217">Usuarios Registrados - <?php echo $total_data ?></font>


<table class="table">
    <thead>
                                <tr>
<?php									
if($rango=='Administrador' OR $rango=='Superadmin')
{ 
?>
<th scope="col"></th>
<th scope="col"></th>
<?php
}
else{ 
?>

<?php
}
?>								
								    
									<th scope="col">FOTO</th>
                                    <th scope="col">USUARIO</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">EMAIL</th>
									<th scope="col">ESTADO</th>
									<th scope="col">CARGO</th>
                                </tr>
                            </thead>
    <tbody>

<?php  
if($total_data > 0)
{
  foreach($result as $row)
  {
	  $foto=$row['foto'];
?> 


<tbody>
    <tr>
<?php									
if($rango=='Administrador' OR $rango=='Superadmin')
{ 
?>
<td><?php echo "<a href='actualizar_usuario.php?idusuario=".$row['idusuario']."&idadmin=".$usur."'><img src='imagenes/confi.png' width='30px'></a>";?></td>								
<td><?php echo "<a href='eliminarusu.php?idusuario=".$row['idusuario']."' onclick='return ConfirmDelete()'><img src='imagenes/borrar.png' width='30px'></a>";?></td>
	
<?php
}
else{ 
?>

<?php
}
?>	
									
									
<?php									
if(empty($foto))
{ 
?>
<td><img src='foto/use.png' class="fot"></td>
<?php
}
else{ 
?>
<td><img src='<?php echo $row['foto']; ?>' class="fot"></td>
<?php
}
?>			

									<td><?php echo $row['usuario_nom']; ?></td>
									<td><?php echo $row['nombre_comple']." ".$row['apellidos']; ?></td>
									<td><?php echo $row['emailusuario']; ?></td>
									<td><?php echo $row['estatus']; ?></td>
									<td><?php echo $row['cargo']; ?></td>
                                </tr>
                            </tbody>



  
	
<?php    
  }
}
else
{
?>	
  <tr>
    <td colspan="8" align="center">Datos no encontrados</td>
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