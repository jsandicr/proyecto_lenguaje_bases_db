<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include('navbar.php');
    ?>
    <div class="main_container">
        <div class="video">
            <video autoplay muted loop id="bg_video">
                <source src="../media/pizza_background.mp4" type="video/mp4">
            </video>
        </div>
        <div class="home" id="home">
            <h1>Garage Pizza</h1>
        </div>
        <div class="about" id="about">
            <h2>Sobre Nosotros</h2>
            <p>Garaje Pizza es una pizzería que tiene sucursales en Tres Ríos y Guatuso,<br>las mismas tiene un poco mas de tres meses de estar en el mercado, y se han detectados algunas<br>carencias en los métodos actualmente utilizados tanto para la gestión de inventarios, pago, y atención al cliente.</p>
        </div>
        <div class="menu" id="menu">
            <h2>Menu</h2>
            <div class="menu_pizzas">
                <div class="column">
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                </div>
                <div class="column">
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                    <button class="element">
                        <p class="title">Pizza Suprema</p>
                        <img src="../media/pizza_menu.png">
                        <p class="precio">₡6.000 pequeña<br>₡6.500 mediana<br>₡7.000 grande<br>₡8.000 maxima</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="ordenar" id="ordenar">
            <h2>Ordenar Express</h2>
            <p>Selecciona la sucursal en el que desea ordenar express</p>
            <div class="sucursales">
                <button class="sucursal" onclick="window.location.href = './ordenar.php'">
                    <div class="ubicacion">
                        <div class="gmap_canvas">
                            <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Tres%20Rios&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                    <p>Tres Rios</p>
                </button>
                <button class="sucursal" onclick="window.location.href = './ordenar.php'">
                    <div class="ubicacion">
                        <div class="gmap_canvas">
                            <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Guatuso&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                    <p>Guatuso</p>
                </button>
            </div>
        </div>
    </div>
</body>
<script src="../js/index.js"></script>
</html>