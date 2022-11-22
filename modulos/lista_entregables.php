<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
	$idesp=$_GET['idesp'];
	$refuno=$_GET['refuno'];
	
	$querytw=mysqli_query($conn,"select * from `detalle_espacios` where refuno='$refuno' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$trabajo=$admin['trabajo'];
	$titulo=$admin['titulo'];
	$descrip=$admin['descrip'];
	
	
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Entregables | KT Connect </title>
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

<p class="inter"><font color="" style="font-size:25px;"><b>Requerimiento:</b> <?php echo $titulo;?></font></p>
<p class="intertw"><font color="" style="font-size:13px;">
Estas en el requerimiento <a style="color:#1681ee;"><?php echo $titulo;?></a>, aquí podrás gestionar todos los entregables.

</font></p>

</div>


<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
<a href="lista_e.php?idesp=<?php echo $idesp;?>"><img src="imagenes/borrar.svg" width="30px"></a>	

<?php
if ($super=='Administrador'){
?>
<a href="#openModaltwo" class="csone">Agregar Entregables</a>

<br><br>
<?php
}else{
?>
<br><br>
<?php
}
?>				




<?php
if ($super=='Administrador'){
?>	

						
<div class="form-group">
            <input type="text" name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (nombre)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 
		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_entre.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&cliente=<?php echo $acliente?>&sitiotw=<?php echo $sitionew?>&idesp=<?php echo $idesp?>&refedos=<?php echo $refuno?>",
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


<?php
}else{
?>




<div class="form-group">
            <input type="text" name="search_boxactus" id="search_boxactus" class="form-control" placeholder="Buscador (nombre)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_conteus">
           
        </div> 
		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_entreus.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&cliente=<?php echo $acliente?>&sitiotw=<?php echo $sitionew?>&idesp=<?php echo $idesp?>&refedos=<?php echo $refuno?>",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_conteus').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_boxactus').val();
      load_data(page, query);
    });

    $('#search_boxactus').keyup(function(){
      var query = $('#search_boxactus').val();
      load_data(1, query);
    });

  });
</script>


<?php
}
?>	

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


<form action="add/add_entreg.php" method="POST">
<br>
		
<table>

<input type="hidden" class="camp" id="estadoe" name="estadoe" style="width:200px;" value="disponible" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="estatus" name="estatus" style="width:200px;" value="Pendiente" autocomplete="off" readonly="readonly" />
<input type="hidden" name="refedos" class="camp" style="width:200px;" value="<?php echo $refuno;?>" readonly="readonly">	
<input type="hidden" class="camp" id="conne" name="conne" style="width:200px;" value="<?php echo $idesp;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="quienrede" name="quienrede" style="width:200px;" value="<?php echo $datosone['idusuario']?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="sitiorede" name="sitiorede" style="width:200px;" value="<?php echo $sitionew?>" autocomplete="off" readonly="readonly" />


<tr>		
	<td><h6 class="perfil">Título:</h6></td>	
	<td><input type="text" id="tituloe" class="camp" name="tituloe" style="width:200px;" autocomplete="off" required /></td>
</tr>

<tr>
    <td><h6 class="perfil">Descripción (Opcional):</h6></td>	
	<td><textarea name="descripe" class="camp" style="width:200px;height:130px;"></textarea></td>
</tr>
<tr>		
	<td><h6 class="perfil">Fecha de Vencimiento:</h6></td>	
	<td><input type="date" id="fechavencie" class="camp" style="width:200px;" name="fechavencie" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Fecha de Cumplimiento:</h6></td>	
	<td><input type="date" id="fechacumpli" class="camp" style="width:200px;" name="fechacumpli" autocomplete="off" required /></td>
</tr>
<tr>
<?php
   $sqle = "SELECT * FROM usuarios WHERE sitio='$sitionew' ORDER BY nombre_comple";
   $resulte=mysqli_query($conn,$sqle);
?>
<td><h6 class="perfil">Responsable:</h6></td>
<td><select name="solicitre" class="camp" style="width:200px;" required>
    <option></option>
    <?php
    
    while ($rowe = mysqli_fetch_assoc($resulte))
    {
    ?>	
		<option value="<?=$rowe['idusuario']?>"><?=$rowe['nombre_comple']?> <?=$rowe['apellidos']?></option>
	<?php
    }
    ?>	
	</select></td>
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