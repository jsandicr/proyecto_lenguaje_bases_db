<?php 

	require 'Conexion.php';
	$conn=Conexion();

	$idPr=$_POST['id'];
	$nombrePr=$_POST['nombrea'];
	$descriPr=$_POST['descriPa'];
	$precioPr=$_POST['precioPa'];
	$tipoPr = $_POST['tppr'];
	$sql="begin PKG_PRODUCTO.INSERTAR_PRODUCTO( '$nombrePr', '$descriPr', $precioPr, $tipoPr); end;";
	$result = oci_parse($conn, $sql);
	echo oci_execute($result);


 ?>

 