<?php 
	require 'Conexion.php';
	$conn=Conexion();
	
	$id=$_POST['id'];
	$n=$_POST['nomb'];
	$a1=$_POST['ape1'];
	$a2=$_POST['ape2'];
	$d=$_POST['dire'];
	$t=$_POST['tel'];

	$sql="begin PKG_USUARIO.MODIFICAR_USUARIO($id,'$n', '$a1', '$a2', '$d',$t); end;";
	$result= oci_parse($conn,$sql);
	echo oci_execute($result);

 ?>