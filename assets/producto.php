<?php 

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <br><br><br>
  <title>Administracion de Productos</title>
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
  <link rel="stylesheet" type="text/css" href="../styles/pp.css">
  <script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/funciones.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>
</head>

<body>


<?php
        include('navbar.php');
    ?>
    <br><br>
           
  <div class="container">
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>

  <!-- Modal para edicion de datos -->

  <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
        </div>
        <div class="modal-body">
          <input type="text" hidden="" id="id" name="id">
          <label>Nombre Producto</label>
          <input type="text" name="nombreP" id="nombreP" class="form-control input-sm">
          <label>Descripcion Producto</label>
          <input type="text" name="descriP" id="descriP" class="form-control input-sm">
          <label>Precio Producto</label>
          <input type="text" name="precioP" id="precioP" class="form-control input-sm">
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="actualizaProducto" data-dismiss="modal">Actualizar</button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal para AGREGAR  datos -->
  <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
        </div>
        <div class="modal-body">
                                  
          <label>Nombre</label>
          <input type="text" name="nombrea" id="nombrea" class="form-control input-sm">  

          <label>Descripcion</label>
          <input type="text" name="descriPa" id="descriPa" class="form-control input-sm">

          <label>Precio</label>
          <input type="float" name="precioPa" id="precioPa" class="form-control input-sm">

          <label>Tipo Producto</label>
          <select class="form-control input-smt" name="tppr" id="tppr">
          <option selected="">Seleccione un TIPO PRODUCTO</option>
          <?phP
            $sql = 'SELECT PKG_PRODUCTO.TIPO_PRODUCTO FROM DUAL';
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);
            while (oci_fetch($stid)) {
                echo oci_result($stid, 'TIPO_PRODUCTO');
            }
          ?>
        </select>

        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="agregar" data-dismiss="modal">Agregar</button>

        </div>
      </div>
    </div>
  </div>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').load('../componentes/tablaProductos.php');

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#agregar').click(function(){
  
          nombrea=$('#nombrea').val();
          descriPa=$('#descriPa').val();
          precioPa=$('#precioPa').val();
          
          tppr=$('#tppr').val();
            agregardatosP(nombrea, descriPa,precioPa,tppr);
        });

    $('#actualizaProducto').click(function() {
      actualizaProducto();
    });

  });
  
</script>
