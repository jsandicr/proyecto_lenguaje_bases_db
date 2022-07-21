<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Incio de Sesion </title>    
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <title>Citas</title>
            <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="..7librerias/alertifyjs/css/alertify.css">
            <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
            <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
          
            <script src="../librerias/jquery-3.2.1.min.js"></script>
            <script src="../js/funciones.js"></script>
            <script src="../librerias/bootstrap/js/bootstrap.js"></script>
            <script src="../librerias/alertifyjs/alertify.js"></script>
            <script src="../librerias/select2/js/select2.js"></script>
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="../styles/login.css">
    </head>
    
    <body>
    
        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                    <form id="loginform">
                        <label for="usuario">Usuario(#Cedula)</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Inciar Sesión</button>
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="#" data-toggle="modal" data-target="#modalPS" onclick="agregaformCita('<?php echo $datos ?>')">Olvide mi Contraseña</a>
                        <a href="#" data-toggle="modal" data-target="#modalAgregar" onclick="agregaformCita('<?php echo $datos ?>')">Crear Cuenta</a>
                        <hr>
                        <a href="index.php" >« Volver</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalPS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Recuperar Contraseña</h4>
                </div>
                <div class="modal-body">
                        <input type="text" hidden="" id="" name="">
                      <label>Numero de cedula</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Codigo de recuperacion</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Contraseña Nueva</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Enviar</button>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Crear Cuenta</h4>
                </div>
                <div class="modal-body">
                      <input type="text" hidden="" id="" name="">
                      <label>Numero de cedula</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Nombre</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Apelldio 1</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Apelldio 2</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Numero de Telefono</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Correo</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                      <label>Dirrecion</label>
                      <input type="text" name="" id="" class="form-control input-sm">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="actualizadatos" data-dismiss="modal">Crear</button>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>