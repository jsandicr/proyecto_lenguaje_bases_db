<?php
session_start();

unset($_SESSION['consulta']);

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Administracion de Usuarios</title>
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
  <link rel="stylesheet" type="text/css" href="../styles/pp.css">
  <script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>
</head>
<body>
  <?php
    include('navbar.php');
  ?>
           
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
          <input type="text" hidden="" id="" name="">
          <label>Nombre</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Apellido 1</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Apellido 2</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Telefono</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Correo</label>
          <input type="text" name="" id="" class="form-control input-sm">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
        </div>
        <div class="modal-body">
          <input type="text" hidden="" id="" name="">
          <label>Nombre</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Apellido 1</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Apellido 2</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Telefono</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Direccion</label>
          <input type="text" name="" id="" class="form-control input-sm">
          <label>Rol</label>
          <input type="text" name="" id="" class="form-control input-sm">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').load('componentes/tablaUsuarios.php');
    $('#buscador').load('componentes/buscadorUsuarios.php');
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {   
    $('#actualizadatos').click(function() {
      actualizaDatos();
    });
  });
</script>