<?php

require '../model/Producto.php';

$nombre = isset($_POST['title']) ? $_POST['title'] : null;
$referencia = isset($_POST['content']) ? $_POST['content'] : null;
$precio = isset($_POST['content']) ? $_POST['content'] : null;
$peso = isset($_POST['content']) ? $_POST['content'] : null;
$categoria = isset($_POST['content']) ? $_POST['content'] : null;
$stock = isset($_POST['content']) ? $_POST['content'] : null;

if (isset($_POST['Guardar'])) {
    
  
}

if (isset($_GET["id"])) {
    $producto = new Producto(NULL, NULL, NULL, NULL, NULL, NULL);
    $response = $producto->DeleteProducto($_GET["id"]);
    if ($response) {
        ?>
        <script>
            location.href = "../view/index.php";
        </script>
        <?php
    }
}

class ProductoController{
    function __construct() {}
    
    function getAll(){
        $producto = new Producto(NULL, NULL, NULL, NULL, NULL, NULL);
        return $producto->findAll();
    }
}





