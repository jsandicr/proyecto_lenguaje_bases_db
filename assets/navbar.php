<?php
      require '../PHP/Conexion.php';
      session_start();
      $conn=Conexion();
      $sesion=0;
      $rol=0;
      
      if(!empty($_SESSION['active'])){
        $sesion=1;
        $rol=$_SESSION['rol'];
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navbar.css">
    <title>Document</title>
</head>
<body>
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