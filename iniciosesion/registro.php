<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrarse | Chati</title>
	<link rel="shortcut icon" href="imagenes/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloa.css" />
	<link rel="stylesheet" type="text/css" href="css/fondo.css" />

	<link rel="stylesheet" type="text/css" href="css/barradd.css" />
	<link rel="stylesheet" type="text/css" href="css/componentes.css" />
	<link rel="stylesheet" type="text/css" href="css/haldol8.css" />
	<link rel="stylesheet" type="text/css" href="css/letra.css" />
	<link rel="stylesheet" type="text/css" href="css/load.css" />
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
				<form action="add_res.php" method="POST" class="contenido">

					<input type="hidden" id="linea" name="linea" value="uno" />
					<input type="hidden" id="estado" name="estado" value="nodisponible" />
					<input type="hidden" id="sitio" name="sitio" value="Colombia" />
					<input type="hidden" id="estatus" name="estatus" value="Usuario" />
					<input type="hidden" id="empresa" name="empresa" value="usuario" />
					
					<div class="menu">
						<br>

						<div class="botonesinicio">

							<div class="kaltres">
								<br>
								<img src="imagenes/kallgris.png" width="200px">

								<h4>
									<font color="#130430"><a href="../perfil.php"><img src="imagenes/flecha.svg" width="20px" style="vertical-align: middle;"></a> Crear una cuenta</font>
								</h4>


								<div class="columna">
									<input type="text" id="nombre_comple" name="nombre_comple" style="width:200px;" placeholder="Nombre:" required autocomplete="off" />
									<br>
									<input type="text" id="apellidos" name="apellidos" style="width:200px;" placeholder="Apellidos:" required autocomplete="off" />
									<br>
									<input type="number" id="celular" name="celular" style="width:200px;" placeholder="Teléfono Móvil:" required autocomplete="off" />
									<br>
									<input type="text" id="usuario_nom" name="usuario_nom" style="width:200px;" placeholder="Correo electrónico:" required autocomplete="off" />
									<br>
									<input type="password" id="pasusuario" name="pasusuario" style="width:200px;" required placeholder="Contraseña:">
									<br>
								</div>
								<div class="columna">
									<label><input type="checkbox" id="polit" name="polit" value="SI" required>

										<ul style="width:220px;text-align:left;">
											<li><a href="tyc.php" target="_blank" style="font-size:12px;"><b>Acepto - Términos y Condiciones de Uso.</b></a></li>
											<li><a href="https://sigmamovil.com/politicas-de-tratamiento-de-la-informacion/" target="_blank" style="font-size:12px;"><b>Acepto la Política de Tratamiento de Datos Personales.</b></a></li>
											<li><a href="https://sigmamovil.com/autorizacion-de-tratamiento-de-datos-personales/" target="_blank" style="font-size:12px;"><b>Acepto la Autorización de tratamiento de datos personales.</b></a></li>
										</ul>



									</label>

									<br><br>
									<input class="md-trigger" type="submit" value="Continuar" id="btn_inicia" />
								</div>
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