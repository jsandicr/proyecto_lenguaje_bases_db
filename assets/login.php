<?php
  require '../PHP/Conexion.php';
  session_start();
  $conn=Conexion();

  $alert = '';
  if (!empty($_POST)) {
    if(!empty($_POST['usuario']) || !empty($_POST['password'])){
      $user = $_POST['usuario'];
      $pass = $_POST['password'];


      $curs = oci_new_cursor($conn);
      $stid = oci_parse($conn, "begin PKG_USUARIO.PR_VALIDA('$pass',$user,:cursbv); end;");
      oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
      oci_execute($stid);
      oci_execute($curs);
      $row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS);
      $f=$row['TBR_ID'];

      IF (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $_SESSION['active'] = true;
        $_SESSION['id']=$row['TBU_ID'];
        $_SESSION['rol']=$row['TBR_ID'];
      
        
        if($row['TBR_ID']==1){
          header('location: ordenar.php');
        }else if($row['TBR_ID']==22){
          header('location: administracion.php');
        }
        
      } else{
        $alert='Usuario o contraseña incorrectos'.$f;
      }
    }
    if(empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['ap1']) || empty($_POST['ap2'])  || empty($_POST['tel']) ||
         empty($_POST['direcc']) || empty($_POST['contra'])){

            $mensaje='Tiene que llenar todos los datos';
         }else{
          $id = $_POST['id'];
          $nombre = $_POST['nombre'];
          $ap1 = $_POST['ap1'];
          $ap2 = $_POST['ap2'];
          $direcc = $_POST['direcc'];
          $tel = $_POST['tel'];
          $contra = $_POST['contra'];
          $stid = oci_parse($conn, "begin PKG_USUARIO.INSERTAR_USUARIO($id,'$nombre','$ap1', '$ap2', '$direcc', $tel, 1, '$contra'); end;");
          oci_execute($stid);
        }

  }

	oci_close($conn);
			 
?>
<!doctype html>

<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Incio de Sesion </title>    
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <title>Citas</title>
            <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
            <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
            <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
          
            <script src="../librerias/jquery-3.2.1.min.js"></script>
            <script src="../js/funciones.js"></script>
            <script src="../librerias/bootstrap/js/bootstrap.js"></script>
            <script src="../librerias/alertifyjs/alertify.js"></script>
            <script src="../librerias/select2/js/select2.js"></script>
   
        <link rel="stylesheet" href="../styles/login.css">
    </head>
    
    <body>
    
        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                    <form id="loginform" method="post">
                        <label for="usuario">Usuario(#Cedula)</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" required>
                        <p><?php echo isset($alert) ? $alert : '';?></p>
                        <button type="submit" title="Ingresar" name="Ingresar">Inciar Sesión</button>
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
              
                        <a href="#" data-toggle="modal" data-target="#modalAgregar")>Crear Cuenta</a>
                        <hr>
                        <a href="index.php" >« Volver</a>
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
                  <form id="crearform" method="post">
                        <input type="text" hidden="" id="" name="">
                        <label>Numero de cedula</label>
                        <input type="text" name="id" id="id" class="form-control input-sm">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm">
                        <label>Apellidio 1</label>
                        <input type="text" name="ap1" id="ap1" class="form-control input-sm">
                        <label>Apellidio 2</label>
                        <input type="text" name="ap2" id="ap2" class="form-control input-sm">
                        <label>Numero de Telefono</label>
                        <input type="text" name="tel" id="tel" class="form-control input-sm">
                        <label>Dirrecion</label>
                        <input type="text" name="direcc" id="direcc" class="form-control input-sm">
                        <label>Contraseña</label>
                        <input type="password" name="contra" id="contra" class="form-control input-sm">
                        <?php echo isset($mensaje) ? $mensaje : '' ?>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="actualizadatos" >Crear</button>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>