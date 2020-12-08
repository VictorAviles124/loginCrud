<?php 
	require_once "../clases/Usuarios.php";
	$Usuarios = new Usuarios();

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$respuesta = $Usuarios->agregarUsuario($usuario, $password);

	if ($respuesta) {
?>
	<script>
		alert("Registro exitoso!");
		window.location.href = '../registro.php';
	</script>	

<?php
		  		
	} else {
?>
		<script>
			alert("Fallo!");
			window.location.href ='../registro.php';
		</script>	
<?php 
		
	}

 ?>