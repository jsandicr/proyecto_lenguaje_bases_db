
<?php 
	require 'Conexion.php';
	$conn=Conexion();
	$id=$_POST['id'];

	$sql="begin PKG_USUARIO.ELIMINAR_USUARIO($id); end;";
	$result= oci_parse($conn,$sql);
	echo oci_execute($result);
 ?>