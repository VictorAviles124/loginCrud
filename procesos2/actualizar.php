<?php 


		require_once "../clases2/conexion.php";
	require_once "../clases2/crud.php";
	$obj= new crud();
	$datos=array(
		
		$_POST['gastoU'],
		$_POST['cantidadU'],
		$_POST['fechaU'],
		$_POST['idgasto']
				);

	echo $obj->actualizar($datos);
	

 ?>