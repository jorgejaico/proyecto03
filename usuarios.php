<?php
session_start();
	if(isset($_SESSION['nombre']))$login=1;
	if(isset($_POST['reservar']))$login=1;
	if(isset($_POST['retornar']))$login=1;
	if(isset($_POST['manteniment']))$login=1;
	if(isset($login)){
		if(isset($_POST['manteniment'])){
			if(isset($_POST['manteniment']))$manteniment = $_POST['manteniment'];
			$con = mysqli_connect('mysql.2freehosting.com', 'u609120829_user', 'qweQWE123', 'u609120829_bd');
			//echo $manteniment;
			$sql1=("SELECT * FROM `tbl_recursos` WHERE rec_id = $manteniment");
			//echo $sql1;
			$datos = mysqli_query($con, $sql1);
			if(mysqli_num_rows($datos) > 0){
				while($cerca = mysqli_fetch_array($datos)){
					$validar = $cerca['rec_desactivat'];
					if ($validar == 1) {
						$sql=("UPDATE tbl_recursos SET rec_desactivat = 0 WHERE rec_id = $manteniment ");
						$estat = "averiat";
					}else{
						$sql=("UPDATE tbl_recursos SET rec_desactivat = 1 WHERE rec_id = $manteniment ");
						$estat = "Ja en funcionament";
					}
				}
			}
			mysqli_query($con, $sql);	
			mysqli_close($con);
		}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administracio</title>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="css/stylesBar.css">
        <link rel="stylesheet" type="text/css" href="css/reservas.css" />
	    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	    <script src="js/scriptBar.js"></script>
		<link rel="icon" type="image/x-icon" href="images/favicon" />
	</head>
    <body>
		<div class="header">
			<div id='cssmenu'>
				<ul>
					<li class='active'><a href='reservas.php'>RESERVAS</a></li>
					<li><a href='incidencia.php'>INCIDENCIAS</a></li>
					<?php
					$rang=$_SESSION['rang'];
					if($rang==0){
						echo "<li><a href='administrar.php'>ADMINISTRAR</a></li>";
					}

					if($rang==0){
						echo "<li><a href='usuarios.php'>USUARIOS</a></li>";
					}
					?>
					<li class='wel'><?php echo "<br/>&nbsp;&nbsp; Bienvenido $_SESSION[nombre] ";
					?></li>
					<li class='cerrar'><a href="index.php">Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>
		<?php
			if(isset($estat))echo $estat;
			
		?>
        <div class="fondo">
		
			<div class="centro">
				<h1>USUARIOS</h1>
				<?php
					$con = mysqli_connect('mysql.2freehosting.com', 'u609120829_user', 'qweQWE123', 'u609120829_bd');
					$sql = "SELECT * FROM tbl_usuario";
					$datos = mysqli_query($con, $sql);
					?>
					<table border align="center">
					<tr>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Permisos</th>
						<th>Estado</th>
						<th>Opciones</th>
					</tr>



					<?php

					while ($prod = mysqli_fetch_array($datos)){
						echo "<tr><td>$prod[usu_nom]</td>";
						echo "<td>$prod[usu_email]</td>";
						if($prod['usu_rang']==0){
							echo"<td>Administrador</td>";
						}else{
							echo "<td>Usuario</td>";
						}

						if($prod['activo']==1){
							echo"<td>Habilitado</td>";
						}else{
							echo "<td>Deshabilitado</td>";
						}
						
						if($prod['activo']==1){
							echo "<td>";
							echo "<a href='modificar.php?usu_nom=$prod[usu_nom]'><img width='30%' src='images/mod.png'></a>";
							echo "&nbsp&nbsp&nbsp";
							echo "<a href='dehabilitarActivar.php?usu_nom=$prod[usu_nom]'><img width='30%' src='images/cross.png'></a>";
							echo "</td>";
						}else{
							echo "<td>";
							echo "<a href='dehabilitarActivar.php?usu_nom=$prod[usu_nom]'><img width='30%' src='images/tic.png'></a>";
							echo "</td>";

						}

					echo "</tr>";
					}
						//enlace a la página que modifica el producto pasándole la id (clave primaria)
					


					?>
					</table><br><br>
					
					<a href="insertar.php"><img src="images/add.png"></a>


					<?php
					mysqli_close($con);
				?>
			</div>
			
			
		</div>

    </body>
</html>
<?php
}else{
	$_SESSION['validarse'] = 'error';
	
	header("Location: index.php");
	die();
}

?>