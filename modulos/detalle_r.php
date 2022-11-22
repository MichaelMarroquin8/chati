<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/habimodul.php");
	
	$idesp=$_GET['idesp'];
	$refuno=$_GET['refuno'];
	
	$identre=$_GET['identre'];
	

	$querytw=mysqli_query($conn,"select * from `detalle_espacios` where refuno='$refuno' and conn='$idesp' ");
	$pcon = mysqli_fetch_assoc($querytw);
	
	$idetals = $pcon['idetals'];
	
	$qfour=mysqli_query($conn,"select * from `detalle_entrega` where identre='$identre' ");
	$pconfour = mysqli_fetch_assoc($qfour);
	
	$fechavencie = $pconfour['fechavencie'];
	$fechacumpli = $pconfour['fechacumpli'];

	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Detalle Entregable | KT Connect </title>
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
		
		<link rel="stylesheet" type="text/css" href="css/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
        
		<script src="pagjs/pag.js"></script>
<script type="text/javascript">
	function ConfirmDelete()
	{
	var respuesta = confirm('Estas seguro que deseas eliminar el archivo?');
	
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

<a href="lista_entregables.php?idesp=<?php echo $idesp;?>&refuno=<?php echo $refuno;?>" style="float:left;vertical-align: middle;margin:10px;"><img src="imagenes/borrar.svg" width="30px"></a>

<p class="inter"><font color="" style="font-size:25px;"><b>Detalles del Entregable</b></font></p>
<p class="intertw"><font color="" style="font-size:13px;">
Por favor ingresa los datos solicitados.

</font></p>

</div>
	
<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">

<div class="columna">
                        <h2 class="tm-block-title">Información General</h2>

			
<table style="width:100%;">
<input type="hidden" class="camp" id="idetals" name="idetals" value="<?php echo $idetals;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="conn" name="conn" value="<?php echo $idesp;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="refuno" name="refuno" value="<?php echo $refuno;?>" autocomplete="off" readonly="readonly" />

<tr>
<td><h6 class="perfil">Trabajo:</h6></td>
<td><select name="trabajo" class="camp" required>
    <option value="<?php echo $pcon['trabajo']?>"><?php echo $pcon['trabajo']?></option>
	</select></td>
</tr>
<tr>		
	<td><h6 class="perfil">ID de Requerimiento:</h6></td>	
	<td><input type="text" id="idrequeri" class="camp" readonly name="idrequeri" value="<?php echo $pcon['idrequeri']?>" autocomplete="off" required /></td>
</tr>

<tr>		
	<td><h6 class="perfil">Título del Requerimiento:</h6></td>	
	<td><input type="text" id="titulo" class="camp" name="titulo" readonly value="<?php echo $pcon['titulo']?>" autocomplete="off" required /></td>
</tr>

<tr>
    <td><h6 class="perfil">Descripción (Opcional):</h6></td>	
	<td><textarea name="descrip" class="camp" readonly style="height:130px;"><?php echo $pcon['descrip']?></textarea></td>
</tr>
<tr>		
	<td><h6 class="perfil">Fecha de Vencimiento:</h6></td>	
	<td><input type="date" id="fechavenci" readonly class="camp" name="fechavenci" value="<?php echo $fechavencie?>" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Fecha de Cumplimiento:</h6></td>	
	<td><input type="date" id="fechacumpli" readonly class="camp" name="fechacumpli" value="<?php echo $fechacumpli?>" autocomplete="off" required /></td>
</tr>


</table>
<br>


<h2 class="tm-block-title">Detalle del Entregable</h2>
<form action="update/update_estatus.php" method="POST">
<input type="hidden" class="camp" id="identre" name="identre" value="<?php echo $identre;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="conn" name="conn" value="<?php echo $idesp;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="refuno" name="refuno" value="<?php echo $refuno;?>" autocomplete="off" readonly="readonly" />

<table>
<?php
if ($super=='Administrador'){
?>
<tr>
<td><h6 class="perfil">Estado:</h6></td>
<td><select name="estatus" class="camp" required>
    <option value="<?php echo $pconfour['estatus']?>"><?php echo $pconfour['estatus']?></option>
	<option></option>
	<option value="Pendiente">Pendiente</option>
	<option value="En proceso">En proceso</option>
	<option value="Enviado">Enviado</option>
	<option value="Completado">Completado</option>
	<option value="Rechazado">Rechazado</option>
	</select></td>
</tr>
<tr>
    <td><h6 class="perfil">Comentarios:</h6></td>	
	<td><textarea name="comrecha" class="camp" style="height:130px;"><?php echo $pconfour['comrecha']?></textarea></td>
</tr>
<?php
}else{
?>
<tr>
<td><h6 class="perfil">Estado:</h6></td>
<td><select name="estatus" class="camp" required>
    <option value="<?php echo $pconfour['estatus']?>"><?php echo $pconfour['estatus']?></option>
	<option></option>
	<option value="En proceso">En proceso</option>
	<option value="Enviado">Enviado</option>
	<option value="Pendiente">Pendiente</option>
	</select></td>
</tr>

<input type="hidden" id="comrecha" class="camp" name="comrecha" readonly value="<?php echo $pconfour['comrecha']?>" autocomplete="off" required />
<?php
}
?>
<tr>		
	<td><h6 class="perfil">Título:</h6></td>	
	<td><input type="text" id="tituloe" class="camp" name="tituloe" readonly value="<?php echo $pconfour['tituloe']?>" autocomplete="off" required /></td>
</tr>
<tr>
    <td><h6 class="perfil">Descripción del entregable:</h6></td>	
	<td><textarea name="descripe" class="camp" readonly style="height:130px;"><?php echo $pconfour['descripe']?></textarea></td>
</tr>
</table>
<br>
<input class="md-trigger" type="submit" value="Guardar" id="btn_inicia"/>	
</form>


<br>
</div>







<div class="columna">	

                        <h2 class="tm-block-title">Archivos (Opcional)</h2>




<form action="add_archivo.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">

<input type="hidden" class="camp" id="estado" name="estado" value="disponible" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="quienre" name="quienre" value="<?php echo $idusuario;?>" autocomplete="off" readonly="readonly" />

<input type="hidden" class="camp" id="idetals" name="idetals" value="<?php echo $idetals;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="conn" name="conn" value="<?php echo $idesp;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="referencia" name="referencia" value="<?php echo $refuno;?>" autocomplete="off" readonly="readonly" />


<input type="file" name="archivofin" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple required />
      
<br><br>
<input type="hidden" class="camp" id="identredos" name="identredos" value="<?php echo $identre;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="fecha" name="fecha" value="<?php echo $alm;?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="hora" name="hora" value="<?php echo $horatt;?>" autocomplete="off" readonly="readonly" />

<textarea name="comentarios" class="camp" style="width:100%;height:100px;"></textarea>


<br><br>				
<input type="submit" id="submit" name="import" class="md-trigger" value="Subir Archivo">
</center>
</form>	

<br>



<div class="form-group">
            <input type="text"  name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (Tipo de archivo)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 



		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_archivos.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&refuno=<?php echo $refuno?>&idesp=<?php echo $idesp?>&identre=<?php echo $identre?>",
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

<script src="js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
</script>	  			


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
