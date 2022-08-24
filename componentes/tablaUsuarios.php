
<?php 
	 require '../PHP/Conexion.php';
	 session_start();
	 $conn=Conexion();

 ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Administracion de Usuarios</h2>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<tr>
				<td>Nombre</td>
				<td>Apellido 1</td>
				<td>Apellido 2</td>
				<td>Dirrecion</td>
				<td>Telefono</td>
				<td>Rol</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT * FROM VW_USUARIOS where TBU_ID='$idp'";
					}else{
						$sql="SELECT * FROM VW_USUARIOS";
					}
				}else{
					$sql="SELECT * FROM VW_USUARIOS";
				}

				$stid = oci_parse($conn,$sql);
				oci_execute($stid);

				while(($ver = oci_fetch_row($stid)) != false){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>
