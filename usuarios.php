<?php
session_start();
	if(isset($_SESSION['nombre']))$login=1;
	if(isset($_POST['reservar']))$login=1;
	if(isset($_POST['retornar']))$login=1;
	if(isset($_POST['manteniment']))$login=1;
	if(isset($login)){
		if(isset($_POST['manteniment'])){
			if(isset($_POST['manteniment']))$manteniment = $_POST['manteniment'];
			$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
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
					$con = mysqli_connect('localhost', 'root', '', 'bd_reservas');
					$sql = "SELECT * FROM tbl_usuario";
					$datos = mysqli_query($con, $sql);
					?>
					<table border>
					<tr>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Opciones</th>
					</tr>

					<?php

					while ($prod = mysqli_fetch_array($datos)){
					echo "<td>$prod[usu_nom]</td>";
					echo "<td>$prod[usu_email]</td>";
					}
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