<?php

require_once '../model/Producto.php';
require_once '../model/Venta.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;

if (isset($_POST['Vender'])) {
    $producto = new Producto(NULL, NULL, NULL, NULL, NULL, NULL);
    $data = $producto->findProductoById($id);
    foreach ($data as $key => $value) {
        $stock = $value['stock'];
    }
    if ($stock > 0 && $stock - $cantidad >= 0) {
        $venta = new Venta($id, $cantidad);
        $statement = $venta->CreateVenta();
        if (isset($statement)) {
            $producto = new Producto(NULL, NULL, NULL, NULL, NULL, ($stock - $cantidad));
            $statement = $producto->UpdateProductoStock($id);
            ?>
            <script>
                alert("Venta Guardada");
                location.href = "../view/index.php";
            </script>
            <?php

        } else {
            echo "Problemas en la sentencia SQL";
        }
    } else {
        ?>
        <script>
            alert("Sin Stock Suficiente no es posible realizar la venta");
            location.href = "../view/index.php";
        </script>
        <?php

    }
}

