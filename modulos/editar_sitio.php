<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
	
	$idsitio=$_GET['idsitio'];
	
	
	
	$querytw=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$fotoad=$admin['foto'];
	$nivel=$admin['estatus'];
	
	$query=mysqli_query($conn,"select * from `sitios` where idsitio='$idsitio' ");
	$datosone = mysqli_fetch_assoc($query);
	
	
    if(isset($_SESSION['privilegio_nombre'])) {
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Editar Sitio | Chati</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/cajaestilo.css">

		<link rel="stylesheet" type="text/css" href="css/barradd.css" />
		<link rel="stylesheet" type="text/css" href="css/componentes.css" />
		<link rel="stylesheet" type="text/css" href="css/campos.css" />
		<link rel="stylesheet" type="text/css" href="css/haldol8.css" />
		<link rel="stylesheet" type="text/css" href="css/letra.css" />
		<link rel="stylesheet" type="text/css" href="css/load.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/templatemo-style.css">	
		<link rel="stylesheet" href="css/listatable.css">

		<link rel="stylesheet" type="text/css" href="css/app.css" />
		<link rel="stylesheet" type="text/css" href="css/anima.css" />
		<link rel="stylesheet" type="text/css" href="css/buttons.css" />
		<link rel="stylesheet" type="text/css" href="css/plus.css">		
	</head>	
	<body>
<div id="contenedor_carga">
	<div id="carga"></div>
</div>	

<div class="home_content">


<?php
include("menu/lateral.php");
?>	
	

<?php
include("bienvenida/usuario.php");
?>


<!-- MÓDULOS -->
<div class="text">
<div class="margen">
<?php
include("servicios/mod.php");
?>

<br>	

<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">

<div class="columna">	
<a href="parameters.php"><img src="imagenes/borrar.svg" width="30px"></a>					
<br><br>
<h2 class="tm-block-title">Editar información del sitio</h2>



<form action="update/update_sitio.php" method="POST">		
<table>	
<input type="hidden" class="camp" id="idsitio" name="idsitio" value="<?php echo $datosone['idsitio']?>" autocomplete="off" readonly="readonly" />
<tr>		
	<td><font color="#111217">País:</font></td>	
	<td><input type="text" id="pais" class="camp" name="pais" value="<?php echo $datosone['pais']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#111217">Nombre del Sitio:</font></td>	
	<td><input type="text" id="nsitio" class="camp" name="nsitio" value="<?php echo $datosone['nsitio']?>" autocomplete="off" required /></td>
</tr>

</table>



	
</div>
<div class="columna">
<br><br><br><br>
<table>
<tr>
<?php
   $sqle = "SELECT idzh,zonahora FROM zonah ORDER BY zonahora";
   $resulte=mysqli_query($conn,$sqle);
?>
<td><h6 class="perfil">Zona Horaria:</h6></td>
<td><select name="zonahora" class="camp" required>
    <option value="<?php echo $datosone['zonahora']?>"><?php echo $datosone['zonahora']?></option>
    <option></option>
    <?php
    
    while ($rowe = mysqli_fetch_assoc($resulte))
    {
    ?>	
		<option value="<?=$rowe['zonahora']?>"><?=$rowe['zonahora']?></option>
	<?php
    }
    ?>	
	</select></td>
</tr>
</table>
<br>
<input class="md-trigger" type="submit" value="Actualizar" id="btn_inicia"/>
</form>


</div>


</div>

</div>

<br>

	  			



<?php
include("sitio.php");
?>

<?php
include("noti.php");
?>


<script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");
   let searchBtn = document.querySelector(".bx-search");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
   }
   searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
   }

  </script>
  
  
<script type="text/javascript">
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	
	}
</script>

<?php
    }else{
		
	include("vsesion/seguridad.php");	

	}
?>
	</body>
</html>