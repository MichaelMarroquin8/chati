<div id="unirt" class="notifica">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<center>
<img src="../imagenes/kallgris.png" width="100px" />

<div class="sc">
<br>

<p style="color:#111217;text-align:center;font-size:18px;"><b>Califica tu experiencia</b></p>



<form action="../add/add_cali.php" method="POST">

<input type="hidden" id="idcliente" name="idcliente" class="camp" style="width:200px;" value="<?php echo $IdUser?>" readonly="readonly">	

<input type="hidden" id="idusur" name="idusur" class="camp" style="width:200px;" value="<?php echo $idConectado?>" readonly="readonly">	

<table style="font-size:18px;">
<tr>
<td style="width:30px;">1</td>
<td style="width:30px;">2</td>
<td style="width:30px;">3</td>
<td style="width:30px;">4</td>
<td style="width:30px;">5</td>
</tr>	
<tr>	
<td>
<input type="radio" id="puntaje" name="puntaje" style="width:20px;height:20px;" value="1" autocomplete="off" required >
</td>
<td>
<input type="radio" id="puntaje" name="puntaje" style="width:20px;height:20px;" value="2" autocomplete="off" required >
</td>
<td>
<input type="radio" id="puntaje" name="puntaje" style="width:20px;height:20px;" value="3" autocomplete="off" required >
</td>
<td>
<input type="radio" id="puntaje" name="puntaje" style="width:20px;height:20px;" value="4" autocomplete="off" required >
</td>
<td>
<input type="radio" id="puntaje" name="puntaje" style="width:20px;height:20px;" value="5" autocomplete="off" required >
</td>
</tr>	
</table>

<br>
<center>
<input class="csone" type="submit" value="Enviar" id="btn_inicia"/>
</center>	
</form>				  



							
</div>


	</div>
</div>
