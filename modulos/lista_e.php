<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
	$idesp=$_GET['idesp'];
	
	$querytw=mysqli_query($conn,"select * from `espacios` where idesp='$idesp' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$nombespac=$admin['nombespac'];
	
	
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Espacio de trabajo | KT Connect </title>
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
	var respuesta = confirm('Estas seguro que deseas eliminar el registro?');
	
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

<img src="imagenes/mundo.svg" style="float:left;vertical-align: middle;margin:10px;" width="30px">

<p class="inter"><font color="" style="font-size:25px;"><b><?php echo $nombespac;?></b></font></p>
<p class="intertw"><font color="" style="font-size:13px;">
Estas en el espacio de trabajo <a style="color:#1681ee;"><?php echo $nombespac;?></a>, aquí podrás gestionar todos los requerimientos.

</font></p>

</div>


<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
<a href="espacios.php"><img src="imagenes/borrar.svg" width="30px"></a>

<?php
if ($super=='Administrador'){
?>
<a href="#openModaltwo" class="csone">Agregar Requerimiento</a>
<br><br>
<?php
}else{
?>
<br><br>
<?php
}
?>

						
<div class="form-group">
            <input type="text" name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (Requerimiento)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 
		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_requeri.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&cliente=<?php echo $acliente?>&sitiotw=<?php echo $sitionew?>&idesp=<?php echo $idesp?>",
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

<?php 

    function generarCodigo($longitud)
    { 
	$key = '';
	$pattern = '123456789'; 
	$max = strlen($pattern)-1; 
	
	for($i=0;$i < $longitud;$i++) 
		$key .= $pattern{mt_rand(0,$max)
	}; 
	return $key; };

?>
<form action="add/add_requeri.php" method="POST">
<br>
		
<table>

<input type="hidden" class="camp" id="estado" name="estado" style="width:200px;" value="disponible" autocomplete="off" readonly="readonly" />
<input type="hidden" name="refuno" class="camp" style="width:200px;" value="<?php echo generarCodigo(8);?>" readonly="readonly">	
<input type="hidden" class="camp" id="conn" name="conn" style="width:200px;" value="<?php echo $idesp;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="quienred" name="quienred" style="width:200px;" value="<?php echo $datosone['idusuario']?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="sitiored" name="sitiored" style="width:200px;" value="<?php echo $sitionew?>" autocomplete="off" readonly="readonly" />

<tr>
<?php
   $sqle = "SELECT * FROM titrabajo WHERE sitio='$sitiotw' AND estatus='disponible' ORDER BY trabajo";
   $resulte=mysqli_query($conn,$sqle);
?>
<td><h6 class="perfil">Trabajo:</h6></td>
<td><select name="trabajo" class="camp" style="width:200px;"  required>
    <option></option>
    <?php
    
    while ($rowe = mysqli_fetch_assoc($resulte))
    {
    ?>	
		<option value="<?=$rowe['trabajo']?>"><?=$rowe['trabajo']?></option>
	<?php
    }
    ?>	
	</select></td>
</tr>
<tr>		
	<td><h6 class="perfil">ID de Requerimiento:</h6></td>	
	<td><input type="text" id="idrequeri" class="camp" name="idrequeri" style="width:200px;" autocomplete="off" required /></td>
</tr>

<tr>		
	<td><h6 class="perfil">Título del Requerimiento:</h6></td>	
	<td><input type="text" id="titulo" class="camp" name="titulo" style="width:200px;" autocomplete="off" required /></td>
</tr>

<tr>
    <td><h6 class="perfil">Descripción (Opcional):</h6></td>	
	<td><textarea name="descrip" class="camp" style="width:200px;height:130px;"></textarea></td>
</tr>
</table>

<br>
<input class="md-trigger" type="submit" value="Guardar" id="btn_inicia"/>	
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