<?php 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <link href="../styles/productos.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/administracion.css">
</head>
<body>
    <?php
        include('navbar.php');
    ?>  <div class="main_container">
    <div class="home">
      <h2>Administracion de productos</h2>
      <p>Menu</p>
      <button type="button" class="btn btn-success btn-lg agregar">Agregar nueva Pizza</button>
      <!-- Pizzas mas usadas-->
      <div class="row">
        <div class="col-lg-4">
          <div class = "circulo">
            <img src = "../media/pizza_1.jpg" width="350" height="350" style="position:media">   
          </div>
          <h2>Suprema</h2>
          <h5>SUPREMA. Nuestra pizza suprema lo tiene todo: salchicha italiana, chile dulce, pepperoni, aceitunas negras, hongos y cebolla.</h5>
          <button type="button" class="btn btn-primary">Editar</button>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class = "circulo">
            <img src = "../media/pizza_2.jpg" width="350" height="350">
          </div>
          <h2>Peperoni</h2>
          <h5>SUPREMA. Nuestra pizza suprema lo tiene todo: salchicha italiana, chile dulce, pepperoni, aceitunas negras, hongos y cebolla.</h5>
          <button type="button" class="btn btn-primary">Editar</button>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class = "circulo">
            <img src = "../media/pizza_3.jpg" width="350" height="350">
          </div>
          <h2>Anchoas</h2>
          <h5>SUPREMA. Nuestra pizza suprema lo tiene todo: salchicha italiana, chile dulce, pepperoni, aceitunas negras, hongos y cebolla.</h5>
          <button type="button" class="btn btn-primary" >Editar</button>
        </div>
      </div>          
    </div>
    <div class="row admin-row">
      <div class="col-sm-12 admin">
        <h2 style="margin-top: 50px;">Administracion de Usuarios</h2>
        <div class="usuarios">
          <button class="btn btn-success btn-lg" style="margin: 30px 0;" data-toggle="modal" data-target="#modalNuevo">
            Agregar nuevo usuario
            <span class="glyphicon glyphicon-plus"></span>
          </button>
          <table class="table table-hover table-condensed table-bordered">
            <tr>
              <td>Nombre</td>
              <td>Apellido 1</td>
              <td>Apellido 2</td>
              <td>Telefono</td>
              <td>Correo</td>
              <td>Editar</td>
              <td>Eliminar</td>
            </tr>
            <tr>
              <td>ejemplo</td>
              <td>ejemplo</td>
              <td>ejemplo</td>
              <td>88888888</td>
              <td>arroyo@gmail.com</td>
              <td>
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion">
                  <i class="fa-solid fa-pencil"></i>
                </button>
              </td>
              <td>
                <button class="btn btn-danger" onclick="preguntarSiNo()">
                <i class="fa-solid fa-trash"></i>
              </button>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>   
</body>
</html>