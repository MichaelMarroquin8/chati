<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/fechayhora.php");
	
	$idprs=$_GET['idprs'];
	$id_detalle=$_GET['id_detalle'];
	
	
	
	$querytw=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$fotoad=$admin['foto'];
	$nivel=$admin['estatus'];
	
	$query=mysqli_query($conn,"select * from `detalle` where id_detalle='$id_detalle' ");
	$datosone = mysqli_fetch_assoc($query);
	
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Detalle | Sigmadocs</title>
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
<center>	
<form action="update/update_dd.php" method="POST">
<table>	
<input type="hidden" class="camp" id="idprs" name="idprs" value="<?php echo $idprs?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="id_detalle" name="id_detalle" value="<?php echo $datosone['id_detalle']?>" autocomplete="off" readonly="readonly" />
<tr>		
	<td><font color="#111217">Categoría:</font></td>	
	<td><select name="categoriadet" class="camp" style="width:120px;" required>
	<option value="<?php echo $datosone['categoriadet']?>"><?php echo $datosone['categoriadet']?></option>
    <option></option>
	<option value="Diagrama">Diagrama</option>
	<option value="Módulo">Módulo</option>
	<option value="Opción">Opción</option>
	<option value="Código">Código</option>
	<option value="Gráfica">Gráfica</option>
	<option value="Mejora">Mejora</option>
	<option value="Nota">Nota</option>
	<option value="Aviso">Aviso</option>
	</select></td>
		
	<td><font color="#111217">Título:</font></td>	
	<td><input type="text" name="titulodet" value="<?php echo $datosone['titulodet']?>" class="camp"></td>
	<td><input class="md-trigger" type="submit" value=">" id="btn_inicia"/></td>
</tr>

</table>
</form>	
</center>
<br>
<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
					 <h2 class="tm-block-title">Información</h2>
					
<a href="detalle_proyecto.php?idprs=<?php echo $idprs;?>" style="float:left;"><img src="imagenes/flec.png" width="60px"></a>
            





                        <a href="#openModaltwo" class="md-trigger">Agregar Conceptos</a>
						
<a href="vistafull.php?refeg=<?php echo $idprs?>&id_detalle=<?php echo $id_detalle?>" class="md-trigger">Vista Completa</a>

						
<div class="form-group">
<br>
            <input type="text"  name="search_boxact" id="search_boxact" class="form-control" placeholder="Buscador (Concepto)" autocomplete="off" />
          </div>
          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 



		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"lista_conceptos.php?rango=<?php echo $rango?>&usuar=<?php echo $idusuario?>&idprs=<?php echo $idprs?>&id_detalle=<?php echo $id_detalle?>",
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
		





<div id="openModaltwo" class="modalDialogfoto">
	<div>
		<a href="#close" title="Close" class="close">X</a>
<img src="imagenes/kallgris.png" width="120px" />

<center>

<form action="add_r.php" method="POST" enctype="multipart/form-data">

<input type="hidden" class="camp" id="idprs" name="idprs" value="<?php echo $idprs?>" autocomplete="off" readonly="readonly" />
<input type="hidden" class="camp" id="id_detalle" name="id_detalle" value="<?php echo $id_detalle?>" autocomplete="off" readonly="readonly" />

<input type="hidden" class="camp" id="enlace" name="enlace" value="REF" autocomplete="off" readonly="readonly" />

<input type="hidden" class="camp" id="refeg" name="refeg" value="<?php echo $id_detalle?>" autocomplete="off" readonly="readonly" />
<input type="hidden" id="fecha" class="est" name="fecha" value="<?php echo $fecha;?>" required />
<input type="hidden" id="hora" class="est" name="hora" value="<?php echo $hora;?>" required />
<input type="hidden" id="usuario" class="est" name="usuario" value="<?php echo $idusuario;?>" required />
<input type="hidden" id="estado" class="est" name="estado" value="disponible" required />
<br>
		
<table>
<tr>
<td><font color="#000">Concepto:</font></td>
<td><input type="text" name="concepto" class="est" style="width:350px;" required></td>
</tr>
<tr>
<td><font color="#000">Descripción:</font></td>	
	<td><textarea name="comentarios" class="est" style="width:350px;height:120px;" required></textarea></td>
</tr>
<tr>
<td><font color="#000">Foto:</font></td>
<td><input type="file" name="foto" style="color:#000000;" required></td>
</tr>
</table>


<br>
<input class="md-trigger" type="submit" value="Guardar" id="btn_inicia"/>	
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