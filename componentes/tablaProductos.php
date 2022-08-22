
<?php 
	 require '../PHP/Conexion.php';
	 session_start();
	 $conn=Conexion();

 ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Administracion de productos</h2>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<tr>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Tipo</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT * FROM VW_PRODUCTOS where TBU_ID='$idp'";
					}else{
						$sql="SELECT * FROM VW_PRODUCTOS";
					}
				}else{
					$sql="SELECT * FROM VW_PRODUCTOS";
				}

				$stid = oci_parse($conn,$sql);
				oci_execute($stid);

				while(($ver = oci_fetch_row($stid)) != false){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo "$". $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformP('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNoP('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>
