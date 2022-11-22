<div id="cambiarSitio" class="cambiarSitio">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />


<form action="../iniciosesion/cambioc.php" method="POST">

<input type="hidden" id="usuario_nom" name="usuario_nom" class="camp" style="width:200px;" value="<?php echo $usuario_nom?>" readonly="readonly">	
<input type="hidden" id="pasusuario" name="pasusuario" class="camp" style="width:200px;" value="<?php echo $pasusuario?>" readonly="readonly">

<br>
<?php
   $tip = "SELECT * FROM sitios WHERE estatus='disponible' AND udetalle='$idusuario'";
   $cambioc=mysqli_query($conn,$tip);
?>

<table>	
<tr>	
<td><select name="privilegio_sitio" style="width:200px;" class="camp" required >
	<option></option>
    <?php
    
    while ($rowt = mysqli_fetch_assoc($cambioc))
    {
    ?>	
		<option value="<?=$rowt['pais']?>"><?=$rowt['pais']?></option>
	<?php
    }
    ?>	           
	</select></td>
</tr>	
<tr>
<td>
<center>
<input class="md-trigger" type="submit" value="Continuar" id="btn_inicia"/>
</center>
</td>
</tr>
</table>	
</form>




	</div>
</div>
