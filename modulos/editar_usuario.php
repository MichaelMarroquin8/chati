<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
	
	$idusuario=$_GET['idusuario'];
	
	
	
	$querytw=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$fotoad=$admin['foto'];
	$nivel=$admin['estatus'];
	
	$query=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$datosone = mysqli_fetch_assoc($query);
	
	$idclientes=$datosone['idcliente'];
	
    if(isset($_SESSION['privilegio_nombre'])) {
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Editar usuario | Chati</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/cajaestilo.css">
        <link rel="stylesheet" type="text/css" href="css/swiche.css" />
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
<a href="usuarios.php"><img src="imagenes/borrar.svg" width="30px"></a>		
<a href="#openModaltwo" class="csone">Habilitar Permisos</a>	
<a href="#openModalthree" class="csone">Habilitar Canales</a>			
<br><br>
<h2 class="tm-block-title">Editar información del usuario</h2>



<form action="update/update_usuario.php" method="POST">		
<table>	
<input type="hidden" class="camp" id="idusuario" name="idusuario" value="<?php echo $datosone['idusuario']?>" autocomplete="off" readonly="readonly" />
<?php
   $pp = "SELECT * FROM sitios ORDER BY pais";
   $aprobtpa=mysqli_query($conn,$pp);
?>
<tr>
<td><h6 class="perfil">País:</h6></td>
<td><select name="sitio" class="camp" required>
    <option value="<?php echo $datosone['sitio']?>"><?php echo $datosone['sitio']?></option>
    <option></option>
    <?php
    
    while ($pai = mysqli_fetch_assoc($aprobtpa))
    {
    ?>	
		<option value="<?=$pai['pais']?>"><?=$pai['pais']?></option>
	<?php
    }
    ?>
	</select></td>
</tr>
<tr>		
	<td><font color="#111217">Usuario:</font></td>	
	<td><input type="text" id="usuario_nom" class="camp" name="usuario_nom" value="<?php echo $datosone['usuario_nom']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#111217">Nombre:</font></td>	
	<td><input type="text" id="nombre_comple" class="camp" name="nombre_comple" value="<?php echo $datosone['nombre_comple']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#111217">Apellidos:</font></td>	
	<td><input type="text" id="apellidos" class="camp" name="apellidos" value="<?php echo $datosone['apellidos']?>" autocomplete="off" required /></td>
</tr>
</table>



	
</div>
<div class="columna">
<br><br><br><br>
<table>
<tr>		
	<td><font color="#111217">Cédula:</font></td>	
	<td><input type="text" id="cedula" class="camp" name="cedula" value="<?php echo $datosone['cedula']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#111217">Email:</font></td>	
	<td><input type="text" id="emailusuario" class="camp" name="emailusuario" value="<?php echo $datosone['emailusuario']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#111217">Contraseña:</font></td>	
	<td><input type="password" id="pasusuario" class="camp" name="pasusuario" value="<?php echo $datosone['pasusuario']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#111217">Rol:</font></td>	
	<td><select name="estatus" class="camp" required>
	<option value="<?php echo $datosone['estatus']?>"><?php echo $datosone['estatus']?></option>
    <option></option>
	<option value="Usuario">Usuario</option>
	<option value="Administrador">Administrador</option>
	</select></td>
</tr>
<tr>		
	<td><font color="#111217">Cargo:</font></td>	
	<td><input type="text" id="cargo" class="camp" name="cargo" value="<?php echo $datosone['cargo']?>" autocomplete="off" required /></td>
</tr>
</table>
<br>
<input class="md-trigger" type="submit" value="Actualizar" id="btn_inicia"/>
</form>


</div>


</div>

</div>

<br>

	  			




<div id="openModaltwo" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />

<?php
	$moduno=$datosone['moduno'];
	$moddos=$datosone['moddos'];
	$modtres=$datosone['modtres'];
?>
<form action="update/update_modulos.php" method="POST">
<input type="hidden" class="camp" id="idusuario" name="idusuario" value="<?php echo $idusuario;?>" autocomplete="off" readonly="readonly" />

<br>
		
<table>
<tr>
<td><label class="switch">
  <input type="checkbox" name="moduno" value="SI" <?php if ($moduno=='SI') echo "checked"; ?>>
  <span class="slider round"></span>
</label>
</td>
<td>Canales</td>
</tr>
<tr>
<td><label class="switch">
  <input type="checkbox" name="moddos" value="SI" <?php if ($moddos=='SI') echo "checked"; ?>>
  <span class="slider round"></span>
</label>
</td>
<td>Parámetros</td>
</tr>
<tr>
<td><label class="switch">
  <input type="checkbox" name="modtres" value="SI" <?php if ($modtres=='SI') echo "checked"; ?>>
  <span class="slider round"></span>
</label>
</td>
<td>Usuarios</td>
</tr>
</table>

<br>
<input class="md-trigger" type="submit" value="Actualizar" id="btn_inicia"/>	
</form>




	</div>
</div>








<div id="openModalthree" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />


<form action="add/add_asignacanal.php" method="POST">

<input type="hidden" id="refeagente" name="refeagente" class="camp" style="width:200px;" value="<?php echo $idusuario?>" readonly="readonly">	

<br>
<?php
   $tipcanales = "SELECT * FROM espacios WHERE nomb='$nom' AND estado='disponible'";
   $cambiocan=mysqli_query($conn,$tipcanales);
?>

<table>	
<tr>	
<td><select name="idcanal" style="width:200px;" class="camp" required >
	<option></option>
    <?php
    
    while ($rowcan = mysqli_fetch_assoc($cambiocan))
    {
    ?>	
		<option value="<?=$rowcan['idesp']?>"><?=$rowcan['nombespac']?></option>
	<?php
    }
    ?>	           
	</select></td>
</tr>	
<tr>
<td>
<center>
<input class="md-trigger" type="submit" value="Guardar" id="btn_inicia"/>
</center>
</td>
</tr>
</table>	
</form>




	</div>
</div>

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