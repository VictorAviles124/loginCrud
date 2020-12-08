
<?php 

	class Conexion{
		public function conectar(){
			$conexion = mysqli_connect('localhost', 
										'root', 
										'', 
										'login2');
			return $conexion;
		}
	}
 ?>