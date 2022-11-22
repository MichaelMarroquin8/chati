<?php 
    session_start(); 
	include('../iniciosesion/funciones.php');
	include("conex/conn.php");
	include("hora/fechora.php");
	
	include("vsesion/sesion.php");
	
	include("habilitar/fechayhora.php");
	
	$idprs=$_GET['refeg'];
	
	$id_detalle=$_GET['id_detalle'];
	
	$querytw=mysqli_query($conn,"select * from `usuarios` where idusuario='$idusuario' ");
	$admin = mysqli_fetch_assoc($querytw);
	
	$fotoad=$admin['foto'];
	$nivel=$admin['estatus'];
	
	$query=mysqli_query($conn,"select * from `general` where refeg='$idprs' ");
	$datosone = mysqli_fetch_assoc($query);
	
	
    if(isset($_SESSION['privilegio_nombre'])) { 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Vista Full | Sigmadocs</title>
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

                       






          <div class="table-responsive" id="dynamic_contentact">
           
        </div> 



		
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"listafull.php?idprs=<?php echo $idprs?>&id_detalle=<?php echo $id_detalle?>",
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