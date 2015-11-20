<html >
	<head>
		<meta charset="UTF-8">
		<title>Formulario INCIDENCIA</title>
		<link rel="stylesheet" href="css/styleincidencias.css">
	    <link rel="stylesheet" href="css/stylesBar.css">
	    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	    <script src="js/scriptBar.js"></script>	
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon" />
	</head>
	<body>
		
		<form action="usuarios.php" method="POST">
			<div class="container">
				<div class="profile">


					<div class="profile__form">
						<div class="">
							<div class="field">
							Añadir Usuarios<br><br/>
									
									<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('mysql.2freehosting.com', 'u609120829_user', 'qweQWE123', 'u609120829_bd');

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM tbl_usuario";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
		<form action="insertar.proc.php" method="GET">
			Nombre:<br/>
			<input type="text" name="nom" size="20" maxlength="25"><br/>
			Correo:<br/>
			<input type="text" name="corr" size="20" maxlength="25"><br/>
			Contraseña:<br/>
			<input type="password" name="pass" size="20" maxlength="25"><br/>
			Privilegios:<br/>
			<select name="tip">
			<?php
				
			echo"<option name='rang' value=1>Usuario</option>";	
			echo"<option name='rang' value=0>Administrador</option>";
						
			
				

			?>
			</select><br/><br/>
			<input type="submit" value="Enviar">

		</form>
		<br/><br/>
		<a href="usuarios.php">	<input type="button" class="btn" value="VOLVER"/></a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>