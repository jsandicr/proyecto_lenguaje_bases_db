
<?php 
	require 'Conexion.php';
	$conn=Conexion();
	$id=$_POST['id'];

	$sql="begin PKG_PEDIDOS.ELIMINAR_PEDIDO($id); end;";
	$result= oci_parse($conn,$sql);
	echo oci_execute($result);
 ?>