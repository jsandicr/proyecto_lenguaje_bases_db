<?php 
	require 'Conexion.php';
	$conn=Conexion();
	
	$idPr=$_POST['id'];
	$nombrePr=$_POST['nombreP'];
	$descriPr=$_POST['descriP'];
	$precioPr=$_POST['precioP'];



	$sql="begin PKG_PRODUCTO.MODIFICAR_PRODUCTO( $idPr,'$nombrePr', '$descriPr', $precioPr); end;";
	$result= oci_parse($conn,$sql);
	echo oci_execute($result);

 ?>