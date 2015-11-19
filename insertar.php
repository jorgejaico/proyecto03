<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');

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
		<a href="usuarios.php">Volver</a>
	</body>
</html>