

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Administracion de Pedidos</title>
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
         <br><br><br>  
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
          <h4 class="modal-title" id="myModalLabel">Actualizar pedidos</h4>
        </div>
        <div class="modal-body">
        <input type="text" hidden="" id="idpe" name="idpe">
          <label>Envio (1=si 2=no)</label>
          <input type="text" name="envio" id="envio" class="form-control input-sm">
          <input type="text" hidden="" id="idfac" name="idfac">
          <label>Sucursal (1=Tres Rios 2=Guatuso)</label>
          <input type="text" name="sucursal" id="sucursal" class="form-control input-sm">
          <label>Total</label>
          <input type="text" name="total" id="total" class="form-control input-sm">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="actualizapedidos" data-dismiss="modal">Actualizar</button>

        </div>
      </div>
    </div>
  </div>



</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').load('../componentes/tablaPedidos.php');
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#actualizapedidos').click(function() {
      actualizapedidos();
    });

  });
  
</script>
