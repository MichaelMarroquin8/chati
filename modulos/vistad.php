<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/fechayhora.php");
	
	$idprs=$_GET['idprs'];
	$id_detalle=$_GET['id_detalle'];
	$id_g=$_GET['id_g'];
	
	
	
	$querytw=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$fotoad=$admin['foto'];
	$nivel=$admin['estatus'];
	
	$query=mysqli_query($conn,"select * from `general` where id_g='$id_g' ");
	$datosone = mysqli_fetch_assoc($query);
	
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Vista | Sigmadocs</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/estiloa.css" />
		<link rel="stylesheet" type="text/css" href="css/principales.css" />	
		<link rel="stylesheet" type="text/css" href="css/barradd.css" />
		<link rel="stylesheet" type="text/css" href="css/componentes.css" />
		<link rel="stylesheet" type="text/css" href="css/campos.css" />
		<link rel="stylesheet" type="text/css" href="css/haldol8.css" />
		<link rel="stylesheet" type="text/css" href="css/letra.css" />
		<link rel="stylesheet" type="text/css" href="css/load.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/templatemo-style.css">	
		<link rel="stylesheet" href="css/listatable.css">
		
		<script src="pagjs/pag.js"></script>
		
<script type="text/javascript">
	function ConfirmDelete()
	{
	var respuesta = confirm('Estas seguro que deseas eliminar el Concepto?');
	
	if (respuesta == true)
		{
			return true;
		}	
	else
		{
			return false;
		}
	
	}
</script>		
	</head>	
	<body>
	
<div id="contenedor_carga">
	<div id="carga"></div>
</div>	
	
<div class="codrops-top clearfix">
<?php
include("vsesion/headersi.php");
?>		
</div>

<br>
<br>
<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
					 
					
<a href="detalle_dd.php?idprs=<?php echo $idprs;?>&id_detalle=<?php echo $id_detalle;?>" style="float:left;"><img src="imagenes/flec.png" width="60px"></a>
            
<h2 class="tm-block-title">Vista</h2>

	
<form action="update/update_dtw.php" method="POST">

<input type="hidden" class="camp" id="idprs" name="idprs" value="<?php echo $idprs?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="id_detalle" name="id_detalle" value="<?php echo $id_detalle?>" autocomplete="off" readonly="readonly" />
		
<input type="hidden" class="camp" id="id_g" name="id_g" value="<?php echo $id_g?>" autocomplete="off" readonly="readonly" />
		
	<input type="text" name="concepto" style="width:100%;" class="camp" value="<?php echo $datosone['concepto']?>" required>
	<br>
	
	<textarea name="comentarios" class="camp" style="width:100%;height:350px;" required><?php echo $datosone['comentarios']?></textarea>




<br>

<input class="md-trigger" type="submit" value="Actualizar" id="btn_inicia"/>
</form>	


<br>
                       


<center>
<form action="subir_newfoto.php" method="POST" enctype="multipart/form-data">

<input type="hidden" class="camp" id="id_detalle" name="id_detalle" value="<?php echo $id_detalle?>" style="width:200px;" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="idprs" name="idprs" value="<?php echo $idprs?>" style="width:200px;" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="id_g" name="id_g" value="<?php echo $id_g?>" style="width:200px;" autocomplete="off" readonly="readonly" />

<input type="hidden" class="camp" name="foto" value="<?php echo $datosone['foto']?>" readonly="readonly" style="width:200px;">
<?php function generarCodigofvi($longitud)
 { 
	$key = '';
	$pattern = '1234567890'; 
	$max = strlen($pattern)-1; 
	
	for($i=0;$i < $longitud;$i++) 
		$key .= $pattern{mt_rand(0,$max)
	}; 
	return $key; };?> 
	

<input type="hidden" class="camp" name="enlace" value="S<?php echo generarCodigofvi(8);?>" readonly="readonly" style="width:200px;">
	

<?php									
if(empty($datosone['foto']))
{ 
?>
<font color="#000">Sin foto</font>
<?php
}
else{ 
?>
<img src="<?php echo $datosone['foto']; ?>" width="80%"/>
<?php
}
?>	
 
 

</center>

<br><br>
<input type="file" name="file_array" required>

<br><br>
       <td colspan="2">
<input class="md-trigger boton" type="submit" value="Subir nueva foto" id="btn_inicia"/>
       </td>
</form>
</div>

</div>
		




<script type="text/javascript">
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	
	}
</script>
<script src="js/custom-file-input.js"></script>

<?php
    }else{
		
	include("vsesion/seguridad.php");	

	}
?>
	</body>
</html>