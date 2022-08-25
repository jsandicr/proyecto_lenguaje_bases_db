
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Garage - Ordernar Express</title>
    
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
  <link rel="stylesheet" href="../styles/ordenar.css">
<link rel="stylesheet" href="../styles/navbar.css">
  <link rel="stylesheet" href="../styles/index.css">
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
    
    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Completar orden</h4>
        </div>
        <div class="modal-body">
          <label>Envio (1=si 2=no)</label>
          <input type="text" name="envio" id="envio" class="form-control input-sm">
          <label>Sucursal (1=Tres Rios 2=Guatuso)</label>
          <input type="text" name="sucursal" id="sucursal" class="form-control input-sm" disabled>
          <label>Total</label>
          <input type="text" name="total" id="total" class="form-control input-sm" disabled>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="agregaPedidos" data-dismiss="modal">Completar orden</button>

        </div>
       </div>
      </div>
    </div>

    <br><br>
    <h1 class="title">Ordenar Express</h1>
    
    
<div class="ifelsediv">
<label>Seleccione una sucursal: </label>
<select id="selecsucursal">
    <option value="tresrios">Tres Rios</option>
    <option value="guatuso">Guatuso</option>
</select>
<button onclick="handlesucursal()">Confirmar</button>
</div> 
</body>

    <div class="menu_elegir">
        <div class="opcion opcion-1">
            <div class="informacion">
                <p class="title">Pizza Suprema Pequeña</p>
                <p class="total" id="preciopeq" value="8000">₡8.000 maxima</p>
            </div>
            <img src="../media/pizza_menu.png" id="pizzasuprpeq" data-toggle="modal" data-target="#modalEdicion" onclick="handlepizzapeq()">
        </div>
        <div class="opcion">
            <div class="informacion">
                <p class="title">Pizza Suprema Mediana</p>
                <p class="total" id="preciomed">₡7.000 grande</p>
            </div>
            <img src="../media/pizza_menu.png" id="pizzasuprmed" data-toggle="modal" data-target="#modalEdicion" onclick="handlepizzamed()">
        </div>
        <div class="opcion">
            <div class="informacion">
                <p class="title">Pizza Suprema Grande</p>
                <p class="total" id="preciogr">₡7.000 grande</p>
            </div>
            <img src="../media/pizza_menu.png" id="pizzasuprgr" data-toggle="modal" data-target="#modalEdicion" onclick="handlepizzagr()">
        </div>
        <div class="opcion">
            <div class="informacion">
                <p class="title">Pizza Suprema Maxima</p>
                <p class="total" id="preciomax">₡8.000 maxima</p>
            </div>
            <img src="../media/pizza_menu.png" id="pizzasuprmax" data-toggle="modal" data-target="#modalEdicion" onclick="handlepizzamax()">
        </div>
</body>
</html>
<
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').load('../componentes/tablaPedidos.php');
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#agregaPedidos').click(function() {
        envio=$('#envio').val();
          sucursal=$('#sucursal').val();
          total=$('#total').val();
      agregarPedidos(envio,sucursal,total);
    });

  });

  

  function handlepizzapeq() {
    document.getElementById("total").value = "8000";
}

function handlepizzamed() {
    document.getElementById("total").value = "7000";
}

function handlepizzagr() {
    document.getElementById("total").value = "7000";
}

function handlepizzamax() {
    document.getElementById("total").value = "8000";
}

function handlesucursal() { 
var selsuc = document.getElementById("selecsucursal").value;    

 
    if(selsuc == "tresrios"){
     
        document.getElementById("sucursal").value = "1";
     
    }
    else if (selsuc == "guatuso"){
        document.getElementById("sucursal").value = "2";
    }
}




</script>

