<?php 
    session_start();

    if(isset($_SESSION['privilegio_nombre'])) {
		
	header("Location: ../modulos/modulos.php");

    }else{	
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Chati Live</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/estiloa.css" />
		<link rel="stylesheet" type="text/css" href="css/fondo.css" />
			
		<link rel="stylesheet" type="text/css" href="css/barradd.css" />
		<link rel="stylesheet" type="text/css" href="css/componentes.css" />
		<link rel="stylesheet" type="text/css" href="css/haldol8.css" />
		<link rel="stylesheet" type="text/css" href="css/letra.css" />
		<link rel="stylesheet" type="text/css" href="css/load.css" />
	</head>	
	<body>
	
<div id="contenedor_carga">
	<div id="carga"></div>
</div>	
	
<div class="codrops-top clearfix">
<div class="menu2">
			<header class="hl-cabeza cf">
				<nav>
					
				</nav>
			</header>
</div>			
	</div>

	
<div class="menu">
<div class="botonesinicio">	
	
<center>
<?php
function generarCodigo($longitud)
 { 
	$key = '';
	$pattern = '123456789ABCDEFGHIJKMNOPQRSTUVWXYZabcdefghijkmnlopqrstuvwxyz'; 
	$max = strlen($pattern)-1; 
	
	for($i=0;$i < $longitud;$i++) 
		$key .= $pattern{mt_rand(0,$max)
	}; 
	return $key; 
	
	};
?>
	<form action="iniciando.php" method="POST" class="contenido">
	<input type="hidden" id="linea" name="linea" value="uno" />
	
	<input type="hidden" id="estado" name="estado" value="disponible" />
	<input type="hidden" id="sitio" name="sitio" value="Colombia" />
	<input type="hidden" id="estatus" name="estatus" value="Administrador" />
	
	<input type="hidden" id="moduno" name="moduno" value="SI" />
	<input type="hidden" id="moddos" name="moddos" value="SI" />
	<input type="hidden" id="modtres" name="modtres" value="SI" />
	<input type="hidden" id="modcuatro" name="modcuatro" value="SI" />

	<input type="hidden" id="polit" name="polit" value="SI" />
	<input type="hidden" id="empresa" name="empresa" value="SI" />

	<input type="hidden" id="cod" name="cod" value="<?php echo generarCodigo(6);?>" />
	
	
			<div class="menu">		
<br>	
			
			<div class="botonesinicio">	
			<br>
			<div class="kal">
			
            <img src="imagenes/kallgris.png" width="200px">	
		
			<h4><font color="#130430">Iniciar en Chati</font></h4>
			
			
					<input type="text" id="nombre_comple" name="nombre_comple" placeholder="Empresa" required autocomplete="off"/>
	  				
<br>
	 					Por favor digita el nombre de tu empresa registrada en AIO y presiona el botón -<b>Continuar</b>- para ingresar
						<br><br>
					<input class="md-trigger" type="submit" value="Continuar" id="btn_inicia"/>
	 
	 
	
			
			</div>
			</div>
			
			
	  		</form>
</center>			
			</div>
			
		

</div>
</div>


<script type="text/javascript">
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	
	}
</script>
	</body>
</html>
<?php
}
?>