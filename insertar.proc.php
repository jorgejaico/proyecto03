<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
			$sql = "INSERT INTO tbl_usuario (usu_nom, usu_email, usu_contra, usu_rang) VALUES ('$_REQUEST[nom]', '$_REQUEST[corr]', '$_REQUEST[pass]', '$_REQUEST[rang]')";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: usuarios.php")
		?>
	</body>
</html>