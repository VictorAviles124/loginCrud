<?php 


		require_once "../clases2/conexion.php";
	require_once "../clases2/crud.php";
	$obj= new crud();
	$datos=array(


		$_POST['gasto'],
		$_POST['cantidad'],
		$_POST['fecha']
				);

	echo $obj->agregar($datos);
	

 ?>