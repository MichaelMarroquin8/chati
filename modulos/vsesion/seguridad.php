<!DOCTYPE html>
<html lang="en" class="no-js">
<title>Seguridad | Chati</title>
	<head>
	<link rel="shortcut icon" href="imagenes/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloa.css" />
	<link rel="stylesheet" type="text/css" href="css/load.css" />
<style>
.kal{
	background-color: transparent;
    width:450px;
	padding:3em;
	font-family:'Helvetica','Verdana','Monaco',sans-serif;
}
</style>	
	</head>
<body style="background: url(imagenes/seguridad.png) no-repeat center center fixed;
    -webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;">
	
<div id="contenedor_carga">
	<div id="carga"></div>
</div>		
	<br>	
<div class="kal">	
	<img src="imagenes/kallgris.png" width="200px">
	<br>
	<h1 style="color:#090f4a;">Inicia Sesión</h1>
	<h2 style="font-size:1em;color:#090f4a;">Te encuentras en una página restringida, debes iniciar sesión.</h2>
	
	<h2 style="font-size:1em;color:#090f4a;">Presiona <a href='../iniciosesion/index.php'>AQUÍ</a> para iniciar</h2>
</div>
	
<script type="text/javascript">
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	
	}
</script>