<?php
	date_default_timezone_set("America/Bogota");
	setlocale(LC_ALL,"es_ES");
	
	$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$fechatwo=date("Y-m-d");
	
	$fechaseg=date("Y-m-d");
	
	$alm=date("Y-m-d");
	$almace = strtotime($alm."+ 1 days");

	$hora=date("g:i a"); date("D");
	$horatt=date("g:i a");
	$dia=date("d");
	$mes=date("F");
	$nom=date("l");
?>
