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
			$sql = "UPDATE producto SET pro_nom='$_REQUEST[nom]', pro_descripcio='$_REQUEST[des]', pro_preu=$_REQUEST[pre], tip_id=$_REQUEST[tip] WHERE pro_id=$_REQUEST[id]";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: index.php")
		?>
	</body>
</html>