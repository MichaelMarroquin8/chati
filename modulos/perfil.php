<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Mi perfil | Chati </title>
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
                        <h2 class="tm-block-title">Mi perfil</h2>


<form action="update/update_perfil.php" method="POST">			
<table style="width:100%;">
<input type="hidden" class="camp" id="idusuario" name="idusuario" value="<?php echo $datosone['idusuario']?>" autocomplete="off" readonly="readonly" />

<tr>		
	<td><h6 class="perfil">Usuario:</h6></td>	
	<td><input type="text" id="usuario_nom" class="camp" name="usuario_nom" value="<?php echo $datosone['usuario_nom']?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Nombre:</h6></td>	
	<td><input type="text" id="nombre_comple" class="camp" name="nombre_comple" value="<?php echo $datosone['nombre_comple']?>" autocomplete="off" required /></td>
</tr>
<?php
if ($super=='Usuario'){
?>
<tr>		
	<td><h6 class="perfil">Apellidos:</h6></td>	
	<td><input type="text" id="apellidos" class="camp" name="apellidos" value="<?php echo $datosone['apellidos']?>" autocomplete="off" required /></td>
</tr>

<?php	
}else{
?>
<input type="hidden" id="apellidos" class="camp" name="apellidos" value="<?php echo $datosone['apellidos']?>" required />
<?php	
}
?>
<tr>		
	<td><h6 class="perfil">Email:</h6></td>	
	<td><input type="text" id="emailusuario" class="camp" name="emailusuario" value="<?php echo $datosone['emailusuario']?>" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Celular:</h6></td>	
	<td><input type="number" id="celular" class="camp" name="celular" value="<?php echo $datosone['celular']?>" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Contraseña:</h6></td>	
	<td><input type="password" id="pasusuario" class="camp" name="pasusuario" value="<?php echo $datosone['pasusuario']?>" required /></td>
</tr>
<?php
if ($super=='Usuario'){
?>
<input type="hidden" id="sector" class="camp" name="sector" value="<?php echo $datosone['sector']?>" required />
<?php	
}else{
?>
<tr>
<td><h6 class="perfil">Sector:</h6></td>
<td><select name="sector" class="camp" required>
    <option value="<?php echo $datosone['sector']?>"><?php echo $datosone['sector']?></option>
	<option>------</option>
	<option value="Retail">Retail</option>
	<option value="Solidario">Solidario</option>
	<option value="Eduación">Eduación</option>
	<option value="Salud">Salud</option>
	<option value="Financiero">Financiero</option>
	<option value="Sector Público">Sector Público</option>
	<option value="Construcción">Construcción</option>
	<option value="Automotriz">Automotriz</option>
	<option value="Fundación">Fundación</option>
	<option value="Turismo">Turismo</option>
	<option value="Industria">Industria</option>
	</select></td>
</tr>
<?php	
}
?>
<tr>
<td><h6 class="perfil">Estado:</h6></td>
<td><select name="estatus" class="camp" required>
    <option value="<?php echo $datosone['estatus']?>"><?php echo $datosone['estatus']?></option>
	</select></td>
</tr>
</table>
<br>
<input class="md-trigger" type="submit" value="Actualizar" id="btn_inicia"/>	
</form>

<br>


<?php
if ($super=='Usuario'){
?>


<?php	
}else{
?>

<h2 class="tm-block-title">Configuración Avanzada</h2>
<form action="update/update_avnz.php" method="POST">			
<table style="width:100%;">
<input type="hidden" class="camp" id="idusuario" name="idusuario" value="<?php echo $datosone['idusuario']?>" autocomplete="off" readonly="readonly" />

<tr>		
	<td><h6 class="perfil">Palabras Clave:</h6></td>	
	<td>
	<textarea name="palabras" class="camp" style="height:100px;" placeholder='Incluye cada palabra clave separada por una coma y sin espacios'><?php echo $clavesp;?></textarea>
	</td>
</tr>
<tr>		
	<td><h6 class="perfil">Información adicional:</h6></td>	
	<td>
	<textarea name="inform" class="camp" style="height:170px;" placeholder='En esta sección puede agregar información adicional de la empresa'><?php echo $inform;?></textarea>
	</td>
</tr>
</table>
<br>
<input class="md-trigger" type="submit" value="Guardar" id="btn_inicia"/>	
</form>

<?php	
}
?>

</div>







<div class="columna">	
                        <h2 class="tm-block-title">Usuario</h2>


<table>
 <tr>
<?php									
if(empty($foto))
{ 
?>
<td><img src='imagenes/user.svg' class="fottw"></td>
<?php
}
else{ 
?>
<td><img src="<?php echo $datosone['foto']; ?>" class="fottw"/></td>
<?php
}
?>
<td><h6 class="perfil"><b style="font-size:20px;"><?php echo $datosone['nombre_comple']?> <?php echo $datosone['apellidos']?></b><br>
<?php echo $datosone['cargo']?></h6></td>
  </tr>
</table>







<br>

<hr style="background-color: #dbdbdb;">

<h2 class="tm-block-title">Subir foto de perfil</h2>

<?php function generarCodigo($longitud)
 { 
	$key = '';
	$pattern = '1234567890'; 
	$max = strlen($pattern)-1; 
	
	for($i=0;$i < $longitud;$i++) 
		$key .= $pattern{mt_rand(0,$max)
	}; 
	return $key; };?>
	
<form action="foto_perfil.php" method="POST" enctype="multipart/form-data">
<table>
<tr>
<td><input type="hidden" class="camp" name="idusuario" value="<?php echo $datosone['idusuario']?>" readonly="readonly" style="width:200px;"></td>
</tr>
<tr>
<td><input type="hidden" class="camp" name="foto" value="<?php echo $datosone['foto']?>" readonly="readonly" style="width:200px;"></td>
</tr>
<tr>

<td><input type="hidden" class="camp" name="enlace" value="<?php echo generarCodigo(8);?>P" readonly="readonly" style="width:200px;"></td>
	
</tr>
<tr>
<td><input type="file" name="file_array" style="color:#090f4a;font-size:14px;" required></td>
</tr>

</table>
<br>
       <td colspan="2">
<div class="inicia_sesion"><input class="md-trigger" type="submit" value="Subir Foto" id="btn_inicia"/></div>
       </td>
</form>

</div>

</div>

</div>


<br>





</div>
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
