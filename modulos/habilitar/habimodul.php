<?php
	$queryus=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$datosus = mysqli_fetch_assoc($queryus);
	
	$moduno=$datosus['moduno'];
	$moddos=$datosus['moddos'];
	$modtres=$datosus['modtres'];
	$modcuatro=$datosus['modcuatro'];
	
	$sitiotw=$datosus['sitio'];
	$quien=$datosus['estatus'];
	
	$usuario_nom=$datosus['usuario_nom'];
	$pasusuario=$datosus['pasusuario'];
	
?>
