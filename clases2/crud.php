


<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into t_gastos (gasto,cantidad,fecha)
									values ('$datos[0]','$datos[1]',
											'$datos[2]')";

											

			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idgasto){
			$obj= new conectar();
			$conexion=$obj->conexion();

			   $sql="SELECT id_gasto,
							gasto,
							cantidad,
							fecha
					from t_gastos 
					where id_gasto='$idgasto'";


			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_gasto' => $ver[0],
				'gasto' => $ver[1],
				'cantidad' => $ver[2],
				'fecha' => $ver[3]
				);
			return $datos;
		}

			public function actualizar($datos){
				$obj= new conectar();
				$conexion=$obj->conexion();

				$sql="UPDATE t_gastos set gasto='$datos[0]',
											cantidad='$datos[1]',
											fecha='$datos[2]'
							where id_gasto='$datos[3]'";
				return mysqli_query($conexion,$sql);
			}
			public function eliminar($idgasto){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from t_gastos where id_gasto='$idgasto'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>