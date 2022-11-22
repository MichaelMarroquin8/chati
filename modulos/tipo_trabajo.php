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
		<title>Parámetros | KT Connect </title>
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
<img src="imagenes/expandir.svg" width="30px" style="float:left;vertical-align: middle;margin:10px;">
<p class="inter"><font color="" style="font-size:25px;"><b>Parámetros</b></font></p>
<p class="intertw"><font color="" style="font-size:13px;">
Estas en el módulo de <a style="color:#1681ee;">parámetros</a>, aquí podrás guardar todos los datos necesarios para utilizar el sistema de forma correcta.<br>

</font></p>

</div>

<br>
<center>
<a href="parameters.php" class="md-trigger">Sitios</a>
<a href="tipo_trabajo.php" class="md-oscuro">Tipo de Trabajo</a>
</center>
<br>
	
<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">

<div class="columna">					
                        <h2 class="tm-block-title">Agregar tipo de trabajo</h2>


<form action="add/add_ttrabajo.php" method="POST">			
<table style="width:100%;">
<input type="hidden" class="camp" id="udetalle" name="udetalle" value="<?php echo $datosone['idusuario']?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="estatus" name="estatus" value="disponible" autocomplete="off" readonly="readonly" />

<tr>
<?php
   $sqle = "SELECT * FROM sitios ORDER BY pais";
   $resulte=mysqli_query($conn,$sqle);
?>
<td><h6 class="perfil">País:</h6></td>
<td><select name="sitio" class="camp" required>
    <option></option>
    <?php
    
    while ($rowe = mysqli_fetch_assoc($resulte))
    {
    ?>	
		<option value="<?=$rowe['pais']?>"><?=$rowe['pais']?></option>
	<?php
    }
    ?>	
	</select></td>
</tr>

<tr>		
	<td><h6 class="perfil">Tipo de trabajo:</h6></td>	
	<td><input type="text" id="trabajo" class="camp" name="trabajo" autocomplete="off" required /></td>
</tr>

</table>
<br>
<input class="md-trigger" type="submit" value="Guardar" id="btn_inicia"/>	
</form>
<br>
</div>







<div class="columna">	
                        <h2 class="tm-block-title">Lista</h2>



<div class="form-group">
            <input type="text"  name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (País)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 



		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_ttrabajo.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>",
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
