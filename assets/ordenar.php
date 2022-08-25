<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Garage - Ordernar Express</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/ordenar.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <script src="../js/funciones.js"></script>
</head>
<body>
    <?php
        include('navbar.php');
    ?>
    <h1 class="title">Ordenar Express</h1>
    <div class="title_sucursal">
        <p>Sucursal</p> 
        <p>Tres Rios</p>
    </div>
    <div class="menu_elegir">
        <div class="opcion opcion-1">
            <div class="informacion">
                <p class="title">Pizza Suprema Pequeña</p>
                <p class="precio">₡8.000 maxima</p>
            </div>
            <img src="../media/pizza_menu.png">
        </div>
        <div class="opcion">
            <div class="informacion">
                <p class="title">Pizza Suprema Mediana</p>
                <p class="precio">₡7.000 grande</p>
            </div>
            <img src="../media/pizza_menu.png">
        </div>
        <div class="opcion">
            <div class="informacion">
                <p class="title">Pizza Suprema Grande</p>
                <p class="precio">₡7.000 grande</p>
            </div>
            <img src="../media/pizza_menu.png">
        </div>
        <div class="opcion">
            <div class="informacion">
                <p class="title">Pizza Suprema Maxima</p>
                <p class="precio">₡8.000 maxima</p>
            </div>
            <img src="../media/pizza_menu.png">
        </div>
    </div>
</body>
</html>