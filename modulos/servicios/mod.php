<?php
$aviso=mysqli_query($conn,"select * from `msjs` WHERE to_id='$idusuario' AND leido='NO'");
while($avisonew = mysqli_fetch_array($aviso)){
	
			$campananew = $avisonew['leido'];

}
?>

<a href="#notifica" style="float:right;text-decoration:none;">
<?php
if ($campananew=='NO'){
	
$danios=mysqli_query($conn,"SELECT id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,COUNT(*) as conteo FROM msjs where to_id='$idusuario' AND leido='NO'");
			
	while($rep = mysqli_fetch_array($danios)){		
		
	$conteo=$rep['conteo'];
		
	}
?>
<img src="imagenes/son.gif" width="40px">

<div class="reborde"><b><?php echo $conteo; ?></b></div>

<?php
if($conteo > 0){ ?>
                    <div style="display:none;">
                        <audio controls autoplay>
                            <source src="effect.mp3" type="audio/mp3">
                        </audio>
                    </div>
                <?php
                }
?>				
<?php
}else{
	
	
?>
<img src="imagenes/campana.svg" width="25px">
<?php
}
?>
</a>





<?php									
if($moduno=='SI')
{ 
?>
<div style="padding:10px;display:inline-block;">
<a class="botonhr" href="espacios.php"><img class="bajartw" src="imagenes/canales.svg" width="50%"><span class="bajar">Canales</span></a> 
</div>
<?php
}else{
}
?>


<?php									
if($moddos=='SI')
{
?>
<div style="padding:10px;display:inline-block;">	
<a class="botonhr" href="parameters.php"><img class="bajartw" src="imagenes/para.svg" width="50%"><span class="bajar">Parámetros</span></a>	
</div>
<?php
}else{
?>
<br>
<?php	
}
?>




<br>



