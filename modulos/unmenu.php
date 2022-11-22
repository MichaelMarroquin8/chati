<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Módulos | Chati </title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/cajaestilo.css">
		
		<script src="librerias/code/highcharts.js"></script>
		<script src="librerias/code/modules/exporting.js"></script>
		<link rel="stylesheet" type="text/css" href="css/app.css" />
		<link rel="stylesheet" type="text/css" href="css/anima.css" />
		<link rel="stylesheet" type="text/css" href="css/buttons.css" />
		<link rel="stylesheet" type="text/css" href="css/barradd.css" />
		<link rel="stylesheet" type="text/css" href="css/load.css" />
		<link rel="stylesheet" type="text/css" href="csstabla/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="csstabla/templatemo-style.css">
		<link rel="stylesheet" type="text/css" href="css/plus.css">
		
		<link rel="stylesheet" type="text/css" href="css/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
		
		<script src="pagjs/pag.js"></script>
		
	</head>	
	<body>
		
	
<div class="home_content">


<?php
include("menu/nuevo.php");
?>	
	

</div>




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
 
	</body>
</html>
