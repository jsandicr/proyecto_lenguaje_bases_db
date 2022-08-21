<?php 

	require 'Conexion.php';
	$conn=Conexion();

	$id = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$ap1 = $_POST['apellido1'];
	$ap2 = $_POST['apellido2'];
	$direccion = $_POST['direccion'];
	$tel = $_POST['telefono'];
	$rol = $_POST['rol'];
	$contra = $_POST['contra'];

	$sql="begin PKG_USUARIO.INSERTAR_USUARIO($id, '$nombre', '$ap1', '$ap2', '$direccion', $tel, $rol, '$contra'); end;";
	$result = oci_parse($conn, $sql);
	echo oci_execute($result);


 ?>