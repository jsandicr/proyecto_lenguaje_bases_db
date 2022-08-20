<?php 
		 require '../PHP/Conexion.php';
		 $conn=Conexion();

	$sql="SELECT * FROM VW_USUARIOS";
	$result= oci_parse($conn,$sql);
	oci_execute($result);
				

 ?>
<br><br>
<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
				while($ver=oci_fetch_row($result)): 
			 ?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo $ver[1] ?>
				</option>

			<?php endwhile; 
			oci_close($conn);?>
		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						$('#tabla').load('componentes/tablaUsuario.php');
					}
				});
			});
		});
	</script>