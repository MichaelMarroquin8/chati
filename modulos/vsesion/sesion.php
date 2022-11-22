<?php
    error_reporting(0);
	$sesion			= $_SESSION['privilegio'];
    $nombre_usuario = $_SESSION['privilegio_nombre'];
	$nombre_comple  = $_SESSION['nombre_comple'];
	$fototw 		= $_SESSION['privilegio_foto'];
	$idusuario 		= $_SESSION['privilegio_idusuario'];
	$rango 			= $_SESSION['privilegio'];
    $cargo 			= $_SESSION['privilegio_cargo'];
	$enlinea 		= $_SESSION['enlinea'];
	$sitionew 		= $_SESSION['privilegio_sitio'];
	$emailusuario 	= $_SESSION['emailusuario'];
	
	
	$query=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$datosone = mysqli_fetch_assoc($query);
	
	$foto=$datosone['foto'];
	
	$nombre=$datosone['nombre_comple'];
	$apelli=$datosone['apellidos'];
	$super=$datosone['estatus'];
	
	$perfilem=$datosone['empresa'];
	
	$nom=$datosone['nombre_comple']." ".$datosone['apellidos'];
	
	$queryesp=mysqli_query($conn,"select * from `espacios` where idcliente='$idusuario' ");
	$espe = mysqli_fetch_assoc($queryesp);
	
	$clavesp=$espe['palabras'];
	$inform=$espe['inform'];
	
	
?>
