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

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM tbl_usuario WHERE usu_nom = '$_REQUEST[usu_nom]'"; 

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
				<form name="formulario1" action="modificar.proc.php" method="get">
				
				Nombre:<br/>
				<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['usu_nom'];?>"><br/>
				Correo:<br/>
				<input type="text" name="corr" size="20" maxlength="25" value="<?php echo $prod['usu_email'];?>"><br/>
				Contraseña:<br/>
				<input type="password" name="pass" size="20" maxlength="25" value="<?php echo $prod['usu_contra'];?>"><br/>
				Privilegios:<br/>
				<select name="tip">
				<?php
				if ($prod['usu_rang']==0) {
					echo "<option name='rang' value='0'>Administrador</option>";
					echo "<option name='rang' value='1'>Usuario</option>";
				}else{
					echo "<option name='rang' value='1'>Usuario</option>";
					echo "<option name='rang' value='0'>Administrador</option>";
				}

				?>
				
				

						
				</select><br/><br/>
				<input type="submit" value="Guardar">
				</form>
				<?php
			} else {
				echo "Usuario: $_REQUEST[usu_nom] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="usuarios.php">Volver</a>
	</body>
</html>