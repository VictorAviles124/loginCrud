<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">

	<?php 
		require_once "dependencias.php"; 
		session_start();
		if (isset($_SESSION['usuario'])) {
			header("location:vistas/inicio.php");
		}
	?>
</head>
<body>
	<div align = "center" class="container"  class="h-100 bg-primary">
		<h1>Login de usuario</h1>
		<img src="img/user.png" widht="100px" height= "100px" alt=""  >
		<div  class="style">
			<div  class="col-sm-6" >
				<form  align = "center" action="procesos/login.php" method="post">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					<br>
					<button class="btn btn-primary">Entrar</button>
					<a href="registro.php">Registrar</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>