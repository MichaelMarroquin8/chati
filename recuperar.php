<?php
session_start();

if (isset($_SESSION['privilegio_nombre'])) {

	header("Location: modulos/modulos.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Iniciar Sesión | Chati</title>
		<link rel="shortcut icon" href="iniciosesion/imagenes/favicon.png">
		<link rel="stylesheet" type="text/css" href="iniciosesion/css/estiloa.css" />
		<link rel="stylesheet" type="text/css" href="iniciosesion/css/fondo.css" />

		<link rel="stylesheet" type="text/css" href="iniciosesion/css/barradd.css" />
		<link rel="stylesheet" type="text/css" href="iniciosesion/css/componentes.css" />
		<link rel="stylesheet" type="text/css" href="iniciosesion/css/haldol8.css" />
		<link rel="stylesheet" type="text/css" href="iniciosesion/css/letra.css" />
		<link rel="stylesheet" type="text/css" href="iniciosesion/css/load.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>

		<div id="contenedor_carga">
			<div id="carga"></div>
		</div>

		<div class="codrops-top clearfix">
			<div class="menu2">
				<header class="hl-cabeza cf">
					<nav>

					</nav>
				</header>
			</div>
		</div>


		<div class="menu">
			<div class="botonesinicio">

				<center>
					<form action="iniciosesion/cambiarc.php" method="POST" class="contenido">
						<input type="hidden" id="uno" name="uno" value="uno" />
						<div class="menu">
							<br>

							<div class="botonesinicio">
								<br>
								<div class="kal">

									<img src="iniciosesion/imagenes/kallgris.png" width="200px">

									<h4>
										<font color="#130430">Recuperar contraseña</font>
									</h4>
									<?php
										if (isset($_GET["message"])) {
											switch ($_GET["message"]) {
												case "not_found";
										?>
													<div class="alert alert-warning" role="alert">
														El correo electronico no existe!<br>registrate.
													</div>
												<?php
													break;
											}
										}
										?>

									<input type="email" id="usuario_nom" name="usuario_nom" placeholder="Correo electrónico:" required autocomplete="off" />
									<br>

									<input class="md-trigger" type="submit" value="Enviar" id="btn_inicia" /><br>

									¿No te has registrado? <br><a href="perfil.php"><b>Quiero registrarme</b></a></h4>

								</div>
							</div>



					</form>
				</center>
			</div>



		</div>
		</div>


		<script type="text/javascript">
			window.onload = function() {
				var contenedor = document.getElementById('contenedor_carga');

				contenedor.style.visibility = 'hidden';
				contenedor.style.opacity = '0';

			}
		</script>
	</body>

	</html>
<?php
}
?>