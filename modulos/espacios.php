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
		<title>Canales | Chati </title>
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
		<link rel="stylesheet" type="text/css" href="css/swiche.css" />
		<link rel="stylesheet" type="text/css" href="css/plus.css">
        
		<script src="pagjs/pag.js"></script>
		
<script type="text/javascript">
	function ConfirmDelete()
	{
	var respuesta = confirm('Estas seguro que deseas eliminar el canal de atención?');
	
	if (respuesta == true)
		{
			return true;
		}	
	else
		{
			return false;
		}
	
	}
	
	
	
	function ConfirmDeletebloc()
	{
	var respuestabloc = confirm('Estas seguro que deseas bloquear el canal?');
	
	if (respuestabloc == true)
		{
			return true;
		}	
	else
		{
			return false;
		}
	
	}
	
	
	function ConfirmDeletedesbloc()
	{
	var respuestadbloc = confirm('Estas seguro que deseas desbloquear el canal?');
	
	if (respuestadbloc == true)
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

<div class="cuados">	
<img src="imagenes/canales.svg" width="30px" style="float:left;vertical-align: middle;margin:10px;">
<p class="inter"><font color="" style="font-size:25px;"><b>Canales de atención</b></font></p>
<p class="intertw"><font color="" style="font-size:13px;">
Estas en el módulo creación <a style="color:#1681ee;">canales de atención</a>, aquí podrás gestionar todos los chats creados.<br>

</font></p>

</div>


<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">

<?php
if ($super=='Administrador'){
	
	
$cuenta="SELECT idesp,tokenc,estado,quienre,sitiore,nombespac,idcliente,bloqueado,quienbloc,quieneli,nomb,COUNT(*) as conteo FROM espacios where nomb='$nom'";
				$okcu=mysqli_query($conn,$cuenta);
				$pcu=mysqli_fetch_assoc($okcu);
	  
$conteo = $pcu['conteo'];

if ($conteo=='3'){
?>
<b style="background:red;border-radius:20px;color:#ffffff;padding:5px;font-size:14px;cursor:pointer;">Se ha alcanzado el límite máximo de canales</b>
<br><br>
<?php	
}else{
?>
<a href="#openModaltwo" class="csone">Crear nuevo canal</a>
<br><br>
<?php	
}
?>
<?php
}else{
?>

<?php
}
?>	
<div class="form-group">
            <input type="text" name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (nombre del canal)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 
		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_espacios.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&cliente=<?php echo $acliente?>&sitiotw=<?php echo $sitionew?>&idcliente=<?php echo $idusuario?>&nomb=<?php echo $nom?>",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_contentact').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_boxact').val();
      load_data(page, query);
    });

    $('#search_boxact').keyup(function(){
      var query = $('#search_boxact').val();
      load_data(1, query);
    });

  });
</script>



                    </div>
                </div>	

	


</div>
</div>

<br>





<div id="openModaltwo" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />

<?php function generarCodigo($longitud)
 { 
	$key = '';
	$pattern = '123456789ABCDEFGHIJKMNLOPQRSTUVWXYZabcdefghijkmnlopqrstuvxyz'; 
	$max = strlen($pattern)-1; 
	
	for($i=0;$i < $longitud;$i++) 
		$key .= $pattern{mt_rand(0,$max)
	}; 
	return $key; 
	
};


$cuentatw="SELECT * FROM usuarios ORDER BY idusuario DESC";
				$okcutw=mysqli_query($conn,$cuentatw);
				$pcutw=mysqli_fetch_assoc($okcutw);
	  
$conteotw = $pcutw['idusuario'];

?>
	
	
<form action="add/add_espacio.php" method="POST">

<input type="hidden" name="idusuario" value="<?php echo $conteotw+1;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" name="linea" value="dos" autocomplete="off" readonly="readonly" />
<input type="hidden" name="usuario_nom" value="<?php echo $nombre;?>_<?php echo generarCodigo(8);?>@sigmamovil.com" autocomplete="off" readonly="readonly" />
<input type="hidden" name="nombre_comple" value="<?php echo $nombre;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" name="apellidos" value="<?php echo $apelli;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" name="pasusuario" value="23140756" autocomplete="off" readonly="readonly" />
<input type="hidden" name="estatus" value="Administrador" autocomplete="off" readonly="readonly" />
<input type="hidden" name="foto" value="<?php echo $fototw;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" name="moduno" value="SI" autocomplete="off" readonly="readonly" />
<input type="hidden" name="moddos" value="SI" autocomplete="off" readonly="readonly" />
<input type="hidden" name="modtres" value="SI" autocomplete="off" readonly="readonly" />
<input type="hidden" name="modcuatro" value="SI" autocomplete="off" readonly="readonly" />
<input type="hidden" name="empresa" value="SI" autocomplete="off" readonly="readonly" />
<input type="hidden" name="idref" value="<?php echo $idusuario;?>" autocomplete="off" readonly="readonly" />




<input type="hidden" class="camp" id="estado" name="estado" value="disponible" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="quienre" name="quienre" value="<?php echo $idusuario;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" name="tokenc" value="<?php echo generarCodigo(20);?>" readonly="readonly">
<input type="hidden" name="idcliente" value="<?php echo $conteotw+1;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" name="nomb" value="<?php echo $nombre;?> <?php echo $apelli;?>" autocomplete="off" readonly="readonly" />
<br>
		
<table>
<?php
   $pp = "SELECT * FROM sitios WHERE estatus='disponible' AND udetalle='$idusuario' ORDER BY pais";
   $aprobtpa=mysqli_query($conn,$pp);
?>
<tr>
<td><h6 class="perfil">Sitio:</h6></td>
<td><select name="sitiore" class="camp" style="width:200px;" required>
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
	<td><h6 class="perfil">Nombre del Canal:</h6></td>	
	<td><input type="text" id="nombespac" style="width:200px;" class="camp" name="nombespac" autocomplete="off" required /></td>
</tr>
</table>

<br>
<input class="md-trigger" type="submit" value="Crear" id="btn_inicia"/>	
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