
<?php 
	 require '../PHP/Conexion.php';
	 session_start();
	 $conn=Conexion();

 ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Administracion de Pedidos</h2>
		<table class="table table-hover table-condensed table-bordered">

			<tr>
				<td>ID de pedido</td>
				<td>Envio (1=si 2=no)</td>
				<td>ID facturas</td>
				<td>ID sucursal</td>
				<td>Nombre cliente</td>
				<td>Total</td>
				<td>Eliminar</td>
			</tr>
			<?php 
						if ($_SESSION['rol'] == 2) {
							$sql="SELECT * FROM VW_PEDIDOS";
						} else {
							$iduser = $_SESSION['id'];
							$sql="SELECT * FROM VW_PEDIDOS where TBU_ID = $iduser";
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
				<td><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNoPedidos('<?php echo $ver[2] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>
