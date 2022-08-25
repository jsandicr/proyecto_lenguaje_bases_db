<?php 

	require 'Conexion.php';
	session_start();
	$iduser = $_SESSION['id'];
	$conn=Conexion();


	$envio = $_POST['envio'];
	$sucursal = $_POST['sucursal'];
	$total = $_POST['total'];
	$id = $iduser;

	$sql="begin PKG_PEDIDOS.INSERTAR_PEDIDO($envio,$sucursal, $total, $id); end;";
	$result = oci_parse($conn, $sql);
	echo oci_execute($result);


 ?>