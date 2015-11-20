
<html>
	<head>
		<meta charset="UTF-8">
		<title>MODIFICAR</title>
		<link rel="stylesheet" href="css/styleincidencias.css">
	    <link rel="stylesheet" href="css/stylesBar.css">
	    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	    <script src="js/scriptBar.js"></script>	
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon" />
	</head>
	<body><br/>
<a href="usuarios.php">	<input type="button" class="btn" value="VOLVER"/></a>

			<?php
				$con = mysqli_connect('mysql.2freehosting.com', 'u609120829_user', 'qweQWE123', 'u609120829_bd');
				$sql = "SELECT * FROM tbl_usuario WHERE usu_nom = '$_REQUEST[usu_nom]'"; 
				$datos = mysqli_query($con, $sql);

				if(mysqli_num_rows($datos)>0){
					$prod=mysqli_fetch_array($datos);
				}

			?>
		
		<form action="incidencia.php" method="POST">
			<div class="container">
				<div class="profile">
			


					<div class="profile__form">
						<div class="field">
						Modificar Usuario
						</div>
						
						<form name="formulario1" action="modificar.proc.php" method="get">
						Nombre:<br/>
						<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['usu_nom'];?>"><br/>
						Correo:<br/>
						<input type="text" name="corr" size="20" maxlength="25" value="<?php echo $prod['usu_email'];?>"><br/>
						Contraseña:<br/>
						<input type="password" name="pass" size="20" maxlength="25" value="<?php echo $prod['usu_contra'];?>"><br/>
						Privilegios:<br/>
						<select name="tip"> <br /><br />
				
					<?php
					if ($prod['usu_rang']==0) {
					echo "<option name='rang' value='0'>Administrador</option>";
					echo "<option name='rang' value='1'>Usuario</option>";
						}else{
					echo "<option name='rang' value='1'>Usuario</option>";
					echo "<option name='rang' value='0'>Administrador</option><br />";
					}

					?>

					
					
					
									
							
					
							
						</div>

					</div>

				</div>
				
			</div>

		</form>

	</body>
</html>