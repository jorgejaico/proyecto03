<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'BD_exemple');

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM producto WHERE pro_id=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
				<form name="formulario1" action="modificar.proc.php" method="get">
				<input type="hidden" name="id" value="<?php echo $prod['pro_id']; ?>">
				Nombre:<br/>
				<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['pro_nom']; ?>"><br/>
				Descripción:<br/>
				<textarea name="des" cols="20" rows="5"><?php echo $prod['pro_descripcio']; ?></textarea><br/>
				Precio:<br/>
				<input type="text" name="pre" size="5" maxlength="8" value="<?php echo $prod['pro_preu']; ?>"><br/>
				Tipo:<br/>
				<select name="tip">
				<?php
					//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
					$sql = "SELECT * FROM tipo ORDER BY tip_nombre";
					//lanzamos la sentencia sql que devuelve todos los tipos de producto
					$tipos = mysqli_query($con, $sql);

					while ($tipo=mysqli_fetch_array($tipos)){
						echo "<option value='$tipo[tip_id]'";

						if($tipo['tip_id']==$prod['tip_id']){
							echo " selected";
						}

						echo ">$tipo[tip_nombre]</option>";
					}

				?>
				</select><br/><br/>
				<input type="submit" value="Guardar">
				</form>
				<?php
			} else {
				echo "Producto con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="index.php">Volver</a>
	</body>
</html>