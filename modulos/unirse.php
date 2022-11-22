<div id="unirt" class="notifica">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="imagenes/kallgris.png" width="100px" />

<div class="sc">

<p style="color:#111217;text-align:left;"><b>Mensaje</b></p>



<form action="add/add_unirse.php" method="POST">

<input type="hidden" id="idusur" name="idusur" class="camp" style="width:200px;" value="<?php echo $idusuario?>" readonly="readonly">	

<br>
<table>	
<tr>
<td>
Nombre de la empresa:
</td>	
<td>
<input type="text" id="nomb_cus" name="nomb_cus" class="camp" style="width:200px;" autocomplete="off" required >
</td>
</tr>
<tr>
<td>
Mensaje para la empresa:
</td>	
<td>
<textarea name="mensaje" class="camp" style="width:200px;height:150px;" required ></textarea>
</td>
</tr>	
</table>

<br>
<center>
<input class="md-trigger" type="submit" value="Enviar" id="btn_inicia"/>
</center>	
</form>				  



							
</div>


	</div>
</div>
