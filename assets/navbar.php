<?php
      require '../PHP/Conexion.php';
      session_start();
      $conn=Conexion();
      $sesion=0;
      $rol=0;
      $idu=0;
      
      if(!empty($_SESSION['active'])){
        $sesion=1;
        $rol=$_SESSION['rol'];
      }
      if(!empty($_SESSION['active'])){
        $idu=$_SESSION['id'];
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navbar.css">
    <script src="../librerias/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
    <script src="../librerias/jquery-3.2.1.min.js"></script>
    <script src="../js/funciones.js"></script>
    
    <script src="../librerias/alertifyjs/alertify.js"></script>
    <title>Document</title>
</head>
<body>
<br><br><br>
    <h3>
    <?php 


         $sql = "SELECT PKG_USUARIO.USUARIO($idu)AS NOMBRE FROM DUAL";
         $stid = oci_parse($conn, $sql);
         oci_execute($stid);

         while (oci_fetch($stid)) {
             echo oci_result($stid, 'NOMBRE');
         }
    ?>

    </h3>
    <navbar>
    <ul>
    <?php 
         $sql = "SELECT PKG_USUARIO.NAVBAR($rol,$sesion)AS HOME FROM DUAL";
         $stid = oci_parse($conn, $sql);
         oci_execute($stid);

         while (oci_fetch($stid)) {
             echo oci_result($stid, 'HOME');
         }
    ?>
     </ul>
    </navbar>
</body>
</html>