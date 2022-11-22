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
		<title>Usuarios | Chati </title>
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
	var respuesta = confirm('Estas seguro que deseas eliminar el usuario?');
	
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
<img src="imagenes/retrato.svg" width="30px" style="float:left;vertical-align: middle;margin:10px;">
<p class="inter"><font color="" style="font-size:25px;"><b>Usuarios</b></font></p>
<p class="intertw"><font color="" style="font-size:13px;">
Estas en el módulo de <a style="color:#1681ee;">usuarios</a>, aquí podrás gestionar a todos los usuarios de cada sitio.<br>

</font></p>

</div>


<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">

<a href="#openModaltwo" class="csone">Nuevo usuario</a>

<br><br>
						
<div class="form-group">
            <input type="text" name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (nombre o apellido)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 
		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_usuarios.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&cliente=<?php echo $acliente?>&sitiotw=<?php echo $sitionew?>&idcliente=<?php echo $idusuario?>",
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


<form action="add/add_usuario.php" method="POST">
<input type="hidden" class="camp" id="estado" name="estado" value="disponible" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="empresa" name="empresa" value="Agente" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="idcliente" name="idcliente" value="<?php echo $idusuario;?>" autocomplete="off" readonly="readonly" />

<br>
<div class="conte" style="height:300px;overflow: scroll;">			
<table>
<?php
   $pp = "SELECT * FROM sitios WHERE estatus='disponible' AND udetalle='$idusuario' ORDER BY pais";
   $aprobtpa=mysqli_query($conn,$pp);
?>
<tr>
<td><h6 class="perfil">Sitio:</h6></td>
<td><select name="sitio" class="camp" style="width:200px;" required>
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
	<td><h6 class="perfil">Email:</h6></td>	
	<td><input type="email" id="usuario_nom" style="width:200px;" class="camp" name="usuario_nom" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Nombre:</h6></td>	
	<td><input type="text" id="nombre_comple" style="width:200px;" class="camp" name="nombre_comple" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Apellidos:</h6></td>	
	<td><input type="text" id="apellidos" style="width:200px;" class="camp" name="apellidos" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><h6 class="perfil">Contraseña:</h6></td>	
	<td><input type="password" id="pasusuario" style="width:200px;" class="camp" name="pasusuario" autocomplete="off" required /></td>
</tr>
<tr>
<td><h6 class="perfil">Rol:</h6></td>
<td><select name="estatus" class="camp" style="width:200px;" required>
    <option></option>
	<option value="Usuario">Usuario</option>
	<option value="Administrador">Administrador</option>
	</select></td>
</tr>

<tr>
<td><label class="switch">
  <input type="checkbox" name="moduno" value="SI">
  <span class="slider round"></span>
</label>
</td>
<td>Canales</td>
</tr>
<tr>
<td><label class="switch">
  <input type="checkbox" name="moddos" value="SI">
  <span class="slider round"></span>
</label>
</td>
<td>Parámetros</td>
</tr>
<tr>
<td><label class="switch">
  <input type="checkbox" name="modtres" value="SI">
  <span class="slider round"></span>
</label>
</td>
<td>Usuarios</td>
</tr>
</table>
</div>
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