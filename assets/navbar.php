<?php
    session_start();
    $_SESSION
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

            <li>
                <a href="./index.php#home">Inicio</a>
            </li>
            <li>
                <a href="./index.php#about">Acerca de nosotros</a>
            </li>
            <li>
                <a href="./index.php#menu">Menu</a>
            </li>
            <li>
                <a href="./index.php#ordenar">Ordenar express</a>
            </li>
        <?php

        if (!empty($_SESSION['rol'])) {
          if ($_SESSION['rol'] != 1) {
        ?>
            <li><a href="usuarios.php">Administacion Usuarios</a></li>
            <li><a href="producto.php">Administracion de Productos</a></li>
            <li><a href=".php">Pedidos</a></li>
          <?php
          } 
        }
        if (!empty($_SESSION['active'])) {
          ?>
          <li><a onclick="preguntarSiNoCerrarSesion()">Cerrar Sesión</a></li>
        <?php
        } else {
        ?>
          <li><a href="login.php">Iniciar Sesión</a></li>
        <?php
        }
        ?>
        </ul>
    </navbar>
</body>
</html>