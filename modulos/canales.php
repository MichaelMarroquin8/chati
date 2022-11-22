

<div id="canales" class="cambiarSitio">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />
<br><br>
<h6 style="font-size:12px;">Contamos con los siguientes canales de servicio.<br>
Selecciona uno de nuestros canales para ser atendido.</h6>
<br>
<?php
   $tip = "SELECT * FROM espacios WHERE estado='disponible' AND sitiore='$sitionew' AND idcliente='$idclientefor'";
   $cambioc=mysqli_query($conn,$tip);
?>

	
	
	
    <?php
    
    while ($rowt = mysqli_fetch_assoc($cambioc))
    {
    ?>	

<a href="canal/index.php" target="_blank" class="estees">
<?=$rowt['nombespac']?>
</a>		
<br><br>		
		
	<?php
    }
    ?>


	</div>
</div>