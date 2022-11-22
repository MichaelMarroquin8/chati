<?php
session_start();
include('config/config.php');
if (isset($_SESSION['emailusuario']) != "") {
 $idConectado        = $_SESSION['privilegio_idusuario'];
 $email_user         = $_SESSION['emailusuario'];
 $NombreUsarioSesion = $_SESSION['nombre_comple'];
 $imgPerfil          = $_SESSION['privilegio_foto'];


 
$permisostw=mysqli_query($con,"select * from `usuarios` where idusuario='$idConectado' ");
$datapermi = mysqli_fetch_assoc($permisostw);
	

$comparar=$datapermi['empresa'];

//para sesión de agente:

$simulador=$datapermi['idcliente'];
?>


<?php
if ($comparar=='SI'){
	
//OJO chatxuser validación	
	
$QueryUsers = ("SELECT * FROM usuarios,chatxuser WHERE usuarios.idusuario!='$idConectado' AND chatxuser.usuario=usuarios.idusuario AND chatxuser.token='$tokenc' AND usuarios.empresa='usuario' ORDER BY usuarios.emailusuario ASC ");
$resultadoQuery = mysqli_query($con, $QueryUsers);


//foto principal del perfil en chat
$otrotw = ("select * from `usuarios` where idusuario='$idConectado' ");
$resultadoQuerytw = mysqli_query($con, $otrotw);

while ($FilaUserstw = mysqli_fetch_array($resultadoQuerytw)) {
          $fototw     = $FilaUserstw['foto'];
		  
}	
		
	
?>
	
<?php	
}elseif ($comparar=='Agente'){

$simular=mysqli_query($con,"select * from `usuarios` where idusuario='$simulador' ");
$simu = mysqli_fetch_assoc($simular);
	

$idConectado=$simu['idusuario'];

//OJO chatxuser validación	
	
$QueryUsers = ("SELECT * FROM usuarios,chatxuser WHERE usuarios.idusuario!='$idConectado' AND chatxuser.usuario=usuarios.idusuario AND chatxuser.token='$tokenc' AND usuarios.empresa='usuario' ORDER BY usuarios.emailusuario ASC ");
$resultadoQuery = mysqli_query($con, $QueryUsers);


//foto principal del perfil en chat
$otrotw = ("select * from `usuarios` where idusuario='$idConectado' ");
$resultadoQuerytw = mysqli_query($con, $otrotw);

while ($FilaUserstw = mysqli_fetch_array($resultadoQuerytw)) {
          $fototw     = $FilaUserstw['foto'];
		  
}	
	
?>


<?php	
}else{
	
$QueryUsers = ("SELECT * FROM usuarios,chatxuser WHERE usuarios.idusuario!='$idConectado' AND chatxuser.usuario=usuarios.idusuario AND usuarios.empresa='SI' ORDER BY usuarios.emailusuario ASC ");
$resultadoQuery = mysqli_query($con, $QueryUsers);

//foto principal del perfil en chat
$otrotw = ("select * from `usuarios` where idusuario='$idConectado' ");
$resultadoQuerytw = mysqli_query($con, $otrotw);

while ($FilaUserstw = mysqli_fetch_array($resultadoQuerytw)) {
          $fototw     = $FilaUserstw['foto'];
		  
}		
?>



<?php	
}
?>

     <!--AQUÍ ESTA EL PERFIL DEL USUARIO-->
	 
      <div class="status-bar"></div>
        <div class="row heading">
          <div class="col-sm-8 col-xs-8 heading-avatar">
            <div class="heading-avatar-icon">
			
			<?php
			if (empty($fototw)){
				
			?>	
			<img src="imagenesperfil/user.svg">
                <strong style="padding: 0px 0px 0px 20px;">
                <?php echo $NombreUsarioSesion; ?>
            </strong>
			<?php
			}else{
			?>
			<img src="<?php echo '../'.$fototw; ?>">
                <strong style="padding: 0px 0px 0px 20px;">
                <?php echo $NombreUsarioSesion; ?>
            </strong>
			<?php
			}
			?>
			
              
            </div>
          </div>

         
		 
          <div class="col-sm-1 col-xs-1  pull-right icohome">
		  
            <a href="home.php">
                <i class="zmdi"><img src="assets/img/actualizar.svg" width="20px"></i>
            </a>
          </div>
        </div>




        <!--BUSCADOR-->
        <div class="row searchBox">
          <div class="col-sm-12 searchBox-inner">
            <div class="form-group has-feedback">
              <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Buscar">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div>
        </div>


<!--Contactos-->
<div class="row sideBar">
      <?php
          while ($FilaUsers = mysqli_fetch_array($resultadoQuery)) {
          $id_persona  = $FilaUsers['idusuario'];
		  $fotofor     = $FilaUsers['foto'];
		  
		  $reftok     = $FilaUsers['token'];
		  
		  
			$nombreespaci=mysqli_query($con,"select * from `espacios` where tokenc='$reftok' ");
			$nombes = mysqli_fetch_assoc($nombreespaci);
	

			$nombespaci=$nombes['nombespac'];
			
			
			
			
			
		  
		  
          $resultado = ("SELECT * FROM msjs WHERE user_id='$id_persona' AND  to_id='$idConectado' AND leido='NO' ");
          $re  = mysqli_query($con, $resultado);
          $numero_filas = mysqli_num_rows($re);

          //Buscando los msjs que estan sin leer por dicho usuario en sesion.
            $no_leidos = '';
            if($numero_filas > 0){
                $res = ("SELECT * FROM msjs WHERE user_id='$id_persona' AND leido='NO' ");
                $ree  = mysqli_query($con, $res);
                if($cantMsjs = mysqli_num_rows($ree) > 0){ ?>
                    <div style="display:none;">
                        <audio controls autoplay>
                            <source src="effect.mp3" type="audio/mp3">
                        </audio>
                    </div>
                <?php
                }
            }
            $no_leidos = $numero_filas;
          ?>

          <div class="row sideBar-body" id="<?php echo $FilaUsers['idusuario']; ?>">
            <div class="col-sm-3 col-xs-3 sideBar-avatar">
              <?php
              if ($FilaUsers['linea'] !='dos') { ?>
                <div class="avatar-icon">
			
			<?php
			if (empty($fotofor)){
				
			?>
            <img src="imagenesperfil/user.svg" class="notification-container" style="border:3px solid #2af47b !important;">
			
			
			<?php
			}else{
			?>
			<img src="<?php echo '../'.$FilaUsers['foto']; ?>" class="notification-container" style="border:3px solid #2af47b !important;">
			<?php
			}
			?>
				
                  
                </div>
                <?php }else{ ?>
                  <div class="avatar-icon">
				  
		    <?php
			if (empty($fotofor)){
				
			?>
            <img src="imagenesperfil/user.svg" class="notification-container" style="border:3px solid #696969 !important;">
			
			
			<?php
			}else{
			?>
			<img src="<?php echo '../'.$FilaUsers['foto']; ?>" class="notification-container" style="border:3px solid #696969 !important;">
			<?php
			}
			?>  
                    
                  </div>
                <?php } ?>
            </div>

            <div class="col-sm-9 col-xs-9 sideBar-main">
              <div class="row">
                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">
                   <?php
                    echo $FilaUsers['nombre_comple']." ".$FilaUsers['apellidos'];
                    ?>
					<br> 
					
					 (<b style="font-size:12px;"><?php echo $nombespaci; ?></b>)
					
                  </span>
                </div>
                <div class="col-sm-4 col-xs-4 pull-right sideBar-time" style="color:#93918f;">
				<?php
				if ($no_leidos > 0){
				?>
				<span class="notification-counter">
                      <?php echo $no_leidos; ?>
                </span>
				<?php
				}else{
				?>
				
				<?php
				}
				?>
                   
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>


<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(function() {
  $(".sideBar-body").on("click", function () {

  /**marcar el usuario selecciona**/
  $(".sideBar-body").removeClass("seleccionado");
  $(this).addClass("seleccionado");

  var id                  = $(this).attr('id');
  var idConectado         = "<?php echo $idConectado; ?>";
  var email_user          = "<?php echo $email_user; ?>";
  var dataString = 'id=' + id + '&idConectado=' + idConectado + '&email_user=' + email_user;

  var ruta = "UserSeleccionado.php";
  $('#capausermsj').html('<img src="assets/img/cargandotw.gif" class="ImgCargando"/>');
    $.ajax({
        url: ruta,
        type: "POST",
        data: dataString,
        success: function(data){
            $("#capausermsj").html(data);
            $("#conversation").animate({ scrollTop: $(document).height() }, 1000);
        }
    });
    return false;
  });
});


$(function(){
  $(".heading-compose").click(function() {
    $(".side-two").css({
      "left": "0"
    });
  });

  $(".newMessage-back").click(function() {
    $(".side-two").css({
      "left": "-100%"
    });
  });
});
</script>

<?php } ?>
