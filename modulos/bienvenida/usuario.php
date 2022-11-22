  <div class="cuadro">
  <div class="otro">



<p class="ali"><img src="imagenes/kallgris.png" width="200px"></p>



<div style="float:left;">
<li id="primero" style="list-style:none;">

<?php									
if(empty($foto)){
?>

<?php
if($enlinea=='uno'){
?>
<a href="perfil.php?idusuario=<?php echo $idusuario?>"><img src='imagenes/user.svg' style="cursor:pointer;" class="fotlinea animate__animated animate__slideInUp"></a>
<?php	
}else{
?>
<a href="perfil.php?idusuario=<?php echo $idusuario?>"><img src='imagenes/user.svg' style="cursor:pointer;" class="fot animate__animated animate__slideInUp"></a>
<?php	
}
?>


<?php
}else{ 
?>
<?php
if($enlinea=='uno'){
?>
<a href="perfil.php?idusuario=<?php echo $idusuario?>"><img src='<?php echo $foto; ?>' style="cursor:pointer;" class="fotlinea animate__animated animate__slideInUp"></a>
<?php	
}else{
?>
<a href="perfil.php?idusuario=<?php echo $idusuario?>"><img src='<?php echo $foto; ?>' style="cursor:pointer;" class="fot animate__animated animate__slideInUp"></a>
<?php	
}
?>

<?php
}
?>

<?php
if ($quien=='Administrador'){
?>

			<div class="primero"> 			
			<table>		
			<tr>
			<td style="font-size:14px;"><b>Sitio actual:</b> <?php echo $sitionew;?></td>
			</tr>
			<tr>
			<td><hr></td>
			</tr>
			<tr>
			<td><a href="#cambiarSitio"><font color="#090420" style="font-size:14px;"><b>Cambiar de Sitio</b></font></a></td>
			</tr>
			</table>
			</div>
<?php	
}
?>			
</li>
</div>

<div class="texto">
<p><font color="" style="font-size:1.5em;">Hola <b><?php echo $nombre;?></b></font><br>
<font color="" style="font-size:0.8em;">Habla con cualquier empresa, sobre cualquier tema, en cualquier momento.</font></p>
</div>

</div>	
  </div> 
  
  
<center>
<hr style="border-color: #f2f2f2;height: 1px; width:92%; border: 0;background-color: #dfdede;">
</center>