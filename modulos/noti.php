<div id="notifica" class="notifica">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />

<div class="sc">

<p style="color:#111217;text-align:left;"><b>Mensajes Recibidos</b></p>

					  

<?php


$resultado = ("SELECT * FROM msjs WHERE to_id='$idusuario' AND leido='NO' ");
          $re  = mysqli_query($conn, $resultado);
          $numero_filas = mysqli_num_rows($re);

//Buscando los msjs que estan sin leer por dicho usuario en sesion.
            $no_leidos = '';
            if($numero_filas > 0){
                $res = ("SELECT * FROM msjs WHERE to_id='$idusuario' AND leido='NO' ");
                $ree  = mysqli_query($conn, $res);
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

			

if ($no_leidos=='NO'){
?>





<div class="kale animate__animated animate__slideInUp">

<a href="canal/home.php" target="_blank"><img src="imagenes/angulo.svg" width="30px" style="float:right;">


<p style="text-align:left;line-height:17px;margin:10px;padding:15px;">
<img src="imagenes/campana.svg" width="15px">
<font color="#111217" style="font-size:0.7em;"><b>No hay mensajes pendientes por leer.</b>

</font>
</p>
</a>
</div>


<?php
}else{
?>


















<div class="row sideBar">
      <?php
	  
$QueryUsers = ("SELECT * FROM usuarios,espacios WHERE usuarios.idusuario!='$idusuario' AND usuarios.idusuario=espacios.idcliente ORDER BY usuarios.emailusuario ASC ");
$resultadoQuery = mysqli_query($con, $QueryUsers);

//foto principal del perfil en chat
$otrotw = ("select * from `usuarios` where idusuario='$idusuario' ");
$resultadoQuerytw = mysqli_query($con, $otrotw);

while ($FilaUserstw = mysqli_fetch_array($resultadoQuerytw)) {
          $fototw     = $FilaUserstw['foto'];
		  
}	


          while ($FilaUsers = mysqli_fetch_array($resultadoQuery)) {
          $id_persona     = $FilaUsers['idusuario'];
		  $fotofor     = $FilaUsers['foto'];

          $resultado = ("SELECT * FROM msjs WHERE user_id='$id_persona' AND  to_id='$idusuario' AND leido='NO' ");
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
            <img src="imagenesperfil/user.svg" width="15px" class="notification-container" style="border:3px solid #2af47b !important;">
			
			
			<?php
			}else{
			?>
			<img src="<?php echo ''.$FilaUsers['foto']; ?>" width="15px" class="notification-container" style="border:3px solid #2af47b !important;">
			<?php
			}
			?>
				
                  
                </div>
                <?php }else{ ?>
                  <div class="avatar-icon">
				  
		    <?php
			if (empty($fotofor)){
				
			?>
            <img src="imagenesperfil/user.svg" width="15px" class="notification-container" style="border:3px solid #696969 !important;">
			
			
			<?php
			}else{
			?>
			<img src="<?php echo ''.$FilaUsers['foto']; ?>" width="15px" class="notification-container" style="border:3px solid #696969 !important;">
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







<div class="kale animate__animated animate__slideInUp">

<a href="canal/home.php" style="text-decoration:none;" target="_blank"><img src="imagenes/angulo.svg" width="30px" style="float:right;">


<p style="text-align:left;line-height:17px;margin:10px;padding:15px;">
<img src="imagenes/campana.svg" width="15px">
<font color="#111217" style="font-size:0.7em;"><b>Hola!</b> tienes un mensaje

clic <a href="canal/home.php" target="_blank"><b style="color:#ff6900;">aquí</b></a> para ver el mensaje.
</font>
</p>
</a>
</div>


<?php
   }
?>	
					  						
</div>


	</div>
</div>
