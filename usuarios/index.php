<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	    <!-- full d'estils per a fer servir fonts d'icons -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <style>
	    	a {color: blue;}
	    </style>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'BD_exemple');

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT producto.*, tipo.* FROM producto, tipo WHERE producto.tip_id=tipo.tip_id ORDER BY pro_preu ASC";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			?>
			<table border>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Tipo producto</th>
					<th>Operaciones</th>
				</tr>

				<?php

				//recorremos los resultados y los mostramos por pantalla
				//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
				while ($prod = mysqli_fetch_array($datos)){
					echo "<td>";

					echo "<a href='ver.php?id=$prod[pro_id]'>$prod[pro_nom]</a>";
					echo "</td><td>" . substr($prod['pro_descripcio'], 0, 25) . "</td><td>$prod[pro_preu]€</td><td>$prod[tip_nombre]</td><td>";
					
					//enlace a la página que modifica el producto pasándole la id (clave primaria)
					if($prod['pro_actiu']==1){
						echo "<a href='modificar.php?id=$prod[pro_id]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					}

					//enlace a la página que elimina el producto pasándole la id (clave primaria)
					if($prod['pro_actiu']==1){
						echo "<a href='eliminar.php?id=$prod[pro_id]'><i class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar'></i></a>";
					}

					//enlace a la página que modifica el producto (poniendo el campo pro_actiu a 0 o a 1, lo activa o lo desactiva) pasándole la id (clave primaria)
					if($prod['pro_actiu']==1){
						echo "<a href='activar_desactivar.proc.php?id=$prod[pro_id]'><i class='fa fa-eye-slash fa-2x fa-pull-left fa-border' title='desactivar'></i></a>";
					} else {
						echo "<a href='activar_desactivar.proc.php?id=$prod[pro_id]'><i class='fa fa-eye fa-2x fa-pull-left fa-border' title='activar'></i></a>";
					}

					echo "</td></tr>";
				}

				?>

			</table>

			<a href="insertar.php"><i class='fa fa-plus-square fa-2x fa-pull-left fa-border'></i></a>

				<?php
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
	</body>
</html>