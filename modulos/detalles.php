<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
	
	
	$idusuarionew=$_GET['idusuario'];
	
	$query=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuarionew' ");
	$datosoneus = mysqli_fetch_assoc($query);
	
	$idclientes=$datosoneus['idcliente'];
	
	$confoto=$datosoneus['foto'];
	
	
	$checki = $datosoneus['checki'];
	
	
	//count
	$queja="select idcal,idcliente,idusur,puntaje,COUNT(*) as contad from `calificar` where idcliente='$idusuarionew'";
				$graque=mysqli_query($conn,$queja);
				$posiivque=mysqli_fetch_assoc($graque);
				
				$contad = $posiivque['contad'];
				


	$calificat="select idcal,idcliente,idusur,puntaje,SUM(puntaje) as estrellas from `calificar` where idcliente='$idusuarionew'";
				$gracal=mysqli_query($conn,$calificat);
				$ggacl=mysqli_fetch_assoc($gracal);
				

				$estrellas = $ggacl['estrellas'];
				
				if ($estrellas=='NAN'){
					
					$estrellas=0;
				}else{
					$estrellas = $ggacl['estrellas'];
				}
				
				
				$calcu = $estrellas/$contad;

			    $redondea = round($calcu);
	
	
	$queryesptw=mysqli_query($conn,"select * from `espacios` where idcliente='$idusuarionew' ");
	$espetew = mysqli_fetch_assoc($queryesptw);
	
	$info=$espetew['inform'];
	
	
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Detalle | Chati </title>
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


	
<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">

<div class="columna">					

<br>

<table>
 <tr>
<td><h6 class="perfil"><b style="font-size:25px;"><?php echo $datosoneus['nombre_comple']?> <?php echo $datosoneus['apellidos']?>
									<?php
									if (empty($checki)){
										
									}else{
									?>
									 <img src="imagenes/checki.png" width="18px">
									<?php
									}
									?>
</b></h6></td>
  </tr>
</table>

La empresa cuenta con la siguiente reputación:

<?php

if($redondea == '1'){
   $redondea = "<div class='star-rating' style='font-size:30px;'>★</div>";
}elseif($redondea == '2'){
   $redondea = "<div class='star-rating' style='font-size:30px;'>★★</div>";
}elseif($redondea == '3'){
   $redondea = "<div class='star-rating' style='font-size:30px;'>★★★</div>";
}elseif($redondea == '4'){
   $redondea = "<div class='star-rating' style='font-size:30px;'>★★★★</div>";
}elseif($redondea == '5'){
   $redondea = "<div class='star-rating' style='font-size:30px;'>★★★★★</div>"; 
}elseif($redondea>'5'){
   $redondea = "<div class='star-rating' style='font-size:30px;'>★★★★★</div>";   
}else{
   $redondea = "<div class='star-ratingtw' style='font-size:30px;'>★★★★★</div>"; 
}

if ($redondea>='1'){
?>

<?php echo $redondea; ?>

<?php	
}else{
?>


<?php
}
?>
		

<table style="width:100%;">
<tr>		
	<td>
	<textarea name="inform" class="camp" style="width:380px;height:170px;" readonly><?php echo $info;?></textarea>
	</td>
</tr>
</table>


</div>







<div class="columna">	
  <br>





<table>
 <tr>
<?php									
if(empty($confoto))
{ 
?>
<td><img src='imagenes/user.svg' class="fottw"></td>
<?php
}
else{ 
?>
<td><img src="<?php echo $confoto; ?>" class="fottw"/></td>
<?php
}
?>
  </tr>
</table>

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
