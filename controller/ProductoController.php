<?php
require_once '../model/Producto.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : null;
$precio = isset($_POST['precio']) ? $_POST['precio'] : null;
$peso = isset($_POST['peso']) ? $_POST['peso'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$stock = isset($_POST['stock']) ? $_POST['stock'] : null;

class ProductoController {

    function __construct() {}

    function getAll() {
        $producto = new Producto(NULL, NULL, NULL, NULL, NULL, NULL);
        return $producto->findAll();
    }

    function getProduct($id) {
        $producto = new Producto(NULL, NULL, NULL, NULL, NULL, NULL);
        return $producto->findProductoById($id);
    }
}

if (isset($_POST['Guardar'])) {
    $producto = new Producto($nombre, $referencia, $precio, $peso, $categoria, $stock);
    $statement = $producto->CreateProducto();
    if (isset($statement)) {
        ?>
        <script>
            //alert("producto creado");
            location.href = "../view/index.php";
        </script>
        <?php
    } else {
        echo "Problemas en la sentencia SQL";
    }
}

if (isset($_POST['Modificar'])) {
    $producto = new Producto($nombre, $referencia, $precio, $peso, $categoria, $stock);
    $statement = $producto->UpdateProducto($id);
    if(isset($statement)) {
        ?>
        <script>
            //alert("producto actualizado");
            location.href = "../view/index.php";
        </script>
        <?php
    } else {
        echo "Problemas en la sentencia SQL";
    }
}

if (isset($_GET["deleteId"])) {
    $producto = new Producto(NULL, NULL, NULL, NULL, NULL, NULL);
    $response = $producto->DeleteProducto($_GET["deleteId"]);
    if ($response) {
        ?>
        <script>
            location.href = "../view/index.php";
        </script>
        <?php
    }
}
if (isset($_GET["updateId"])) {
    $id = $_GET["updateId"];
    ?>
    <script>
        location.href = "../view/ModuloProducto.php?id=" +<?php echo $id ?>;
    </script>
    <?php
}
