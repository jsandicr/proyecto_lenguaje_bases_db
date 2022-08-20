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
          <label>Nombre</label>
          <input type="text" name="nomb" id="nomb" class="form-control input-sm">
          <label>Apellido 1</label>
          <input type="text" name="ape1" id="ape1" class="form-control input-sm">
          <label>Apellido 2</label>
          <input type="text" name="ape2" id="ape2" class="form-control input-sm">
          <label>Dirrecion</label>
          <input type="text" name="dire" id="dire" class="form-control input-sm">
          <label>Telefono</label>
          <input type="text" name="tel" id="tel" class="form-control input-sm">
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
          <label>Cedula</label>
          <input type="text" hidden="" id="cedula" name="cedula" class="form-control input-sm">

          <label>Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control input-sm">

          <label>Apellido 1</label>
          <input type="text" name="apellido1" id="apellido1" class="form-control input-sm">

          <label>Apellido 2</label>
          <input type="text" name="apellido2" id="apellido2" class="form-control input-sm">

          <label>Telefono</label>
          <input type="text" name="telefono" id="telefono" class="form-control input-sm">

          <label>Direccion</label>
          <input type="text" name="direc" id="direc" class="form-control input-sm">

          <label>Contraseña</label>
          <input type="password" name="contra" id="contra" class="form-control input-sm">

          <label>Rol</label>
          <input type="text" name="rol" id="rol" class="form-control input-sm">
        </div>
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
    $('#tabla').load('../componentes/tablaUsuarios.php');
    $('#buscador').load('../componentes/buscadorUsuarios.php');
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#agregar').click(function(){
          cedula=$('#cedula').val();
          nombre=$('#nombre').val();
          apellido1=$('#apellido1').val();
          apellido2=$('#apellido2').val();
          telefono=$('#telefono').val();
          direc=$('direc').val();
          contra=$('#contra').val();
          rol=$('#rol').val();
            agregardatos(cedula,nombre,apellido1,apellido2,direc,telefono,contra,rol);
        });

    $('#actualizadatos').click(function() {
      actualizaDatos();
    });

  });
  
</script>
