  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        
        <div class="logo_name"></div>
      </div>
      <i class='bx' id="btn" ><img src="imagenes/3.png" width="100%"></i>
    </div>
	
    <ul class="nav_list">
	  <li>
        <a href="modulos.php">
          <i class='bx bx-home' ></i>
          <span class="links_name">Inicio</span>
        </a>
        <span class="tooltip">Inicio</span>
      </li>
	    <?php									
		if($modtres=='SI')
		{ 
	    ?>
		<li>
        <a href="usuarios.php">
          <i class='bx bx-user' ></i>
          <span class="links_name">Usuarios</span>
        </a>
        <span class="tooltip">Usuarios</span>
         </li>
		<?php
		}else{
		}
		?>
		
		<?php
		if ($perfilem=='Agente' OR $perfilem=='SI'){
	
		}else{
		?>	
	   <li>
        <a href="canalh/home.php" target="_blank">
          <i class='bx bx-chat' ></i>
          <span class="links_name">Historial de Chats</span>
        </a>
        <span class="tooltip">Historial de Chats</span>
      </li>
		<?php	
		}
		?>
      
      <!--<li>
        <a href="#">
          <i class='bx bx-folder' ></i>
          <span class="links_name">Cuentas</span>
        </a>
        <span class="tooltip">Cuentas</span>
      </li>-->
    </ul>
	




    <div class="profile_content">
      <div class="profile">
        <a href="cerrar.php" align="right"><i class='bx bx-log-out' id="log_out" ></i></a>
      </div>
    </div>
  </div>